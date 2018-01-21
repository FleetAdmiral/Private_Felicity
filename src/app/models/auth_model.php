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

    function get_user_by_nick($nick) {
        return false;
    }
    
    function unsubscribe_user($nick, $email) {

        $stmt = $this->DB->users->prepare("INSERT INTO `unsub_users` (email, nick) VALUES (?, ?)");
        if (!$stmt->bind_param("ss", $email, $nick)) {
            return false;
        }
        if (!$stmt->execute()) {
            if ($stmt->errno == 1062) {
                return true;
            }
            return false;
        }
        return true;
    }
}
