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
            $columnsName = array();
            $delimeter = ",";
            while(!feof($file)) {
                $line = str_replace(array(" ", "\n", "\t"), "", fgets($file));
                if (empty($columnsName)) {
                    [$columnsName[0], $columnsName[1], $columnsName[2]] = explode($delimeter, $line);
                } elseif (substr_count($line, $delimeter) >= 2) {
                    [${$columnsName[0]}, ${$columnsName[1]}, ${$columnsName[2]}] = explode($delimeter, $line);
                    if (!isset($name) or !isset($surname) or !isset($email)) {
                        throw new Exception("File $this->name doesn't have column 'name', 'surname' or 'email'!");
                    }
                    $user = new User($name, $surname, $email);
                    array_push($this->users, $user);
                }
            }
            fclose($file);
            echo "File parsed!" . PHP_EOL;
        } catch (Exception $e) {
            die($e->getMessage() . PHP_EOL);
        }
    }

}