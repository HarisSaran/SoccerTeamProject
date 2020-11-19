<?php 

 require('functions/menu.php');
 require('functions/saveMember.php');
 require('functions/db_connect.php');
 if($connection){
	$validateResult = saveToDatabase($connection);
 }

 function getErrorMessage($validateResult){
	 if(!$validateResult->valid){
		return "ERROR" ;
	 }
	
 }
?>

<html>
	<head>
		<script src="../javascripts/logout.js" ></script>
		<link rel="stylesheet" href="../cssStyles/menu.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="../cssStyles/login.css">
		

	</head>
	<body id="body_bg" class="body_bg">

		<?php
		  echo getMenu();
		?>
		<?php //echo json_encode($validateResult); ?>
		<div align="center">
			 <form id="register-form" class="form-class" method="post" action="./register.php">
				 <ul>
					<li>
						<label>First Name: <input type="text" name="firstName" id="firstName"></label>
						<label style="font-size:6px;color:red"><?php echo getErrorMessage($validateResult) ?></label>
					</li>
					<li><label>Last Name: <input type="text" name="lastName" id="lastName"></label></li>
					<li><label>Phone Number: <input type="text" name="phoneNumber"></label></li>
					<li><label>Email Address: <input type="text" name="emailAddress"></label></li>
					<li><label>Address: <input type="text" name="address"></label></li>
					<li><label>User Name: <input type="text" name="userName"></label></li>
					<li><label>Password: <input type="Password" name="password"></label></li>
					<li><input type="submit" value="Submit" /> <input type="reset" value="Reset"/></li>   
				</ul>
   			 </form>
		</div>
	</body>
</html>