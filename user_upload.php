<?php

include "lib/user.php";
include "lib/fileWithUsers.php";
include "lib/db.php";

$fileWithUsers = new FileWithUsers($argv[1]);
$db = new Db("10.254.254.84", "test", "test");
$db->createTable();
$db->insertUsers($fileWithUsers->getUsers());