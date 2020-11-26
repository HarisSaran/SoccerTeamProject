
<?php
//Validate info passed into member form and display error message if empty field or if incorrect input.

require("passwordManager.php");



// Pass the form information into variables and sanatize
function saveToDatabase($connection){
   $submiting = (isset($_POST["firstName"]))? $_POST["submiting"]:null;
   //prevents from showing errors on first load, errors should only be shown after submitting 
   if($submiting == null or $submiting == 'false')return;

   $firstName=(isset($_POST["firstName"]))? $_POST["firstName"]:null;
   $firstName = filter_var($firstName, FILTER_SANITIZE_STRING);

   $lastName=(isset($_POST["lastName"]))? $_POST["lastName"]:null;
   $lastName = filter_var($lastName, FILTER_SANITIZE_STRING);

   $phoneNumber=(isset($_POST["phoneNumber"]))? $_POST["phoneNumber"]:null;
   $phoneNumber = filter_var($phoneNumber, FILTER_SANITIZE_STRING);

   $emailAddress=(isset($_POST["emailAddress"]))? $_POST["emailAddress"]:"null@null.com";
   $emailAddress = filter_var($emailAddress, FILTER_SANITIZE_STRING);

   $address=(isset($_POST["address"]))? $_POST["address"]:null;
   $address = filter_var($address, FILTER_SANITIZE_STRING);

   $userName=(isset($_POST["userName"]))? $_POST["userName"]:null;
   $userName = filter_var($userName, FILTER_SANITIZE_STRING);

   $password=(isset($_POST["password"]))? $_POST["password"]:null;
   $password = filter_var($password, FILTER_SANITIZE_STRING);

   $validateResult = validateForm($firstName, $lastName, $phoneNumber, $emailAddress, $address, $userName, $password);
   if( !$validateResult->valid)return $validateResult;

//    $connection = getConnection();
   $salt=randomSalt();
   $encriptedPassword=getEncriptedPassword($password,$salt);

   $query = "INSERT INTO Persons (firstName, lastName, phoneNumber, emailAddress, personAddress, userID, userPassword, salt, personTypeID) VALUES ('".$firstName."','".$lastName."','".$phoneNumber."','".$emailAddress."','".$address."','".$userName."','".$encriptedPassword."','".$salt."','4')";
   
   $statement = $connection->prepare($query);
   $statement->execute();
   $statement->closeCursor();
}


// here we validate the fields in the form

function validateForm($firstName, $lastName, $phoneNumber, $emailAddress, $address, $userName, $password) {
		
   // $ret = json_encode((object) null); //{"valid":true,"errors": [],};
   $ret=json_decode('{}');
   $ret->valid=true;
   $ret->errors=[];

//    var obj = { "children": [] };
// // Your looping code here
//    obj.children.push(child);

   if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $emailAddress)) {
      
      $error = array(
         "element" => "email",
         "message" => "please enter valid email address",
      );
      $ret->valid = false;
      array_push($ret->errors, $error);
   }

   if ($firstName == null or $firstName == "") {
      $error = array(
         "element" => "firstName",
         "message" => "First Name can not be empty",
      );
      $ret->valid = false;
      array_push($ret->errors, $error);
   }else{
      $containsDigit   = preg_match('/\d/',          $firstName);
      $containsSpecial = preg_match('/[^a-zA-Z\d]/', $firstName);
      if( $containsDigit or $containsSpecial ){
         $error = array(
            "element" => "firstName",
            "message" => "Cannot contain special characters or numbers",
         );
         $ret->valid = false;
         array_push($ret->errors, $error);
      }
   }

   if ($lastName == null or $lastName == "") {
      $error = array(
         "element" => "lastName",
         "message" => "Last Name can not be empty",
      );
      $ret->valid = false;
      array_push($ret->errors, $error);
   }else{
      $containsDigit   = preg_match('/\d/',          $lastName);
      $containsSpecial = preg_match('/[^a-zA-Z\d]/', $lastName);
      if( $containsDigit or $containsSpecial ){
         $error = array(
            "element" => "lastName",
            "message" => "Cannot contain special characters or numbers",
         );
         $ret->valid = false;
         array_push($ret->errors, $error);
       }
      }
   if ($phoneNumber == null or $phoneNumber == "") {
      $error = array(
         "element" => "phoneNumber",
         "message" => "Phone Number can not be empty",
      );
      $ret->valid = false;
      array_push($ret->errors, $error);
   }else{
      if(!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phoneNumber)) {
         $error = array(
            "element" => "phoneNumber",
            "message" => "Can only contain numbers",
         );
         $ret->valid = false;
         array_push($ret->errors, $error);
       }  
    }

   if ($address == null or $address == "") {
      $error = array(
         "element" => "address",
         "message" => "Address can not be empty",
      );
      $ret->valid = false;
      array_push($ret->errors, $error);
   }else{
      //validate characters
   }

   if ($userName == null or $userName == "") {
      $ret->valid = false;
      $error = array(
         "element" => "userName",
         "message" => "User Name can not be empty",
      );
      array_push($ret->errors, $error);
   }

   if ($password == null or $password == "") {
      $ret->valid = false;
      $error = array(
         "element" => "password",
         "message" => "Password can not be empty",
      );
      array_push($ret->errors, $error);
   }
   

   // return json_encode($ret);
   return $ret;
}

?>
