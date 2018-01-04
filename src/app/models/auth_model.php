<?php

class auth_model extends Model {

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

    function get_user_by_nick($nick) {
        return false;
    }
}
