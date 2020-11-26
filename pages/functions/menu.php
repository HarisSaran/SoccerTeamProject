
<?php

   function displayLogout(){
    $cookie_name = 'userLogedIn';
    $isset = isset($_COOKIE[$cookie_name]);
    if($isset)  {
        return true;
    }else{
        return false;
        // return true;
    }
}

function getUserType(){
    $cookie_name = 'userLogedIn';
    $ival = $_COOKIE[$cookie_name];
    return $ival;
}


function getMenu(){

    if(displayLogout()){
        $endMenue='<div class="animation start-home"></div></nav></div>';
        $additionalMenue = '';
        if(getUserType()=="admin"){
            $additionalMenue ='<a onClick="goToPage(\'league.php\')">Add League</a>
                               <a onClick="goToPage(\'team.php\')">Add Team</a>
                               <a onClick="goToPage(\'player.php\')">Add Player</a>';
        }
        $menu= '
        <div style="height: 60px;">
        <nav> 
            <a onClick="goToPage(\'main.php\')">Go To Main</a>
            <a href="#">About</a>
            <a onClick="logout()" href="#">Logout</a>'.$additionalMenue.$endMenue; 
    }else{
        $menu= '
        <div style="height: 60px;">
        <nav> 
            <a onClick="goToPage(\'main.php\')">Go To Main</a>
            <a href="#">About</a>
            <a onClick="goToPage(\'soccerLogin.php\')">Login</a>
            <a onClick="goToPage(\'register.php\')">Register</a>
            <div class="animation start-home"></div>
        </nav>
        </div>
        ';
    }
    
    return $menu;
}
?> 

