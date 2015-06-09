<?php

class User extends BaseModel {

    public $id, $username, $password, $isadmin;

    // Konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_name');
    }

//    public function validate_name() {
//        $errors = array();
//        if ($this->title == '' || $this->title == null) {
//            $errors[] = 'Nimi ei saa olla tyhjä!';
//        }
//        if (strlen($this->title) < 3) {
//            $errors[] = 'Nimen pituuden tulee olla vähintään kolme merkkiä!';
//        }
//
//        return $errors;
//    }

    public static function all() {

        $query = DB::connection()->prepare('SELECT * FROM users');

        $query->execute();

        $rows = $query->fetchAll();
        $users = array();

        foreach ($rows as $row) {

            $users[] = new User(array(
                'id' => $row['id'],
                'username' => $row['username'],
                'password' => $row['password'],
                'isadmin' => $row['isadmin'],
            ));
        }

        return $users;
    }

    public static function find($id) {

        $query = DB::connection()->prepare('SELECT * FROM users WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {

            $user = new User(array(
                'id' => $row['id'],
                'username' => $row['username'],
                'password' => $row['password'],
                'isadmin' => $row['isadmin'],
            ));

            return $user;
        }

        return null;
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO users (username, password, isadmin) VALUES (:username, :password, :isadmin) RETURNING id');
        $query->execute(array('username' => $this->username, 'password' => $this->password, 'isadmin' => $this->isadmin));
        $row = $query->fetch();
        $this->id = $row['id'];
    }

//    public function update() {
//
//        $query = DB::connection()->prepare('UPDATE users SET username = :username, password = :password, isadmin = :isadmin  WHERE id = :id');
//        $query->execute(array('username' => $this->username, 'password' => $this->password, 'isadmin' => $this->isadmin));
//    }

    public function destroy() {
        $query = DB::connection()->prepare('DELETE FROM users WHERE id = :id');
//        $query->execute(array('username' => $this->username, 'password' => $this->password, 'isadmin' => $this->isadmin));
//        $row = $query->fetch();
//        $this->id = $row['id'];
        $query->execute(array('id' => $this->id));
    }

    public static function authenticate($username, $password) {
        $query = DB::connection()->prepare('SELECT * FROM users WHERE username = :username AND password = :password LIMIT 1');
        $query->execute(array('username' => $username, 'password' => $password));
        $row = $query->fetch();
        if ($row) {
            $user = new User(array(
                'id' => $row['id'],
                'username' => $row['username'],
                'isadmin' => $row['isadmin']
            ));
            return $user;
        } else {
            return null;
        }
    }

}
