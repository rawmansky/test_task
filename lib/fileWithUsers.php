<?php
class FileWithUsers {
    private $name;
    private $users = array();

    function __construct($name) {
        $this->name = $name;
        $this->loadUsers();
    }

    function getUsers() {
        return $this->users;
    }

    function loadUsers() {
        
    }

}