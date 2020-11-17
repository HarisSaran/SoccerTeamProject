<?php
//Connecting to my phpadmin database with User: SoccerTeams and Password: Password01
//Use a PDO
$connection = mysqli_connect('localhost', 'SoccerTeams', 'Password01');

if (!$connection){
	echo "Connection failed";
    die("Database Connection Failed" . mysqli_error($connection));
}
// Selecting soccer teams database to work with
$select_db = mysqli_select_db($connection, 'soccerteams');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
?>