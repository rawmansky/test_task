<?php
class Db {
    private $host;
    private $user;
    private $password;

    function __construct($host, $user, $password) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
    }

    function createTable() {
        $sql = "CREATE TABLE IF NOT EXISTS users 
            (name varchar(20) NOT NULL, 
            surname varchar(30) NOT NULL, 
            email varchar(40) NOT NULL,
            UNIQUE INDEX email_idx(email)
            );";

        $db = $this->connect();

        try {
            if (!@$db->query($sql)) {
                throw new Exception("Unable to create table: " . $db->error);
            };
            $db->close();
        } catch (Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }
    }

    function insertUsers($users) {
        $sql = "INSERT INTO users (name, surname, email) VALUES (?, ?, ?)";

        $db = $this->connect();

        try {
            if (!$stmt = @$db->prepare($sql)) {
                throw new Exception("Table data is not updated: " . $stmt->error);
            }
            foreach ($users as $user) {
                if ($user->validateEmail()) {
                    $name = $user->getCapitalisedName();
                    $surname = $user->getCapitalisedSurname();
                    $email = $user->getLowerCaseEmail();
                    $stmt->bind_param('sss', $name, $surname, $email);
                    if (!$stmt->execute()) {
                        echo $stmt->error . PHP_EOL;
                    }
                }
            }
            $stmt->close();
            $db->close();
            echo "Table data is updated!" . PHP_EOL;
        } catch (Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }
    }

    private function connect () {
        try {
            $db = @new mysqli($this->host, $this->user, $this->password, "test");
            if ($db->connect_errno) {
                throw new Exception("Unable to connect to DB: " . $db->connect_error);
            }
        } catch (Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }
        return $db;
    }
}