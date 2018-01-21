<?php

class auth extends Controller {

    function __construct() {
        $this->load_library("auth_lib");
        $this->load_library("http_lib", "http");
        $this->load_library("session_lib");

        $this->load_model("auth_model");
    }



    function unsubscribe($nick=null, $email=null, $hash=null) {

        if ( $nick == NULL || $email == NULL || $hash == NULL) {
             $this->load_view('contest/unsubscribe', [
                 'message' => 'Unable to process your request'
             ]);
             return;
        }

        global $SECRET_STRING;

        $verified = false;
        for ($i = 0; $i < 500; $i++) {
            $possible_hash = sha1($i . $nick . $email . $SECRET_STRING);
            if ($possible_hash == $hash) {
                $verified = true;
                break;
            }
        }

        if (!$verified) {
            $this->load_view('contest/unsubscribe', [
                'message' => 'Unable to process your request.'
            ]);
           return;
        }

        if ($this->auth_model->unsubscribe_user($nick, $email)) {
            $this->load_view('contest/unsubscribe', [
                'message' => 'You have been successfully unsubscribe from our mailing list.'
            ]);
        }
        else {
            $this->load_view('contest/unsubscribe', [
                'message' => 'Unable to process your request.'
            ]);
        }

    }
}

