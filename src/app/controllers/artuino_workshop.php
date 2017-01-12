<?php

class artuino_workshop extends Controller {

    public function __construct() {
        $this->load_library('auth_lib', 'auth');
        $this->auth->force_authentication();
        $this->load_model('contest_model', 'model');
        load_helper('validations');
    }

    private function get_artuino_payment_url($team_name, $phone) {
        global $payment_cfg;

        $proxy = 'http://proxy.iiit.ac.in:8080';
        $user_details = $this->auth->get_user_details();

        $name  = $user_details['name'];
        $email = $user_details['mail'];

        $url            = $payment_cfg['artuino']['api_url'];
        $api_headers    = $payment_cfg['artuino']['api_headers'];
        $purpose    = $payment_cfg['artuino']['purpose'];
        $amount    = $payment_cfg['artuino']['amount'];
        $redirect_url    = $payment_cfg['artuino']['redirect_url'];
        $webhook    = $payment_cfg['artuino']['webhook'];

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
            'buyer_name' => $name . "__" . $team_name,
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
        $this->load_model('contest_model');
        $team_info = $this->contest_model->is_registered_for_artuino($user_nick);

        $errors = [];
        if (!$team_info && $_SERVER['REQUEST_METHOD'] === 'POST') {
            required_post_params([
                'team_name',
                'contact_number',
            ], $errors);

            if (!empty($_POST['contact_number']) && !is_valid_phone_number($_POST['contact_number']) ) {
                $errors['contact_number'] = 'Please enter a valid phone number';
            }

            if (!empty($_POST['team_name']) && $this->contest_model->check_artuino_team_exists($_POST['team_name']) ) {
                $errors['team_name'] = 'This team name already exists';
            }

            $team = [$user_nick];
            $this->load_model('auth_model');
            for ($i=2; $i <= 4; $i++) {
                if ( ! empty($_POST['nick'.$i]) ) {
                    $teammate = $this->auth_model->get_user_by_nick($_POST['nick'.$i]);
                    if (!empty($teammate)
                        && isset($teammate["resitration_status"]) && $teammate["resitration_status"] == "complete"
                        && isset($teammate["email_verified"])     && $teammate["email_verified"]
                    ) {
                        if ($this->contest_model->check_artuino_participant_exists($_POST['nick'.$i])) {
                            $errors['nick'.$i] = 'This member is already registered';
                        } else {
                            $team[] = $_POST['nick'.$i];
                        }
                    } else {
                        $errors['nick'.$i] = 'This member is not registered';
                    }
                }
            }

            if (count(array_unique($team)) != count($team)) {
                $errors['common'] = 'Duplicate members in team';
            }

            if (!$errors) {
                $team_info = [
                    'team_name' => $_POST['team_name'],
                ];
                $success = $this->model->register_for_artuino(
                    $_POST['team_name'],
                    $_POST['contact_number'],
                    $team
                );
                if ($success) {
                    $redirect_url = $this->get_artuino_payment_url($_POST['team_name'], $_POST['contact_number']);
                    $this->load_library('http_lib', 'http');
                    $this->http->redirect( $redirect_url );
                } else {
                    $errors['common'] = 'Some unexpected error occured';
                }
            }
        }

        $this->load_view('skeleton_template/header', [
            'title'             => __('Register').' · '.__('artuino'),
            'is_authenticated'  => true,
            'user_nick'         => $user_nick,
        ]);

        $this->load_view('contest/artuino', [
            'user_nick' => $user_nick,
            'team_info' => $team_info,
            'errors'    => $errors
        ]);

        $this->load_view('skeleton_template/footer');
        $this->load_view('skeleton_template/buttons_hide');


    }

    public function pay_again() {
        $this->load_model('contest_model');
        $user_nick = $this->auth->get_user();
        global $payment_cfg;
        $team_info = $this->contest_model->is_registered_for_artuino($user_nick);
        if ($team_info['payment_status'] != 'success') {
            $redirect_url = $this->get_artuino_payment_url($team_info['team_name'], $team_info['contact_number']);
            $this->load_library('http_lib', 'http');
            $this->http->redirect($redirect_url);
        } else {
            $this->load_library('http_lib', 'http');
            $this->http->redirect(base_url() . "pulsation/artuino/register/");
        }
    }

    public function success() {
        $this->load_library('http_lib', 'http');
        $this->load_model('contest_model');

        if (!isset($_GET['payment_id'])) {
            $this->http->response_code( 400 );
            exit();
        }
        global $payment_cfg;
        $proxy = 'http://proxy.iiit.ac.in:8080';

        $nick      = $this->auth->get_user();

        $id             = urlencode($_GET['payment_request_id']);
        $payment_id     = urlencode($_GET['payment_id']);
        $url            = $payment_cfg['artuino']['api_url'] . $id . '/' . $payment_id . '/';
        $api_headers    = $payment_cfg['artuino']['api_headers'];

        $team_info = $this->contest_model->is_registered_for_artuino($nick);
        $team_id = $team_info['id'];

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
            $this->model->artuino_payment_success($payment_id, $team_id, $status == 'Credit' ? 'success' : 'failed', $payment_data);
        } else {
            if ( is_array( $response_array ) ) {
                $this->model->artuino_dump_data('unknown', 'callback', json_encode( [ '$_GET' => $_GET, 'response' => $response_array ] ));
            } else {
                $this->model->artuino_dump_data('unknown', 'callback', json_encode($_GET));
            }
        }
        $this->http->redirect(base_url() . "pulsation/artuino/register/");
    }

    public function webhook() {
        global $payment_cfg;

        if (isset($_POST['custom_fields'][$nick_field])) {
            $nick = $_POST['custom_fields'][$nick_field]['value'];
            $this->model->artuino_dump_data($nick, 'webhook', json_encode($_POST));
        }
    }
}
