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

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO tasks (title, priority, info) VALUES (:title, :priority, :info) RETURNING id');
        $query->execute(array('title' => $this->title, 'priority' => $this->priority, 'info' => $this->info));
        $row = $query->fetch();
        $this->id = $row['id'];
    }

    public function update() {

        $query = DB::connection()->prepare('UPDATE tasks SET title = :title, priority = :priority, done = :done, info = :info  WHERE id = :id');
        $query->execute(array('id' => $this->id, 'title' => $this->title, 'priority' => $this->priority, 'done' => $this->done, 'info' => $this->info));
    }

    public function destroy() {
        $query = DB::connection()->prepare('DELETE FROM tasks WHERE id = :id');
//        $query->execute(array('title' => $this->title, 'priority' => $this->priority, 'info' => $this->info));
//        $row = $query->fetch();
//        $this->id = $row['id'];
        $query->execute(array('id' => $this->id));
    }

}
