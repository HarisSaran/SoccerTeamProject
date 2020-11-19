<?php


    function saveTeamToDatabase($connection){
        
        $teamName=(isset($_POST["teamName"]))? $_POST["teamName"]:null;
        $teamRank=(isset($_POST["teamRank"]))? $_POST["teamRank"]:null;
        $teamAddress=(isset($_POST["teamAddress"]))? $_POST["teamAddress"]:null;
        $leagueID=(isset($_POST["leagueID"]))? $_POST["leagueID"]:null;
        $coachID=(isset($_POST["coachID"]))? $_POST["coachID"]:null;
        $teamLogo=(isset($_POST["teamLogo"]))? $_POST["teamLogo"][0]:null;


        if($teamName == null)return;

        //$query = "INSERT INTO teams (teamName, teamRank, teamAddress) VALUES ('".$teamName."','".$teamRank."','".$teamAddress.")";
        $query = "INSERT INTO teams (teamName, teamRank, teamAddress, leagueID, coachID, teamLogo)
        VALUES (:teamName,:teamRank,:teamAddress, :leagueID, :coachID, :teamLogo)";
   
         $statement = $connection->prepare($query);

         $statement->bindValue(':teamName', $teamName);        
         $statement->bindValue(':teamRank', $teamRank);
         $statement->bindValue(':teamAddress', $teamAddress);
         $statement->bindValue(':leagueID', $leagueID);
         $statement->bindValue(':coachID', $coachID);
         $statement->bindValue(':teamLogo', $teamLogo);

         $statement->execute();
         $statement->closeCursor();
    }


?>