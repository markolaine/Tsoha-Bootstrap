<?php

class TaskController extends BaseController {

    public static function index() {
        View::make('muistilista.html');
    }

//    public static function listaus() {
//        $tasks = Task::all();
//        View::make('listaus.html', array('tasks' => $tasks));
//    }

    public static function listaus() {

        self::check_logged_in();
        $user = self::get_user_logged_in();

        $tasks = Task::findTasksByUserId($user->id);
        View::make('listaus.html', array('tasks' => $tasks));
    }

    public static function listausAdmin() {

        self::check_logged_in();
        self::check_if_admin();

        $tasks = Task::all();
        View::make('admin.html', array('tasks' => $tasks));
    }

    public static function listausDone() {

        self::check_logged_in();
        $user = self::get_user_logged_in();

        $tasks = Task::findDoneTasks($user->id);
        View::make('listaus.html', array('tasks' => $tasks));
    }

    public static function listausNotDone() {

        self::check_logged_in();
        $user = self::get_user_logged_in();

        $tasks = Task::findNotDoneTasks($user->id);
        View::make('listaus.html', array('tasks' => $tasks));
    }

    public static function uusitehtava() {
        View::make('uusitehtava.html');
    }

    public static function muokkaus() {
        View::make('muokkaus.html');
    }

    public static function tehtavalisatty() {
        $params = $_POST;

        $task = new Task(array(
//            'id' => $params['id'],
            'users_id' => self::get_user_logged_in()->id,
            'title' => $params['title'],
            'priority' => $params['priority'],
//            'done' => $params['done'],
//            'added' => $params['added'],
            'info' => $params['info']
        ));
        
        $attributes = $task;
        $errors = $task->validate_title();

        if (count($errors) > 0) {

            View::make('/uusitehtava.html', array('errors' => $errors, 'attributes' => $attributes));
        } else {
            $task->save();

            Redirect::to('/listaus', array('message' => 'Tehtävä on lisätty listaasi!'));
        }


//        Redirect::to('/uusitehtava/' . $task->id, array('message' => 'Tehtävä on lisätty listaasi!'));
//
//        Redirect::to('/listaus', array('message' => 'Tehtävä on lisätty listaasi!'));
    }

    public static function edit($id) {

        $task = Task::find($id);
        View::make('/muokkaus.html', array('attributes' => $task));
    }

    public static function update($id) {

        $params = $_POST;

        $attributes = array(
            'id' => $id,
            'title' => $params['title'],
            'priority' => $params['priority'],
//            'done' => $params['done'],
            'info' => $params['info']
        );

        $task = new Task($attributes);
        $errors = $task->validate_title();

        if (count($errors) > 0) {

            View::make('/muokkaus.html', array('errors' => $errors, 'attributes' => $attributes));
        } else {
            $task->update();

            Redirect::to('/listaus', array('message' => 'Peliä on muokattu onnistuneesti!'));
        }
    }

    public static function destroy($id) {

        $task = new Task(array('id' => $id));

        $task->destroy();

        Redirect::to('/listaus', array('message' => 'Tehtävä on poistettu onnistuneesti!'));
    }

    public static function done($id) {

        $task = new Task(array('id' => $id));

        $task->done();

        Redirect::to('/listaus', array('message' => 'Tehtävän tila on muutettu onnistuneesti!'));
    }

}
