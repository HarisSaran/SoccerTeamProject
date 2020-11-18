<?php 
// every page that requires a login requires
 require('functions/login.php');
 require('functions/menu.php');

	isUserLogedIn();
	
?>

	
<html>
	<head>
		<script src="../javascripts/logout.js" ></script>
		<link rel="stylesheet" href="../cssStyles/menu.css" type="text/css"/>
	</head>
	<body>
		<?php
		  echo getMenu();
		?>
		<div>
			<h1>CREATE PLAYER</h1>
		</div>
	</body>
</html>