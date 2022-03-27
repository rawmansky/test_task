<?php

include "lib/user.php";
include "lib/fileWithUsers.php";
include "lib/db.php";
include "lib/commandLine.php";

$commandLine = new CommandLine($argv);
$commandLine->run();