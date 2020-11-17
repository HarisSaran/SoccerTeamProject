<?php

function isUserLogedIn(){
    $cookie_name = 'userLogedIn';
    $logout = false;
   
    // if user clicks logout, then logout
    if(isset($_POST['logout'])){
        $logout = $_POST['logout'];
    }

    // if the user has logged out set the cookie to expired
    if($logout){
        setcookie($cookie_name,'', time() - 360000,'/');
        //$ival = $_COOKIE[$cookie_name];
        // redirect to the login page
        header("Location: ../pages/soccerLogin.php");
        exit();
    }
    
    $isset = isset($_COOKIE[$cookie_name]);
    //$value = ($isset)?$_COOKIE[$cookie_name]:"";
    
    // if cookie is not set, redirect to the login page, the cookie is only set when user is logged in
    if(!$isset)  {
        header("Location: ../pages/soccerLogin.php");
        exit();
    }
// if we get here the cookie is set
    return true;
}



?>