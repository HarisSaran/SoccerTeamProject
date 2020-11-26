
<?php  
// Uses the connection to the db_connect.php
 require('db_connect.php');
 require('passwordManager.php');

// if user_id and user_pass are set in the POST method   
if (isset($_POST['user_id']) and isset($_POST['user_pass'])){
	
// Assigning POST values to variables.  Data entered in fields for user_id is stored in $username
//data entered in user_pass is stored in $password 
// data is entered in soccerLogin.php

// $username = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
// $password = filter_input(INPUT_POST, 'user_pass', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$username = $_POST['user_id'];
$username = filter_var($username, FILTER_SANITIZE_STRING);

$password = $_POST['user_pass'];

// if the username and password are admin admin then set $admin variable to true (temporary)

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT p.userPassword as password,p.salt as salt,pt.description as usertype 
FROM Persons p INNER JOIN PersonTypes pt ON pt.personTypeID=p.personTypeID WHERE p.userID='$username'";
//and userPasswrod='$password'
// the result will contain the rows of the $query 
// if the user exists the $query will return only one row
// the $coutn variable contains the number of rows in $result 

$statement = $connection->prepare($query);
$statement->execute();
$count = $statement->rowCount();

if ($count == 1){
//We found one user
//Now we have to check if it is right one
$row = $statement->fetch();
$dbpassword = $row['password'];
$salt = $row['salt'];

//

if(isPasswordValid($dbpassword,$password,$salt)){
	$userType= $row['usertype'];
	createCookie($userType);
	$statement->closeCursor();
	header("Location:../main.php");
	exit();
}else{
	 echo "<script type='text/javascript'>alert('Invalid Login Credentials');window.location='../soccerLogin.php'</script>";
}

}else{
	
	$statement->closeCursor();
	echo "<script type='text/javascript'>alert('Invalid Login Credentials');window.location='../soccerLogin.php'</script>";
	
}

}

function createCookie($user){
	$cookie_name = 'userLogedIn';
	setcookie($cookie_name, $user, time() + (3600), '/');
}
?>