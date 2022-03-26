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

    function validate_email () {
        
    }
}