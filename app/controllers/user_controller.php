<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserController extends BaseController {

    public static function login() {
        View::make('login.html');
    }

    public static function handle_login() {
        $params = $_POST;

        $user = User::authenticate($params['username'], $params['password']);

        if (!$user) {
            View::make('/login.html', array('message' => 'Väärä käyttäjätunnus tai salasana!', 'username' => $params['username']));
        } else {
            $_SESSION['user'] = $user->id;

            Redirect::to('/listaus', array('message' => 'Tervehdys vain,  ' . $user->username . '!'));
        }
    }

    public static function logout() {

        $_SESSION['user'] = null;
        Redirect::to('/login', array('message' => 'Olet kirjautunut ulos!'));
    }

    public static function store() {
        $params = $_POST;
        
        $attributes = array(
            'username' => $params['username'],
            'password' => $params['password']
        );
        $user = new User($attributes);
//        $errors = $user->errors();
//
//        if (count($errors) != 0) {
//            View::make('/', array('errors' => $errors, 'attributes' => $attributes));
//        } else {
            $user->save();
            Redirect::to('/login', array('message' => 'Käyttäjä luotu onnistuneesti, kirjaudu nyt sisään.'));
//        }
    }

}
