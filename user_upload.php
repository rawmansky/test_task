<?php

include "lib/user.php";
include "lib/fileWithUsers.php";
include "lib/db.php";

$fileWithUsers = new FileWithUsers($argv[1]);
foreach($fileWithUsers->getUsers() as $user) {
    $user->validateEmail();
}