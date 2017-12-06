<?php

class mun extends Controller {

    public function __construct() {
        $this->load_library('auth_lib', 'auth');
        $this->auth->force_authentication();
        $this->load_model('contest_model', 'model');
        load_helper('validations');
    }

    private function get_mun_payment_url($nick, $phone, $team_size, $needs_accomodation) {
        global $payment_cfg;

        $proxy = 'http://proxy.iiit.ac.in:8080';
        $user_details = $this->auth->get_user_details();

        $name  = $user_details['name'];
        $email = $user_details['mail'];

        $url            = $payment_cfg['mun']['api_url'];
        $api_headers    = $payment_cfg['mun']['api_headers'];
        $purpose    = $payment_cfg['mun']['purpose'];
        $amount     = $payment_cfg['mun']['amount'] * $team_size;
        if ($needs_accomodation)
            $amount    = $amount + $payment_cfg['mun']['accomodation_amount'] * $team_size;
        $redirect_url    = $payment_cfg['mun']['redirect_url'];
        $webhook    = $payment_cfg['mun']['webhook'];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $api_headers);
        $payload = array(
            'purpose' => $purpose,
            'amount' => $amount,
            'phone' => $phone,
            'buyer_name' => $name,
            'redirect_url' => base_url() . $redirect_url,
            //'webhook' => base_url() . $webhook,
            'email' => $email,
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch);

        $response_array = json_decode($response, true);
        return $response_array['payment_request']['longurl'];
    }

    public function register() {
        $user_nick = $this->auth->get_user();
        global $payment_cfg;
        $user_details = $this->model->is_registered_for_mun($user_nick);
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$user_details) {
            required_post_params(['contact_number', 'institute', 'team_size'], $errors);
            if (!empty($_POST['contact_number']) && !is_valid_phone_number($_POST['contact_number']) ) {
                $errors['contact_number'] = 'Please enter a valid phone number';
            }
            if (!ctype_digit($_POST['team_size'])) {
                $errors['team_size'] = 'Please enter a number';
            }

            $team_size = intval($_POST['team_size']);
            $needs_accomodation = (int) (isset($_POST['needs_accomodation']) && $_POST['needs_accomodation'] == 'yes');

            if (!$errors) {
                $user_details = [
                    'nick'                => $user_nick,
                    'contact_number'      => $_POST['contact_number'],
                    'institute'           => $_POST['institute'],
                    'team_size'           => $team_size,
                    'needs_accomodation'  => $needs_accomodation,
                ];
                if ($this->model->register_for_mun($user_details)) {
                    $redirect_url = $this->get_mun_payment_url($user_nick, $_POST['contact_number'], $team_size, $needs_accomodation);
                    $this->load_library('http_lib', 'http');
                    $this->http->redirect( $redirect_url );
                } else {
                    $errors['common'] = __('Some unexpected error occurred');
                }
            }
        }
        $this->load_view('skeleton_template/header', [
            'title'             => __('Register').' · '.__('MUN'),
            'is_authenticated'  => true,
            'user_nick'         => $user_nick,
        ]);

        $this->load_view('contest/mun', [
            'user_nick'     => $user_nick,
            'user_details'  => $user_details,
            'errors'        => $errors
        ]);
        $this->load_view('skeleton_template/footer');
        $this->load_view('skeleton_template/buttons_hide');
    }

    public function pay_again() {
        $user_nick = $this->auth->get_user();
        global $payment_cfg;
        $user_details = $this->model->is_registered_for_mun($user_nick);
        if ($user_details && $user_details['payment_status'] != 'success') {
            $redirect_url = $this->get_mun_payment_url($user_nick, $user_details['contact_number'],
                                                       $user_details['team_size'], $user_details['needs_accomodation']);
            $this->load_library('http_lib', 'http');
            $this->http->redirect($redirect_url);
        } else {
            $this->load_library('http_lib', 'http');
            $this->http->redirect(base_url() . "talks-and-workshops/mun/register/");
        }
    }

    public function success() {
        $this->load_library('http_lib', 'http');
        if (!isset($_GET['payment_id'])) {
            $this->http->response_code( 400 );
            exit();
        }
        global $payment_cfg;
        $proxy = 'http://proxy.iiit.ac.in:8080';

        $nick      = $this->auth->get_user();
        $id             = urlencode($_GET['payment_request_id']);
        $payment_id     = urlencode($_GET['payment_id']);
        $url            = $payment_cfg['mun']['api_url'] . $id . '/' . $payment_id . '/';
        $api_headers    = $payment_cfg['mun']['api_headers'];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $api_headers);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_array = json_decode($response, true);

        if (@$response_array['success']) {
            $status = $response_array['payment_request']['payment']['status'];
            $payment_id = $_GET['payment_id'];
            $payment_data = $response;
            $this->model->mun_payment_success($payment_id, $nick, $status == 'Credit' ? 'success' : 'failed', $payment_data);
        } else {
            if ( is_array( $response_array ) ) {
                $this->model->mun_dump_data('unknown', 'callback', json_encode( [ '$_GET' => $_GET, 'response' => $response_array ] ));
            } else {
                $this->model->mun_dump_data('unknown', 'callback', json_encode($_GET));
            }
        }
        $this->http->redirect(base_url() . "talks-and-workshops/mun/register/");
    }

    public function webhook() {
        global $payment_cfg;

        if (isset($_POST['custom_fields'][$nick_field])) {
            $nick = $_POST['custom_fields'][$nick_field]['value'];
            $this->model->mun_dump_data($nick, 'webhook', json_encode($_POST));
        }
    }
}
