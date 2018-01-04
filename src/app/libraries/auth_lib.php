<?php

use felicityiiith\OpenIDConnectClient;

/**
 * Auth Library
 */
class auth_lib extends Library {

    private static $oidc = false;

    private function construct_oidc() {
        global $keycloak_cfg;
        $oidc = new OpenIDConnectClient($keycloak_cfg['host'], $keycloak_cfg['client_id'], $keycloak_cfg['client_secret']);
        $oidc->setCertPath($keycloak_cfg['server_ca_cert']);
        return $oidc;
    }

    public function force_authentication() {
        if ($this->is_authenticated()) return;
        $this->load_library("session_lib");
        $this->session_lib->flash_set("auth_next_page", base_url() . $_SERVER['REQUEST_URI']);
        $oidc = $this->construct_oidc();
        $oidc->setRedirectURL(base_url() . 'oidc/callback');
        $oidc->authenticate();
    }

    public function is_authenticated() {
        $oidc = $this->construct_oidc();
        return (bool) $oidc->getIdToken();
    }

    public function logout() {
        $oidc = $this->construct_oidc();
        $oidc->signOut($oidc->getAccessToken(), base_url());
    }

    public function get_user() {
        $user = $this->get_user_details();

        if ($user && !empty($user->preferred_username)) {
            return $user->preferred_username;
        }
        return false;
    }

    public function get_user_details() {
        $oidc = $this->construct_oidc();
        if (!$this->is_authenticated()) {
            return false;
        }

        return $oidc->requestUserInfo();
    }
}
