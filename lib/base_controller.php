<?php

class BaseController {

    public static function get_user_logged_in() {
        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user'];
            $user = User::find($user_id);

            return $user;
        }

        return null;
    }

    public static function check_logged_in() {
        if (!isset($_SESSION['user'])) {
            Redirect::to('/login', array('message' => 'Kirjaudu ensin sisään!'));
        }
    }

    public static function check_if_admin() {
        $user_id = $_SESSION['user'];
        $user = User::find($user_id);
        if ($user->isadmin) {
            return;
        } else {
            Redirect::to('/listaus', array('message' => 'Et ole ylläpitäjä!'));
        }
    }

}
