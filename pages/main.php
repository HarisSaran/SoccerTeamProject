<?php 
// every page that requires a login requires
 require('functions/login.php');
 require('functions/menu.php');
require('functions/helperQuiries.php');
	isUserLogedIn();
	$teams = getTeams();
?>

	
<html>
	<head>
		<script src="../javascripts/logout.js" ></script>
		<link rel="stylesheet" href="../cssStyles/menu.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="../cssStyles/login.css">

	</head>
	<body>
		<?php
		  echo getMenu();
		?>
		<div>
		<form id="register-form" name="register-form" class="form-class" method="post" action="./register.php">
				 <table >
					 <caption>Registered Teams</caption>
					 <tbody >



					</tbody>
				</table>
		</form>

		</div>
	</body>
</html>

