<?php

class ClassController extends BaseController {

    public static function listaus() {

        self::check_logged_in();

        $classes = Classes::all();
        View::make('luokat.html', array('classes' => $classes));
    }

    public static function luokkalisatty() {

        $params = $_POST;

        $classes = new Classes(array(
            'classname' => $params['classname']
        ));

        $attributes = $classes;

        $classes->save();

        Redirect::to('/luokat', array('message' => 'Tehtäväluokka on lisätty onnistuneesti!'));
    }

    public static function destroy($id) {

        $classes = new Classes(array('id' => $id));

        $classes->destroy();

        Redirect::to('/luokat', array('message' => 'Tehtäväluokka on poistettu onnistuneesti!'));
    }

    public static function edit($id) {

        $classes = Classes::find($id);
        View::make('/muokkaaluokkaa.html', array('attributes' => $classes));
    }

    public static function update($id) {

        $params = $_POST;

        $attributes = array(
            'id' => $id,
            'classname' => $params['classname']
        );

        $classes = new Classes($attributes);

        $classes->update();
        
        Redirect::to('/listaus', array('message' => 'Tehtäväluokkaa on muokattu onnistuneesti!'));
    }

}
