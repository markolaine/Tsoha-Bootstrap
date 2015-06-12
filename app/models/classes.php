<?php

class Classes extends BaseModel {

    public $id, $classname;

    public function __construct($attributes = null) {
        parent::__construct($attributes);
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM  classes ORDER BY classname');
        $query->execute();
        $rows = $query->fetchAll();

        $classes = array();

        foreach ($rows as $row) {
            $classes[] = new Classes(array(
                'id' => $row['id'],
                'classname' => $row['classname']
            ));
        }
        return $classes;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM classes WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();
        if ($row) {
            $classes[] = new Classes(array(
                'id' => $row['id'],
                'classname' => $row['classname']
            ));
            return $classes;
        }
        return null;
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO classes (classname) VALUES (:classname) RETURNING id');
        $query->execute(array('classname' => $this->classname));
        $row = $query->fetch();
        $this->id = $row['id'];
    }

    public function update() {

        $query = DB::connection()->prepare('UPDATE classes SET classname = :classname WHERE id = :id');
        $query->execute(array('id' => $this->id, 'classname' => $this->classname));
    }

    public function destroy() {

        $query = DB::connection()->prepare('DELETE FROM classes WHERE id = :id');
        $query->execute(array('id' => $this->id));
    }

}
