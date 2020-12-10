<?php 

// every page that requires a login requires
require('functions/login.php');
require('functions/menu.php');

require('functions/db_connect.php');
require('functions/saveTeam.php');
require('functions/helperQuiries.php');

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
	$url = "https://"; 
}else{
	$url = "http://";  
}   
// Append the host(domain name, ip) to the URL.   
$url.= $_SERVER['HTTP_HOST'];   
// Append the requested resource location to the URL   
$url.= $_SERVER['REQUEST_URI'];    

 $url_components = parse_url($url); 
 $word = "?";
 $team = null;
 $mode = "new";
 if(strpos($url, $word) !== false){
	parse_str($url_components['query'], $params); 
	 $teamId = $params['teamId'];
	 $team = getTeam($connection,$teamId);
	 $mode = "edit";
 }

	$leagues = getLeagues($connection);
	$coaches = getCoaches($connection);
	$players = getPlayers($connection);

	isUserLogedIn();
	if(isset($_POST['mode'])){
		$edit = $_POST['mode'];
		// echo $edit;
		if($edit == "new"){
			saveTeamToDatabase($connection);
		}else {//if($edit == "edit"){
			
			$updateId = $_POST['updateId'];
			$var=updateTeamInDatabase($connection,$updateId);
			// echo $var;
		}
		// else{
		// 	// error this should not happen
		// }
	}
    
	
?>

	
<html>
	<head>
		<!--script src="../javascripts/selectPlayer.js"></script-->
		<script src="../javascripts/logout.js" ></script>
		<!-- <link rel="stylesheet" href="../cssStyles/menu.css"  type="text/css"/> -->
		<link rel="stylesheet" href="../cssStyles/login.css" type="text/css" />
		<!-- bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<!-- end bootstrap -->
		<script>
			function updateMode(elm){
				let title = elm.value;
				let mode = "edit";
				if(title == "Save"){
					mode = "new";
				}
				document.getElementById("mode").value = mode; 
			}
		</script>
	</head>
	<body class="body_bg">
		<?php
		  echo getMenu();
		?>
		<div align="center" >
        <form id="team-form" class="form-class" method="post" action="./team.php" enctype="multipart/form-data">
			<input type="hidden" name="mode" id="mode" value="<?=$mode?>" />
			<input type="hidden" name="updateId" id="updateId" value="<?=($mode == "edit")?$teamId:null?>" />
				 <table>
					 <caption>
						 <?php 
					 		if($team == null){
								 echo "Add Team"; 
							}else{ 
								echo "Edit Team ".$team['tName'];
							}
					 	?>
					 </caption>
					 <tbody>
					<tr>
						<td>
							<label>Team Name:</label> 
						</td>

						<td>
						<input type="text" name="teamName" id="teamName" value="<?php 
							if($team == null){
								echo "";
							} else{
								echo $team['tName'];
							} 
							?>"
						/>
						</td>
					</tr>

					<tr>
						<td>
							<label>Team Rank:</label> 
						</td>

						<td>
							<input type="text" name="teamRank" id="teamRank" value="<?php if($team != null)echo $team['tRank'];?>"/>
						</td>
						
					</tr>

					<tr>
						<td>
							<label>Team Address: </label>
						</td>
						<td>
							<input type="text" name="teamAddress" id="teamAddress" value="<?php if($team != null)echo $team['tAddress'];?>"/>
						</td>
						
					</tr>

					<tr>
						<td>
							<label>Team Logo: </label>
						</td>
						<td>
							<input type="file" name="teamLogo" id="teamLogo"/>
						</td>
						
					</tr>

					<tr>
						<td>
							<label>Select League:</label>
						</td>
						<td>
							<select name= "leagueID" >
								<?php foreach($leagues as $league): ?>
								<option <?php 
									if($team != null){
										if($league['id'] == $team['leagueID']){
											echo 'selected';
										}
									 }?> value="<?= $league['id'] ?>"> <?= $league['name'] ?></option>
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
								   <option <?php 
									if($team != null){
										if($coach['id'] == $team['coachID']){
											echo 'selected';
										}
									 }?> value="<?= $coach['id'] ?>"> <?= $coach['name'] ?></option>
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
							<input onClick="updateMode(this);" type="submit" value="<?=($mode == "new")?"Save":"Update"?>" />
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