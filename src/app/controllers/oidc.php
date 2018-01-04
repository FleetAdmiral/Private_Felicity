<?php

class oidc extends Controller {

    function __construct() {
        $this->load_library("auth_lib");
        $this->load_library("http_lib", "http");
        $this->load_library("session_lib");
    }

    function index() {
        $this->http->redirect(locale_base_url() . "oidc/login/");
    }

    function login() {
        if (!empty($_GET['next'])) {
            $next_url = base_url() . $_GET['next'];
            $this->session_lib->flash_set("auth_next_page", $next_url);
        }

        $this->auth_lib->force_authentication();

        $next_page = $this->session_lib->flash_get("auth_next_page");
        if (empty($next_page)) {
            $next_page = locale_base_url();
        }
        $this->http->redirect($next_page);
    }

    function logout() {
        $this->auth_lib->logout();
    }
}
