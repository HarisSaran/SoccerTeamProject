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
        <form id="league-form" class="form-class" method="post" action="league.php">
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