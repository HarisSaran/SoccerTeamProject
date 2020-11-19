<?php 
// every page that requires a login requires
 require('functions/login.php');
 require('functions/menu.php');

 require('functions/db_connect.php');
 require('functions/saveTeam.php');
 require('functions/helperQuiries.php');

	$leagues = getLeagues($connection);
	$coaches = getCoaches($connection);
	$players = getPlayers($connection);

    isUserLogedIn();
    saveTeamToDatabase($connection);
	
?>

	
<html>
	<head>
		<!--script src="../javascripts/selectPlayer.js"></script-->
		<script src="../javascripts/logout.js" ></script>
		<link rel="stylesheet" href="../cssStyles/menu.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="../cssStyles/login.css">
	</head>
	<body class="body_bg">
		<?php
		  echo getMenu();
		?>
		<div align="center">
        <form id="team-form" class="form-class" method="post" action="./team.php">
				 <table>
					 <caption>Add Team</caption>
					 <tbody>
					<tr>
						<td>
							<label>Team Name:</label> 
						</td>

						<td>
							<input type="text" name="teamName" id="teamName"/>
						</td>
					</tr>

					<tr>
						<td>
							<label>Team Rank:</label> 
						</td>

						<td>
							<input type="text" name="teamRank" id="teamRank"/>
						</td>
						
					</tr>

					<tr>
						<td>
							<label>Team Address: </label>
						</td>
						<td>
							<input type="text" name="teamAddress" id="teamAddress"/>
						</td>
						
					</tr>

					<tr>
						<td>
							<label>Team Logo: </label>
						</td>
						<td>
							<input multiple="false" type="file" name="teamLogo" id="teamLogo"/>
						</td>
						
					</tr>

					<tr>
						<td>
							<label>Select League:</label>
						</td>
						<td>
							<select name= "leagueID">
								<?php foreach($leagues as $league): ?>
								<option value="<?= $league['id'] ?>"> <?= $league['name'] ?></option>
								<?php endforeach ?>
							</select>
						</td>	
					</tr>

					<tr>
						<td>
							<label>Select Coach:</label>
						</td>
						<td>
							<select name= "coachID">
								<?php foreach($coaches as $coach): ?>
								<option value="<?= $coach['id'] ?>"> <?= $coach['name'] ?></option>
								<?php endforeach ?>
							</select>
						</td>	
					</tr>

					<!--tr>
						<td>
							<label>Add Players:</label>
						</td>
						<td>
							<ul>
								<?php //foreach($players as $player): ?>
								<li> 
									<input id="<?//= "player-".$player['id'] ?>" name="playerIDbox" type="checkbox" onClick="playerSelected(this)"/>
									<?//= $player['name'] ?>
								</li>
								<?php //endforeach ?>
								</ul>
						</td>	
					</tr-->

					<tr>
						<td>
						<input type="submit" value="Submit" />
						</td>

						<td>
						<input type="reset" value="Reset"/>
						</td>
					</tr>  
					</tbody> 
				</table>
				<input  id="players" name="players" type="hidden" value=""/>
   			 </form>
		</div>
	</body>
</html>