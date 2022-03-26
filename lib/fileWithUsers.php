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
        try {
            if (!file_exists($this->name)) {
                throw new Exception("File not found!");
            }
            $file = fopen($this->name, "r");
            if (!$file) {
                throw new Exception("Unable to open file!");
            }
            while(!feof($file)) {
                $line = str_replace(array(" ", "\n", "\t"), "", fgets($file));
                if (substr_count($line, ",") >= 2) {
                    [$name, $surname, $email] = explode(",", $line);
                    $user = new User($name, $surname, $email);
                    array_push($this->users, $user);
                }
            }
            fclose($file);
            echo "File parsed!" . PHP_EOL;
        } catch (Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }
    }

}