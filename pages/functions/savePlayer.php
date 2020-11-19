<?php
     
     // Pass the form information into variables
     function savePlayerToDatabase($connection){
        $firstName=(isset($_POST["firstName"]))? $_POST["firstName"]:null;
        $lastName=(isset($_POST["lastName"]))? $_POST["lastName"]:null;
        $phoneNumber=(isset($_POST["phoneNumber"]))? $_POST["phoneNumber"]:null;
        $emailAddress=(isset($_POST["emailAddress"]))? $_POST["emailAddress"]:null;
        $personAddress=(isset($_POST["address"]))? $_POST["address"]:null;
        $personTypeID = 5;
    
        if($firstName == null)return;
     

     
        $query = "INSERT INTO persons (firstName, lastName, phoneNumber, emailAddress, personAddress, personTypeID) 
        VALUES (:firstName, :lastName, :phoneNumber, :emailAddress, :personAddress, :personTypeID)";

        
        $statement = $connection->prepare($query);
    
        $statement->bindValue(':firstName', $firstName);        
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':phoneNumber', $phoneNumber);
        $statement->bindValue(':emailAddress', $emailAddress);        
        $statement->bindValue(':personAddress', $personAddress);
        $statement->bindValue(':personTypeID', $personTypeID);

        $statement->execute();
        $statement->closeCursor();
     }
?>
