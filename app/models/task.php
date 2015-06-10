<?php

class Task extends BaseModel {

    public $id, $users_id, $title, $priority, $done, $added, $info;

    // Konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_name');
    }

    public function validate_name() {
        $errors = array();
        if ($this->title == '' || $this->title == null) {
            $errors[] = 'Nimi ei saa olla tyhjä!';
        }
        if (strlen($this->title) < 3) {
            $errors[] = 'Nimen pituuden tulee olla vähintään kolme merkkiä!';
        }

        return $errors;
    }

    public static function all() {

        $query = DB::connection()->prepare('SELECT * FROM tasks');
        $query->execute();

        $rows = $query->fetchAll();
        $tasks = array();

        foreach ($rows as $row) {

            $tasks[] = new Task(array(
                'id' => $row['id'],
                'users_id' => $row['users_id'],
                'title' => $row['title'],
                'priority' => $row['priority'],
                'done' => $row['done'],
                'added' => $row['added'],
                'info' => $row['info']
            ));
        }

        return $tasks;
    }

    public static function find($id) {

        $query = DB::connection()->prepare('SELECT * FROM tasks WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {

            $task = new Task(array(
                'id' => $row['id'],
                'title' => $row['title'],
                'priority' => $row['priority'],
                'done' => $row['done'],
                'added' => $row['added'],
                'info' => $row['info']
            ));

            return $task;
        }

        return null;
    }

    public static function findTasksByUserId($id) {
        $query = DB::connection()->prepare('SELECT * FROM tasks WHERE users_id = :id');
        $query->execute(array('id' => $id));
        $rows = $query->fetchAll();
        $tasks = array();
        foreach ($rows as $row) {
            $tasks[] = new Task(array(
                'id' => $row['id'],
                'title' => $row['title'],
                'priority' => $row['priority'],
                'done' => $row['done'],
                'added' => $row['added'],
                'info' => $row['info']
            ));
        }
        return $tasks;
    }

    public static function findDoneTasks($id) {
        $query = DB::connection()->prepare('SELECT * FROM tasks WHERE users_id = :id AND done = TRUE');
        $query->execute(array('id' => $id));
        $rows = $query->fetchAll();
        $tasks = array();
        foreach ($rows as $row) {
            $tasks[] = new Task(array(
                'id' => $row['id'],
                'title' => $row['title'],
                'priority' => $row['priority'],
                'done' => $row['done'],
                'added' => $row['added'],
                'info' => $row['info']
            ));
        }
        return $tasks;
    }

    public static function findNotDoneTasks($id) {
        $query = DB::connection()->prepare('SELECT * FROM tasks WHERE users_id = :id AND done != TRUE');
        $query->execute(array('id' => $id));
        $rows = $query->fetchAll();
        $tasks = array();
        foreach ($rows as $row) {
            $tasks[] = new Task(array(
                'id' => $row['id'],
                'title' => $row['title'],
                'priority' => $row['priority'],
                'done' => $row['done'],
                'added' => $row['added'],
                'info' => $row['info']
            ));
        }
        return $tasks;
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO tasks (users_id, title, priority, info) VALUES (:users_id, :title, :priority, :info) RETURNING id');
        $query->execute(array('users_id' => $this->users_id, 'title' => $this->title, 'priority' => $this->priority, 'info' => $this->info));
        $row = $query->fetch();
        $this->id = $row['id'];
    }

    public function update() {

        $query = DB::connection()->prepare('UPDATE tasks SET title = :title, priority = :priority, info = :info  WHERE id = :id');
        $query->execute(array('id' => $this->id, 'title' => $this->title, 'priority' => $this->priority, 'info' => $this->info));
    }

    public function destroy() {
        $query = DB::connection()->prepare('DELETE FROM tasks WHERE id = :id');
//        $query->execute(array('title' => $this->title, 'priority' => $this->priority, 'info' => $this->info));
//        $row = $query->fetch();
//        $this->id = $row['id'];
        $query->execute(array('id' => $this->id));
    }

    public function done() {

        $query = DB::connection()->prepare('UPDATE tasks SET done = NOT done WHERE id = :id');
        $query->execute(array('id' => $this->id));
    }

}
