<?php

class HelloWorldController extends BaseController {

//    public static function index() {
//        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
//        View::make('muistilista.html');
//        //    echo 'Tämä on testihommeli';
//    }

//    public static function sandbox(){
//      // Testaa koodiasi täällä
//    //  echo 'Hello World!';
//        View::make('helloworld.html');
//    }

    public static function sandbox() {
        View::make('helloworld.html');
    }

//    public static function listaus() {
////        View::make('listaus.html');
//        $tasks = Task::all();
//        // Renderöidään views/game kansiossa sijaitseva tiedosto index.html muuttujan $games datalla
//        View::make('listaus.html', array('tasks' => $tasks));
//    }

//    public static function uusitehtava() {
//        View::make('uusitehtava.html');
//    }
//
//    public static function muokkaus() {
//        View::make('muokkaus.html');
//    }
//
//    public static function login() {
//        View::make('login.html');
//    }

}
