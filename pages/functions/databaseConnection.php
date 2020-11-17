
<?php
require("passwordManager.php");
//require("db_connect.php");

//function getConnection(){   

//     // define('DB_DSN','mysql:host=localhost;dbname=soccerteams;charset=utf8');
//     // define('DB_USER','SoccerTeams');
//     // define('DB_PASS','Password01');

//     //creating a PDO object called $db
//     //error handling
// try {
//     $connection = new PDO(DB_DSN, DB_USER, DB_PASS);
//     } catch (PDOException $e) {
//         print "Error: ". $e->getMessage();
//         die(); //forcing the execution to stop on errors. 
//     }
//     return $connection;
// }

// Pass the form information into variables
function saveToDatabase($connection){
   $firstName=(isset($_POST["firstName"]))? $_POST["firstName"]:null;
   $lastName=(isset($_POST["lastName"]))? $_POST["lastName"]:null;
   $phoneNumber=(isset($_POST["phoneNumber"]))? $_POST["phoneNumber"]:null;
   $emailAddress=(isset($_POST["emailAddress"]))? $_POST["emailAddress"]:null;
   $address=(isset($_POST["address"]))? $_POST["address"]:null;
   $userName=(isset($_POST["userName"]))? $_POST["userName"]:null;
   $password=(isset($_POST["password"]))? $_POST["password"]:null;

   if($firstName == null)return;

//    $connection = getConnection();
   $salt=randomSalt();
   $encriptedPassword=getEncriptedPassword($password,$salt);

   $query = "INSERT INTO Persons (firstName, lastName, phoneNumber, emailAddress, personAddress, userID, userPassword, salt, personTypeID) VALUES ('".$firstName."','".$lastName."','".$phoneNumber."','".$emailAddress."','".$address."','".$userName."','".$encriptedPassword."','".$salt."','4')";
   
   $statement = $connection->prepare($query);
   $statement->execute();
   $statement->closeCursor();
//    if ($connection->query($query) === TRUE)
//    {
//    echo "feedback sucessfully submitted";
//    }
//    else
//    {
//    echo "Error: " . $query . "<br>" . $connection->error;
//    }
//    $connection->close();

}

?>
