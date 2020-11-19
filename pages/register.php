<?php 

 require('functions/menu.php');
 require('functions/saveMember.php');
 require('functions/db_connect.php');

 if($connection){
	$validateResult = saveToDatabase($connection);
 }
 

 function getErrorMessage($json,$element){
	 if($json){
		if(!$json->valid){
			 $errors = $json->errors;
			 foreach($errors as $error){
				 if($error["element"] == $element){
					 return $error["message"];
				 }
			 }
		 }
	 }
		 return "";
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
		<div align="center" >
			 <form id="register-form" class="form-class" method="post" action="./register.php">
				 <table >
					 <caption>Register as Member</caption>
					 <tbody >
					<tr>
						<td><label>First Name: </label></td><td><input type="text" name="firstName" id="firstName">
						<label style="font-size:10px;color:red"><?php echo getErrorMessage($validateResult,"firstName") ?></label></td>
					</tr>
					<tr>
					<td><label>Last Name: </label></td><td><input type="text" name="lastName" id="lastName">
						<label style="font-size:10px;color:red"><?php echo getErrorMessage($validateResult,"lastName") ?></label></td>
					</tr>
					<tr>
					<td><label>Phone Number: </label></td><td><input type="text" name="phoneNumber">
						<label style="font-size:10px;color:red"><?php echo getErrorMessage($validateResult,"phoneNumber") ?></label></td>
					</tr>
					<tr>
					<td><label>Email Address: </label></td><td><input type="text" name="emailAddress">
						<label style="font-size:10px;color:red"><?php echo getErrorMessage($validateResult,"email") ?></label></td>
					</tr>
					<tr>
					<td><label>Address: </label></td><td><input type="text" name="address">
						<label style="font-size:10px;color:red"><?php echo getErrorMessage($validateResult,"address") ?></label></td>
					</tr>
					<tr>
					<td><label>User Name: </label></td><td><input type="text" name="userName">
						<label style="font-size:10px;color:red"><?php echo getErrorMessage($validateResult,"userName") ?></label></td>
					</tr>
					<tr>
					 <td><label>Password: </label></td><td><input type="Password" name="password">
						<label style="font-size:10px;color:red"><?php echo getErrorMessage($validateResult,"password") ?></label></td>
					</tr>
					<tr><td><input type="submit" value="Submit" /> </td><td><input type="reset" value="Reset"/></td></tr>   
					</tbody>
				</table>
   			 </form>
		</div>
	</body>
</html>