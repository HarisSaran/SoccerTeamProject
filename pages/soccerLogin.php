<?php

// require("functions/passwordManager.php");
// $userId="admin";
// $password="Password01";
// $salt=randomSalt();
// $encriptedPassword= getEncriptedPassword($password,$salt);

// $cookie_name = 'userLogedIn';
// $isset = isset($_COOKIE[$cookie_name]);
// $value = ($isset)?$_COOKIE[$cookie_name]:"";
// if($isset) {
//     header("Location: pages/haris_test.php");
//     exit();
// }

?>

<!DOCTYPE html >
<html>
<head>
<title>SOCCER LOGIN FORM</title>
<link rel="stylesheet" type="text/css" href="../cssStyles/login.css">
<!-- bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<!-- end bootstrap -->
</head>
<body class="body_bg">
<div align="center">

<h3>SOCCER LOGIN FORM</h3>
    <form class="form-class" method="post" action="functions/authenticate.php" >
        <table border="0.5" >
            <tr>
                <td><label for="user_id">User Name</label></td>
                <td><input type="text" name="user_id" id="user_id"></td>
            </tr>
            <tr>
                <td><label for="user_pass">Password</label></td>
                <td><input type="password" name="user_pass" id="user_pass"></input></td>
            </tr>
			
            <tr>
                <td><input type="submit" value="Submit" />
                <td><input type="reset" value="Reset"/>
            </tr>
        </table>
    </form>

        
	
        </body>
        </html>


        