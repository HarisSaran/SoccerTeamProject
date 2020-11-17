<?php  
// Uses the connection to the db_connect.php
 require('db_connect.php');
 require('../pages/functions/passwordManager.php');

// if user_id and user_pass are set in the POST method   
if (isset($_POST['user_id']) and isset($_POST['user_pass'])){
	
// Assigning POST values to variables.  Data entered in fields for user_id is stored in $username
//data entered in user_pass is stored in $password 
// data is entered in soccerLogin.php
$username = $_POST['user_id'];
$password = $_POST['user_pass'];
// if the username and password are admin admin then set $admin variable to true (temporary)
//$admin = $username=="admin" && $password == "admin";

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT p.userPassword as password,p.salt as salt,pt.description as usertype FROM Persons p INNER JOIN PersonTypes pt ON pt.personTypeID=p.personTypeID WHERE p.userID='$username'";
//and userPasswrod='$password'
 
// the result will contain the rows of the $query 
// if the user exists the $query will return only one row
// the $coutn variable contains the number of rows in $result 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
//$logedUser={
//	user:$username,
	//$userType=($admin)?"admin":"user";
//}
if ($count == 1){
//We found one user
//Now we have to check if it is right one
$table= mysqli_fetch_all($result,MYSQLI_ASSOC);
$dbpassword = $table[0]['password'];
$salt = $table[0]['salt'];

if(isPasswordValid($dbpassword,$password,$salt)){
	$userType= $table[0]['usertype'];
	createCookie($userType);

	header("Location:../pages/main.php");
	exit();
}else{
	echo "<script type='text/javascript'>alert('Invalid Login Credentials');window.location='../pages/soccerLogin.php'</script>";
}


$connection->close();

//redirecting to main page


}else{
	$connection->close();
echo "<script type='text/javascript'>alert('Invalid Login Credentials');window.location='../pages/soccerLogin.php'</script>";


}
//header("Location: socerLogin.php");
//exit();
}

function createCookie($user){
	$cookie_name = 'userLogedIn';
	setcookie($cookie_name, $user, time() + (3600), '/'); // 3600 = 1 hour
}
?>