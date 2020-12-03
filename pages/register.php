<?php 

 require('functions/menu.php');
 require('functions/saveMember.php');
 require('functions/db_connect.php');
 require_once("functions/recaptchalib.php");

 $reCaptchaMessage=false;
 $submiting = (isset($_POST["submiting"]))? $_POST["submiting"]:null;
$response = null;
$captcha = null;

if (isset($_POST["g-recaptcha-response"])) {
	 $captcha=$_POST['g-recaptcha-response'];
}
$validateResult = null;
$response = null;
if($captcha !=null){
	$secretKey = "6LdM4fYZAAAAAAeX0cETRKNLDKDMonGL-8U0TuCs";
	$ip = $_SERVER['REMOTE_ADDR'];
	// post request to server
	$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
	$response_file = file_get_contents($url);
	$responseKeys = json_decode($response_file,true);
	// should return JSON with success as true
	$response = $responseKeys["success"];
}

if ($response != null && $response) {
	if($connection){
		$validateResult = saveToDatabase($connection);
	 }
  } else {
	if ($submiting !=null){
		$reCaptchaMessage = true;
	}
  }

 function getErrorMessage($json,$element){
	 if($json == null) return "";
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
		<script src="../javascripts/clearForm.js" ></script>
		<link rel="stylesheet" href="../cssStyles/menu.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="../cssStyles/login.css">
		<script src='https://www.google.com/recaptcha/api.js'></script>
<?php

 if($reCaptchaMessage){
	 echo "<script>alert('Please verify yourself as human');</script>";
 }else{

 }

?>
	</head>
	<body id="body_bg" class="body_bg">

		<?php
		  echo getMenu();
		?>
		<?php //echo json_encode($validateResult); ?>
		<div align="center" >
			 <form id="register-form" name="register-form" class="form-class" method="post" action="./register.php">
			 

				 <table >
					 <caption>Register as Member</caption>
					 <tbody >
					<tr>
						<td>
							<label>First Name: </label>
						</td>
						<td>
							<input type="text" 
								value="<?php echo (isset($_POST["firstName"]))? $_POST["firstName"]:null;?>" 
								name="firstName" 
								id="firstName" 
							/>
						<label style="font-size:10px;color:red"><?php echo getErrorMessage($validateResult,"firstName") ?></label></td>
					</tr>
					<tr>
					<td>
						<label>Last Name: </label>
					</td>
					<td>
						<input type="text" 
						    value="<?php echo (isset($_POST["lastName"]))? $_POST["lastName"]:null;?>" 
							name="lastName" 
							id="lastName" 
						/>
						<label style="font-size:10px;color:red"><?php echo getErrorMessage($validateResult,"lastName") ?></label>
					</td>
					</tr>
					<tr>
					<td><label>Phone Number: </label></td>
					<td>
						<!-- fields wont errase -->
						<input 
						    value="<?php echo (isset($_POST["phoneNumber"]))? $_POST["phoneNumber"]:null;?>" 
							type="text" 
							name="phoneNumber"
						/>
						<label style="font-size:10px;color:red"><?php echo getErrorMessage($validateResult,"phoneNumber") ?></label>
					</td>
					</tr>
					<tr>
					<td><label>Email Address: </label></td>
					<td>
						<input 
							value="<?php echo (isset($_POST["emailAddress"]))? $_POST["emailAddress"]:null;?>" 
							type="text"
						 	name="emailAddress"
						 />
						<label style="font-size:10px;color:red"><?php echo getErrorMessage($validateResult,"email") ?></label>
					</td>
					</tr>
					<tr>
					<td>
						<label>Address: </label>
					</td>
					<td>
						<input 
							value="<?php echo (isset($_POST["address"]))? $_POST["address"]:null;?>"
							type="text"
							name="address"
						/>
						<label style="font-size:10px;color:red"><?php echo getErrorMessage($validateResult,"address") ?></label></td>
					</tr>
					<tr>
					<td>
						<label>User Name: </label>
					</td>
					<td>
						<input 
							value="<?php echo (isset($_POST["userName"]))? $_POST["userName"]:null;?>"
							type="text"
						 	name="userName"
						 />
						<label style="font-size:10px;color:red"><?php echo getErrorMessage($validateResult,"userName") ?></label></td>
					</tr>
					<tr>
					 <td>
						 <label>Password: </label>
						</td>
						<td>
							<input
								value="<?php echo (isset($_POST["password"]))? $_POST["password"]:null;?>"
							 	type="Password" 
								name="password"
							 />
						<label style="font-size:10px;color:red"><?php echo getErrorMessage($validateResult,"password") ?></label></td>
					</tr>
					<tr>
						<td>
							<input onClick="document.getElementById('submiting').value='true';" type="submit" value="Submit" /> </td>
							<input  type="hidden" value="false" id="submiting" name="submiting" /> </td>
						<td><input type="reset" onClick="clearForm('register-form')" value="Reset"/></td>
					</tr> 
					<tr>

 						<td></td>
 						<td>
							<div class="g-recaptcha" data-sitekey="6LdM4fYZAAAAAK14SDBRjj20M_MR2jmown5VPVeP"></div>
 						</td>
					</tr>  
					</tbody>
				</table>

   			 </form>
		</div>
	</body>
</html>