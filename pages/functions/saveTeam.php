<?php

    // save the team to the database
    function saveTeamToDatabase($connection){
        
        $teamName=(isset($_POST["teamName"]))? $_POST["teamName"]:null;
        $teamRank=(isset($_POST["teamRank"]))? $_POST["teamRank"]:null;
        $teamAddress=(isset($_POST["teamAddress"]))? $_POST["teamAddress"]:null;
        $leagueID=(isset($_POST["leagueID"]))? $_POST["leagueID"]:null;
        $coachID=(isset($_POST["coachID"]))? $_POST["coachID"]:null;
       
        $empty = empty($_FILES["teamLogo"]["name"]);
       
        if(!$empty){
            $teamLogo= $_FILES["teamLogo"]["tmp_name"];
            $logoContent = addslashes(file_get_contents($teamLogo));
        }else{
            $logoContent = null;
        }
// echo $logoContent;

        if($teamName == null)return;

        //$query = "INSERT INTO teams (teamName, teamRank, teamAddress) VALUES ('".$teamName."','".$teamRank."','".$teamAddress.")";
        $query = "INSERT INTO teams (teamName, teamRank, teamAddress, leagueID, coachID, teamLogo)
        VALUES ("
        ."'".$teamName."'".
        ",". $teamRank.
        ",'".$teamAddress."'".
        ",".$leagueID.
        ",".$coachID.
        ",'".$logoContent."' )";
      
        // -- VALUES (:teamName,:teamRank,:teamAddress, :leagueID, :coachID, :teamLogo)";
         $statement = $connection->prepare($query);

        //  $statement->bindValue(':teamName', $teamName);        
        //  $statement->bindValue(':teamRank', $teamRank);
        //  $statement->bindValue(':teamAddress', $teamAddress);
        //  $statement->bindValue(':leagueID', $leagueID);
        //  $statement->bindValue(':coachID', $coachID);
        //  $statement->bindValue(':teamLogo', $logoContent);
       
        $ret = $statement->execute();
         //$statement->closeCursor();
       
    }

    function updateTeamInDatabase($connection,$teamID){
      

        $teamName=(isset($_POST["teamName"]))? $_POST["teamName"]:null;
        $teamRank=(isset($_POST["teamRank"]))? $_POST["teamRank"]:null;
        $teamAddress=(isset($_POST["teamAddress"]))? $_POST["teamAddress"]:null;
        $leagueID=(isset($_POST["leagueID"]))? $_POST["leagueID"]:null;
        $coachID=(isset($_POST["coachID"]))? $_POST["coachID"]:null;
        
       
        $empty = empty($_FILES["teamLogo"]["name"]);
       
        if(!$empty){
            $teamLogo= $_FILES["teamLogo"]["tmp_name"];
            $logoContent = addslashes(file_get_contents($teamLogo));
        }else{
            $logoContent = null;
        }

        if($teamName == null)return;

        $query = "UPDATE teams 
        SET teamName = '".$teamName."'".
        ",teamRank = ". $teamRank.
        ",teamAddress = '".$teamAddress."'".
        ",leagueID = ".$leagueID.
        ",coachID = ".$coachID.
        ",teamLogo = '".$logoContent."'".
        " WHERE teamID = ".$teamID;
        // echo $query;
//, teamLogo = :teamLogo

        $statement = $connection->prepare($query);
        // $statement->bindValue(':teamID', $teamID);
        $ret= $statement->execute();


       return $ret;
        // $statement->closeCursor();
        
    }
?>
