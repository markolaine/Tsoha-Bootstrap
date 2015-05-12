<?php

class HelloWorldController extends BaseController {

    public static function index() {
        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        View::make('muistilista.html');
        //    echo 'Tämä on testihommeli';
    }

//    public static function sandbox(){
//      // Testaa koodiasi täällä
//    //  echo 'Hello World!';
//        View::make('helloworld.html');
//    }

    public static function sandbox() {
        View::make('helloworld.html');
    }

    public static function listaus() {
        View::make('listaus.html');
    }

    public static function uusitehtava() {
        View::make('uusitehtava.html');
    }

    public static function login() {
        View::make('login.html');
    }

}
