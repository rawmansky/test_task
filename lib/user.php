<?php
class User {
    private $name;
    private $surname;
    private $email;

    function __construct($name, $surname, $email) {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
    }

    function validateEmail () {
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $res = true;
        } else {
            echo "Email $this->email is invalid for user $this->name !" . PHP_EOL;
            $res = false;
        }
        return $res;
    }

    function getLowerCaseEmail () {
        return strtolower($this->email);
    }

    function getCapitalisedName () {
        return ucfirst($this->name);
    }

    function getCapitalisedSurname () {
        return ucfirst($this->surname);
    }
}