<?php 
// every page that requires a login requires
 require('functions/login.php');
 require('functions/menu.php');

 require('functions/db_connect.php');
 require('functions/savePlayer.php');

    isUserLogedIn();
    
    if($connection){
		savePlayerToDatabase($connection);
	}else{
		echo "doesnt save";
	}
	
?>

	
<html>
	<head>
		<script src="../javascripts/logout.js" ></script>
        <!-- <link rel="stylesheet" href="../cssStyles/menu.css" type="text/css"/> -->
        <link rel="stylesheet" type="text/css" href="../cssStyles/login.css">
        <!-- bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<!-- end bootstrap -->

	</head>
	<body class="body_bg">
		<?php
		  echo getMenu();
		?>
		<div align="center">
        <form id="player-form" class="form-class" method="post" action="./player.php">
				 <ul>
					<li><label>First Name: <input type="text" name="firstName" id="firstName"></label></li>
					<li><label>Last Name: <input type="text" name="lastName" id="lastName"></label></li>
					<li><label>Phone Number: <input type="text" name="phoneNumber"></label></li>
					<li><label>Email Address: <input type="text" name="emailAddress"></label></li>
					<li><label>Address: <input type="text" name="address"></label></li>
					<li><input type="submit" value="Submit" /> <input type="reset" value="Reset"/></li>   
				</ul>
   			 </form>
		</div>
	</body>
</html>
