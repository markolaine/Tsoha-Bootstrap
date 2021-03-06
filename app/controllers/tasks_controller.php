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

        $classes = Classes::all();
        View::make('uusitehtava.html', array('classes' => $classes));
    }

    public static function muokkaus() {
        $classes = Classes::all();
        View::make('muokkaus.html', array('classes' => $classes));
    }

    public static function show($id) {
        $task = Task::find($id);
        View::make('show.html', array('attributes' => $task));
    }

    public static function adminshow($id) {
        $task = Task::find($id);
        View::make('adminshow.html', array('attributes' => $task));
    }

    public static function tehtavalisatty() {
        $params = $_POST;

        $timestamp = date('Y-m-d G:i:s');

        $task = new Task(array(
//            'id' => $params['id'],
            'users_id' => self::get_user_logged_in()->id,
            'title' => $params['title'],
            'classname' => $params['classname'],
            'priority' => $params['priority'],
//            'done' => $params['done'],
            'added' => $timestamp,
            'info' => $params['info']
        ));

        $attributes = $task;
        $errors = $task->validate_title();

        if (count($errors) > 0) {

            $classes = Classes::all();

            View::make('/uusitehtava.html', array('errors' => $errors, 'attributes' => $attributes, 'classes' => $classes));
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
        $classes = Classes::all();
        View::make('/muokkaus.html', array('attributes' => $task, 'classes' => $classes));
    }

    public static function adminedit($id) {

        $task = Task::find($id);
        $classes = Classes::all();
        View::make('/adminmuokkaus.html', array('attributes' => $task, 'classes' => $classes));
    }

    public static function update($id) {

        $params = $_POST;

        $timestamp = date('Y-m-d G:i:s');

        $attributes = array(
            'id' => $id,
            'classname' => $params['classname'],
            'title' => $params['title'],
            'priority' => $params['priority'],
//            'done' => $params['done'],
            'updated' => $timestamp,
            'info' => $params['info']
        );

        $task = new Task($attributes);
        $errors = $task->validate_title();

        if (count($errors) > 0) {

            $classes = Classes::all();
            View::make('/muokkaus.html', array('errors' => $errors, 'attributes' => $attributes, 'classes' => $classes));
        } else {
            $task->update();

            Redirect::to('/listaus', array('message' => 'Tehtävää on muokattu onnistuneesti!'));
        }
    }

    public static function adminupdate($id) {

        $params = $_POST;

        $timestamp = date('Y-m-d G:i:s');

        $attributes = array(
            'id' => $id,
            'classname' => $params['classname'],
            'title' => $params['title'],
            'priority' => $params['priority'],
//            'done' => $params['done'],
            'updated' => $timestamp,
            'info' => $params['info']
        );

        $task = new Task($attributes);
        $errors = $task->validate_title();

        if (count($errors) > 0) {
            $classes = Classes::all();
            View::make('/adminmuokkaus.html', array('errors' => $errors, 'attributes' => $attributes, 'classes' => $classes));
        } else {
            $task->update();

            Redirect::to('/admin', array('message' => 'Tehtävää on muokattu onnistuneesti!'));
        }
    }

    public static function destroy($id) {

        $task = new Task(array('id' => $id));

        $task->destroy();

        Redirect::to('/listaus', array('message' => 'Tehtävä on poistettu onnistuneesti!'));
    }

    public static function admindestroy($id) {

        $task = new Task(array('id' => $id));

        $task->destroy();

        Redirect::to('/admin', array('message' => 'Tehtävä on poistettu onnistuneesti!'));
    }

    public static function done($id) {

        $task = new Task(array('id' => $id));

        $task->done();

        Redirect::to('/listaus', array('message' => 'Tehtävän tila on muutettu onnistuneesti!'));
    }

//    public static function showdone($id) {
//
//        $task = new Task(array('id' => $id));
//
//        $task->done();
//
//        View::make('show.html', array('attributes' => $task, 'message' => 'Tehtävän tila on muutettu onnistuneest!'));
//    }
}
