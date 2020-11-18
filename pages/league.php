<?php 
// every page that requires a login requires
 require('functions/login.php');
 require('functions/menu.php');
 require('functions/db_connect.php');
 require('functions/saveLeague.php');


	isUserLogedIn();
	
	if($connection){
		saveLeagueToDatabase($connection);
	}else{
		echo "doesnt save";
	}
	
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
        <form id="league-form" method="post" action="league.php">
				 <ul>
					<li><label>League Name: <input type="text" name="leagueName" id="leagueName"></label></li>
					<li><label>World Rank: <input type="text" name="worldRank" id="worldRank"></label></li>
					<li><label>Country: <input type="text" name="country" id="country"></label></li>
					<li><input type="submit" value="Submit" /> <input type="reset" value="Reset"/></li>   
				</ul>
				</form>
				
		</div>
	</body>
</html>