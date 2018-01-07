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
        $oidc = $this->construct_oidc();
        $oidc->authenticate();
    }

    public function is_authenticated() {
        return (bool) $this->get_user();
    }

    public function logout() {
        $oidc = $this->construct_oidc();
        // XXX: Hack to logout from kong, i.e. unset lua_resty_session cookies
        setcookie('session',   '', time() - 3600, '/');
        setcookie('session_2', '', time() - 3600, '/');
        setcookie('session_3', '', time() - 3600, '/');
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
        if (!$oidc->getIdToken()) {
            return false;
        }

        $details = $oidc->requestUserInfo();
        if (isset($details->error)) $oidc->refreshTokens();
        return $oidc->requestUserInfo();
    }
}
