
<?php
    define('DB_DSN','mysql:host=localhost;dbname=soccerteams;charset=utf8');
    define('DB_USER','SoccerTeams');
    define('DB_PASS','Password01');

    //creating a PDO object called $db
    //error handling
try {
    $connection = new PDO(DB_DSN, DB_USER, DB_PASS);
    } catch (PDOException $e) {
        print "Error: ". $e->getMessage();
        die(); //forcing the execution to stop on errors. 
    }
?>



