<?php


    function saveTeamToDatabase($connection){
        
        $teamName=(isset($_POST["teamName"]))? $_POST["teamName"]:null;
        $teamRank=(isset($_POST["teamRank"]))? $_POST["teamRank"]:null;
        $teamAddress=(isset($_POST["teamAddress"]))? $_POST["teamAddress"]:null;

        if($teamName == null)return;

        //$query = "INSERT INTO teams (teamName, teamRank, teamAddress) VALUES ('".$teamName."','".$teamRank."','".$teamAddress.")";
        $query = "INSERT INTO teams (teamName, teamRank, teamAddress) VALUES (:teamName,:teamRank,:teamAddress)";
   
         $statement = $connection->prepare($query);
         $statement->bindValue(':teamName', $teamName);        
         $statement->bindValue(':teamRank', $teamRank);
         $statement->bindValue(':teamAddress', $teamAddress);
         $statement->execute();
         $statement->closeCursor();
    }


?>