<?php 
    
    require('functions/login.php');
    require('functions/menu.php');
    require('functions/db_connect.php');
    
    require('functions/helperQuiries.php');
    
       isUserLogedIn();
  
    $query = "SELECT * FROM comments";
    $statement = $connection->prepare($query); 
    $statement->execute(); 
    $posts = $statement->fetchAll();

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Soccer Comments</title>
    <link rel="stylesheet" href="../cssStyles/comments.css" type="text/css">
    <!-- <link rel="stylesheet" href="../cssStyles/menu.css" type="text/css"/> -->

</head>
<body>
    
    <div id="wrapper">
        <div id="header">
            <h1><a href="comments.php">Soccer Comments</a></h1>
        </div> 
<ul id="menu">
    <li><a href="comments.php" >Home</a></li>
    <li><a href="createComment.php" class='active'>New Post</a></li>
    <li><a href="main.php" >Go To Main</a></li>
</ul> 
<div id="all_blogs">
  <form action="functions/process_post.php" method="post">
    <fieldset>
      <!-- <legend>New Comment</legend>
      <p>
        <label for="title">Title</label>
        <input name="title" id="title" />
      </p> -->
      <p>
        <label for="content">Content</label>
        <textarea name="content" id="content"></textarea>
      </p>
      <p>
        <input type="submit" name="command" value="Create" />
      </p>
    </fieldset>
  </form>
</div>
        <div id="footer">
            
        </div> 
    </div> 
</body>
</html>