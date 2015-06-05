<?php

class BaseModel {

    // "protected"-attribuutti on käytössä vain luokan ja sen perivien luokkien sisällä
    protected $validators;

    public function __construct($attributes = null) {
        // Käydään assosiaatiolistan avaimet läpi
        foreach ($attributes as $attribute => $value) {
            // Jos avaimen niminen attribuutti on olemassa...
            if (property_exists($this, $attribute)) {
                // ... lisätään avaimen nimiseen attribuuttin siihen liittyvä arvo
                $this->{$attribute} = $value;
            }
        }
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

    public function errors() {

        $errors = array();
        foreach ($this->validators as $validator) {

            $errors = array_merge($errors, $this->{$validator}());
        }
        return $errors;
    }

}
