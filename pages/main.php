<?php 
// every page that requires a login requires
 require('functions/login.php');
 require('functions/menu.php');
 require('functions/db_connect.php');

require('functions/helperQuiries.php');

	isUserLogedIn();

	if(isset($_POST['editTeamID'])){
		$teamId = $_POST['editTeamID'];
		if($teamId != null){
			header("Location: ../pages/team.php?teamId=".$teamId);
			exit();
		}
		
	}


	$displayDelete = "none";
	if(getUserType()=="admin"){
		$displayDelete = "inline";
	}
	if(isset($_POST['deleteTeamID'])){
		$teamID = $_POST['deleteTeamID'];
		if($teamID != null){
			$deleted = deleteTeamPHP($connection, $teamID);
		}
	}
		$teams = getTeams($connection);
	
	
	
?>

	
<html>
	<head>
		<script src="../javascripts/logout.js" ></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<!-- <link rel="stylesheet" href="../cssStyles/menu.css" type="text/css"/> -->
		<link rel="stylesheet" href="../cssStyles/teams.css" type="text/css" />
		<!-- bootstrap -->
		
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
  		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
		 
		<!-- end bootstrap -->

		<script>
			function deleteTeamJS(teamElm){

				if (confirm('Are you sure you want to delete team from database?')) {
					let elm= document.getElementById("deleteTeamID");
					elm.value=teamElm.id;
					document.getElementById("teams-form").submit();
				} else {
  					// Do nothing!
				}
				
			}
			function editTeamJS(editElm){
				let elm= document.getElementById("editTeamID");
				elm.value=editElm.id.split("_")[1];
				document.getElementById("teams-form").submit();
			}
		</script>
	</head>
	<body class="body_bg">
		<?php
		  echo getMenu();
		?>
		<div align="center" width="100%">
		<form  id="teams-form" name="teams-form" class="team-form-class" method="post" action="./main.php"  width="100%">
			<input type="hidden" name="deleteTeamID" id="deleteTeamID" value="<?=null?>" />
			<input type="hidden" name="editTeamID" id="editTeamID" value="<?=null?>" />

				 <table  width="100%" >
					 <caption>Registered Teams</caption>
					 <thead>
						<tr>
						<!-- <th>Logo</th> -->
						<th>Logo</th>
						<th>Name</th>
						<th>Rank</th>
						<th>League</th>
						<th>Country</th>
						<th>Coach Name</th>
						<th style="display:<?=$displayDelete?>">Delete</th>
						<th style="display:<?=$displayDelete?>">Edit</th>
						</tr>
					</thead>
					 <tbody >

					 <?php foreach($teams as $team): ?>
						<tr>
						<td>
						  <img height="50px" width="50px" src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($team["teamLogo"]); ?> " />
						</td>
						<td><?=$team["tName"]?></td>
						<td><?=$team["tRank"]?></td>
						<td><?=$team["lName"]?></td>
						<td><?=$team["country"]?></td>
						<td><?=$team["coachName"]?></td>
						<td style="display:<?=$displayDelete?>"> <input id="<?=$team["teamID"]?>" type = "button" onClick= "deleteTeamJS(this)" value="Delete"/>  </td>
						<td style="display:<?=$displayDelete?>"> <input id="edit_<?=$team["teamID"]?>" type = "button" onClick= "editTeamJS(this)" value="Edit"/>  </td>
						</tr>
					 <?php endforeach ?>

					</tbody>
				</table>
		</form>

		</div>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	</body>
</html>

