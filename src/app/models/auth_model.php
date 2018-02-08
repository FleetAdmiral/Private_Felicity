<?php

class auth_model extends Model {

    function __construct() {
        $this->load_library("db_lib");
    }

    // Is the user super-admin for Jugaad
    function is_admin($user) {
        global $admins;

        if (!isset($admins) || !is_array($admins)) {
            return false;
        }

        if (in_array($user, $admins)) {
            return true;
        }
        return false;
    }
}
