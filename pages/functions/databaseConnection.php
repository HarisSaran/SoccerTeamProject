
<?php
require("passwordManager.php");

function getConnection(){   
    $connection = mysqli_connect('localhost', 'SoccerTeams', 'Password01');
    if (!$connection){
        die("Database Connection Failed" . mysqli_error($connection));
    }
    // Selecting soccer teams database to work with
    $select_db = mysqli_select_db($connection, 'soccerteams');
    if (!$select_db){
        die("Database Selection Failed" . mysqli_error($connection));
    }
    return $connection;
}

// Pass the form information into variables
function saveToDatabase(){

 
   $firstName=(isset($_POST["firstName"]))? $_POST["firstName"]:null;
   $lastName=(isset($_POST["lastName"]))? $_POST["lastName"]:null;
   $phoneNumber=(isset($_POST["phoneNumber"]))? $_POST["phoneNumber"]:null;
   $emailAddress=(isset($_POST["emailAddress"]))? $_POST["emailAddress"]:null;
   $address=(isset($_POST["address"]))? $_POST["address"]:null;
   $userName=(isset($_POST["userName"]))? $_POST["userName"]:null;
   $password=(isset($_POST["password"]))? $_POST["password"]:null;

   if($firstName == null)return;

   $connection = getConnection();
   $salt=randomSalt();
   $encriptedPassword=getEncriptedPassword($password,$salt);

   $query = "INSERT INTO Persons (firstName, lastName, phoneNumber, emailAddress, personAddress, userID, userPassword, salt, personTypeID) VALUES ('".$firstName."','".$lastName."','".$phoneNumber."','".$emailAddress."','".$address."','".$userName."','".$encriptedPassword."','".$salt."','4')";
   
   if ($connection->query($query) === TRUE)
   {
   echo "feedback sucessfully submitted";
   }
   else
   {
   echo "Error: " . $query . "<br>" . $connection->error;
   }
   $connection->close();

}

?>
