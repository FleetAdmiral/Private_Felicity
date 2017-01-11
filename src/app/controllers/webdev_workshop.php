<?php

class webdev_workshop extends Controller {

    public function __construct() {
        $this->load_library('auth_lib', 'auth');
        $this->auth->force_authentication();
        $this->load_model('contest_model', 'model');
        load_helper('validations');
    }

    private function get_webdev_payment_url($nick, $phone) {
        global $payment_cfg;

        $proxy = 'http://proxy.iiit.ac.in:8080';
        $user_details = $this->auth->get_user_details();

        $name  = $user_details['name'];
        $email = $user_details['mail'];

        $url            = $payment_cfg['webdev']['api_url'];
        $api_headers    = $payment_cfg['webdev']['api_headers'];
        $purpose    = $payment_cfg['webdev']['purpose'];
        $amount    = $payment_cfg['webdev']['amount'];
        $redirect_url    = $payment_cfg['webdev']['redirect_url'];
        $webhook    = $payment_cfg['webdev']['webhook'];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $api_headers);
        $payload = Array(
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
        $user_details = $this->model->is_registered_for_webdev($user_nick);
        if ($user_details['payment_status'] == 'pending') {
            $redirect_url = $this->get_webdev_payment_url($user_nick, $user_details['contact_number']);
            $this->load_library('http_lib', 'http');
            $this->http->redirect($redirect_url);
        } else {
            $errors = [];
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                required_post_params(['contact_number', 'stream', 'year', 'experience', 'why_join'], $errors);
                if (!empty($_POST['contact_number']) && !is_valid_phone_number($_POST['contact_number']) ) {
                    $errors['contact_number'] = 'Please enter a valid phone number';
                }
                if (!$errors) {
                    $user_details = [
                        'nick'              => $user_nick,
                        'contact_number'    => $_POST['contact_number'],
                        'stream'            => $_POST['stream'],
                        'year'              => $_POST['year'],
                        'experience'        => $_POST['experience'],
                        'why_join'          => $_POST['why_join'],
                    ];
                    if ($this->model->register_for_webdev($user_details)) {
                        $redirect_url = $this->get_webdev_payment_url($user_nick, $_POST['contact_number']);
                        $this->load_library('http_lib', 'http');
                        $this->http->redirect( $redirect_url );
                    } else {
                        $errors['common'] = __('Some unexpected error occurred');
                    }
                }
            }
            $this->load_view('skeleton_template/header', [
                'title'             => __('Register').' · '.__('Web development Workshop'),
                'is_authenticated'  => true,
                'user_nick'         => $user_nick,
            ]);

            $this->load_view('contest/webdev_workshop', [
                'user_nick' => $user_nick,
                'user_details'  => $user_details,
                'errors'    => $errors
            ]);
            $this->load_view('skeleton_template/footer');
            $this->load_view('skeleton_template/buttons_hide');
        }
    }

    public function pay_again() {
        $user_nick = $this->auth->get_user();
        global $payment_cfg;
        $user_details = $this->model->is_registered_for_webdev($user_nick);
        if ($user_details['payment_status'] == 'failed') {
            $redirect_url = $this->get_webdev_payment_url($user_nick, $user_details['contact_number']);
            $this->load_library('http_lib', 'http');
            $this->http->redirect($redirect_url);
        } else {
            $this->http->redirect(base_url() . "talks-and-workshops/web-development/register/");
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
        $url            = $payment_cfg['webdev']['api_url'] . $id . '/' . $payment_id . '/';
        $api_headers    = $payment_cfg['webdev']['api_headers'];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $api_headers);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_array = json_decode($response, true);

        if (@$response_array['success']) {
            $status = $response_array['payment_request']['payment']['status'];
            $payment_id = $_GET['payment_id'];
            $payment_data = $response;
            $this->model->webdev_payment_success($payment_id, $nick, $status == 'Credit' ? 'success' : 'failed', $payment_data);
        } else {
            if ( is_array( $response_array ) ) {
                $this->model->webdev_dump_data('unknown', 'callback', json_encode( [ '$_GET' => $_GET, 'response' => $response_array ] ));
            } else {
                $this->model->webdev_dump_data('unknown', 'callback', json_encode($_GET));
            }
        }
        $this->http->redirect(base_url() . "talks-and-workshops/web-development/register/");
    }

    public function webhook() {
        global $payment_cfg;

        if (isset($_POST['custom_fields'][$nick_field])) {
            $nick = $_POST['custom_fields'][$nick_field]['value'];
            $this->model->webdev_dump_data($nick, 'webhook', json_encode($_POST));
        }
    }
}
