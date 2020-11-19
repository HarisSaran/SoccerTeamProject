<?php 
// every page that requires a login requires
 require('functions/login.php');
 require('functions/menu.php');
 require('functions/db_connect.php');

require('functions/helperQuiries.php');

	isUserLogedIn();
	$teams = getTeams($connection);
?>

	
<html>
	<head>
		<script src="../javascripts/logout.js" ></script>
		<link rel="stylesheet" href="../cssStyles/menu.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="../cssStyles/login.css">

	</head>
	<body class="body_bg">
		<?php
		  echo getMenu();
		?>
		<div align="center">
		<form  id="register-form" name="register-form" class="form-class" method="post" action="./register.php">
				 <table >
					 <caption>Registered Teams</caption>
					 <thead>
						<tr>
						<!-- <th>Logo</th> -->
						<th>Name</th>
						<th>Rank</th>
						<th>League</th>
						<th>Country</th>
						<th>Coach Name</th>
						</tr>
					</thead>
					 <tbody >

					 <?php foreach($teams as $team): ?>
						<tr>
						
						<td><?=$team["tName"]?></td>
						<td><?=$team["tRank"]?></td>
						<td><?=$team["lName"]?></td>
						<td><?=$team["country"]?></td>
						<td><?=$team["coachName"]?></td>
						</tr>
					 <?php endforeach ?>

					</tbody>
				</table>
		</form>

		</div>
	</body>
</html>

