dependencies:
apt-get install php-mysqlnd

main file script to run is "user_upload.php".

added new directive DB name "-n".

all directives:

        • --file [csv file name] – this is the name of the CSV to be parsed
        • --create_table – this will cause the MySQL users table to be built (and no further
        • action will be taken)
        • --dry_run – this will be used with the --file directive in case we want to run the script but not insert into the DB. All other functions will be executed, but the database won't be altered
        • -u – MySQL username
        • -p – MySQL password
        • -h – MySQL host
        • -n – MySQL DB name
        • --help – which will output the above list of directives with details.

file users.csv should contain 3 columns "name", "surname" and "email", columns could be in random order.

Classes:

class CommandLine parses arguments provided to script, and runs commands in order to directives description.

class Db connects and executes sql scripts for MySQL database.

class FileWithUsers parses csv file, and stores data of users from this file.

class User stores a user data.