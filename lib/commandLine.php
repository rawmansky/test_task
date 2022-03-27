<?php
class CommandLine {
    private $options;

    function __construct($commands) {
        $shortopts = "u:p:h:n:";
        $longopts = array(
            "file:",
            "create_table",
            "dry_run",
            "help",
        );

        $this->options = getopt($shortopts, $longopts);
    }

    private function printHelp () {
        echo "        • --file [csv file name] – this is the name of the CSV to be parsed
        • --create_table – this will cause the MySQL users table to be built (and no further
        • action will be taken)
        • --dry_run – this will be used with the --file directive in case we want to run the script but not
        insert into the DB. All other functions will be executed, but the database won't be altered
        • -u – MySQL username
        • -p – MySQL password
        • -h – MySQL host
        • -n – MySQL DB name
        • --help – which will output the above list of directives with details." . PHP_EOL;
    }

    function run () {
        if (isset($this->options["help"])) {
            $this->printHelp();
        }
        elseif (isset($this->options["create_table"])) {
            echo "Creating table..." . PHP_EOL;
            $db = new Db($this->options["h"], $this->options["u"], $this->options["p"], $this->options["n"]);
            $db->createTable();
        }
        elseif (isset($this->options["dry_run"])) {
            echo "Parsing file..." . PHP_EOL;
            $fileWithUsers = new FileWithUsers($this->options["file"]);
        }
        elseif (isset($this->options["file"])) {
            echo "Parsing file..." . PHP_EOL;
            $fileWithUsers = new FileWithUsers($this->options["file"]);
            echo "Inserting users into table..." . PHP_EOL;
            $db = new Db($this->options["h"], $this->options["u"], $this->options["p"], $this->options["n"]);
            $db->insertUsers($fileWithUsers->getUsers());
        }
    }
}