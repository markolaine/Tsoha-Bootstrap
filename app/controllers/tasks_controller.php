<?php

class TaskController extends BaseController {

    public static function index() {
        View::make('muistilista.html');
    }

    public static function listaus() {
        $tasks = Task::all();
        View::make('listaus.html', array('tasks' => $tasks));
    }

    public static function uusitehtava() {
        View::make('uusitehtava.html');
    }

    public static function muokkaus() {
        View::make('muokkaus.html');
    }

    public static function login() {
        View::make('login.html');
    }

    public static function tehtavalisatty() {
        $params = $_POST;

        $task = new Task(array(
//            'id' => $params['id'],
//            'users_id' => $params['users_id'],
            'title' => $params['title'],
            'priority' => $params['priority'],
//            'done' => $params['done'],
//            'added' => $params['added'],
            'info' => $params['info']
        ));

        $task->save();

//        Redirect::to('/uusitehtava/' . $task->id, array('message' => 'Tehtävä on lisätty listaasi!'));
        
        Redirect::to('/listaus', array('message' => 'Tehtävä on lisätty listaasi!'));
    }

}
