<?php

    // saves the league intered into the database
    function saveLeagueToDatabase($connection){
        $leagueName=(isset($_POST["leagueName"]))? $_POST["leagueName"]:null;
        $worldRank=(isset($_POST["worldRank"]))? $_POST["worldRank"]:null;
        $country=(isset($_POST["country"]))? $_POST["country"]:null;

        if($leagueName == null)return;


        $query = "INSERT INTO leagues (leagueName, worldRank, Country) values (:leagueName, :worldRank, :country)";
   
         $statement = $connection->prepare($query);
         $statement->bindValue(':leagueName', $leagueName);        
         $statement->bindValue(':worldRank', $worldRank);
         $statement->bindValue(':country', $country);

         $statement->execute();

         $statement->closeCursor();
         
    }


?>

