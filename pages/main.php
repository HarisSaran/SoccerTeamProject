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
		<link rel="stylesheet" type="text/css" href="../cssStyles/login.css">

	</head>
	<body>
		<?php
		  echo getMenu();
		?>
		<div>
			<h1>DISPLAY SOCCER TEAMS</h1>
		</div>
	</body>
</html>

