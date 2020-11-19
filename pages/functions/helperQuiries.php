<?php
    function getLeagues($connection){
        $query = "SELECT leagueID as id, leagueName as name FROM leagues";

        $statement = $connection->prepare($query);
        $statement->execute();
        $leagues= $statement->fetchAll();

        return $leagues;
    }

    function getCoaches($connection){
        $query = "SELECT personID as id, concat(`firstName`,' ',`lastName`) as name FROM persons WHERE personTypeID = :coachID";

        $statement = $connection->prepare($query);
        $statement->bindValue(':coachID', 6);        

        $statement->execute();
        $coaches= $statement->fetchAll();

        return $coaches;
    }

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
        $query = "SELECT t.teamName as tName, t.teamRank as tRank, l.leagueName as lName, l.Country as country,
        concat(p.firstName, ' ' ,p.lastName) as coachName
        FROM Teams t
        INNER JOIN Leagues l ON l.leagueID=t.leagueID
        INNER JOIN Persons p on p.personID=t.coachID;";

            $statement = $connection->prepare($query);     

            $statement->execute();
            $teams= $statement->fetchAll();

            return $teams;

    }

    
?>