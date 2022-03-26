<?php

include "lib/user.php";
include "lib/fileWithUsers.php";
include "lib/db.php";

$fileWithUsers = new FileWithUsers($argv[1]);
