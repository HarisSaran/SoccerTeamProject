
<?php

    //Contains functions to get objects from the database

    // returns all leagues in the databse
    function getLeagues($connection){
        $query = "SELECT leagueID as id, leagueName as name FROM leagues";

        $statement = $connection->prepare($query);
        $statement->execute();
        $leagues= $statement->fetchAll();

        return $leagues;
    }

    // returns all persons in person table which have the personTypeID that is eaqual to the coachID
    function getCoaches($connection){
        $query = "SELECT personID as id, concat(`firstName`,' ',`lastName`) as name FROM persons WHERE personTypeID = :coachID";

        $statement = $connection->prepare($query);
        $statement->bindValue(':coachID', 6);        

        $statement->execute();
        $coaches= $statement->fetchAll();

        return $coaches;
    }

    // returns all persons from person table which have person type id of the player
    function getPlayers($connection){
        //WHERE personTypeID = :playerID
        $query = "SELECT personID as id, concat(`firstName`,' ',`lastName`) as name FROM persons ";

        $statement = $connection->prepare($query);
        // $statement->bindValue(':playerID', 7);        

        $statement->execute();
        $players= $statement->fetchAll();

        return $players;
    }
    
    // returns all teams in the databsae
    // t.teamLogo as logo,
    function getTeams($connection){
        $query = "SELECT t.teamID as teamID, t.teamName as tName, t.teamRank as tRank, l.leagueName as lName, l.Country as country,
        concat(p.firstName, ' ' ,p.lastName) as coachName
        FROM Teams t
        INNER JOIN Leagues l ON l.leagueID=t.leagueID
        INNER JOIN Persons p on p.personID=t.coachID;";

            $statement = $connection->prepare($query);     

            $statement->execute();
            $teams= $statement->fetchAll();

            return $teams;

    }

    function deleteTeamPHP($connection, $teamID){

        $sql = 'DELETE FROM teams  WHERE teamID = :teamID';
        $q = $connection->prepare($sql);
        return $q->execute([':teamID' => $teamID]);
    }

    function getTeam($connection,$teamId){
        $query = "SELECT t.teamAddress as tAddress, t.teamName as tName, t.teamRank as tRank,t.coachID as coachID,t.leagueID as leagueID 
        FROM Teams t
        WHERE t.teamID=:teamID";
        $statement = $connection->prepare($query); 
        $statement->bindValue(':teamID', $teamId);     
        $statement->execute();
        $teams= $statement->fetchAll();
        return $teams[0];
    }
    
?>