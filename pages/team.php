<?php 
// every page that requires a login requires
 require('functions/login.php');
 require('functions/menu.php');
 require('functions/db_connect.php');
 require('functions/saveTeam.php');


    isUserLogedIn();
    saveTeamToDatabase($connection);
	
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
        <form id="login-form" method="post" action="./team.php">
				 <ul>
					<li><label>Team Name: <input type="text" name="teamName" id="teamName"></label></li>
					<li><label>Team Rank: <input type="text" name="teamRank" id="teamRank"></label></li>
					<li><label>Team Address: <input type="text" name="teamAddress" id="teamAddress"></label></li>
					<li><input type="submit" value="Submit" /> <input type="reset" value="Reset"/></li>   
				</ul>
   			 </form>
		</div>
	</body>
</html>