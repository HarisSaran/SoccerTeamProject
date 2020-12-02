<?php
require('functions/login.php');
require('functions/menu.php');
require('functions/db_connect.php');

require('functions/helperQuiries.php');

   isUserLogedIn();

   


$query = "SELECT * FROM comments ORDER BY time DESC LIMIT 5";
$statement = $connection->prepare($query); 
$statement->execute(); 
$blogposts = $statement->fetchAll();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Comments</title>
    <link rel="stylesheet" href="../cssStyles/comments.css" type="text/css">
    <!-- <link rel="stylesheet" href="../cssStyles/menu.css" type="text/css"/> -->
</head>
<body>
   
     <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Soccer Comments</a></h1>
        </div> 
<ul id="menu">
    <li><a href="comments.php" class='active'>Home</a></li>
    <li><a href="createComment.php" >New Comment</a></li>
    <li><a href="main.php" >Go To Main</a></li>
</ul> 
<div id="all_blogs">
    <?php foreach ($blogposts as $blogpost): ?>
      <div class="blog_post">
      <h2><a href="show.php?id=<?=$blogpost['id'] ?>"></a></h2>
      <p>
        <small>
          <?= date("M d, Y, h:i A", strtotime($blogpost['time'])) ?>
          <a href="editComment.php?id=<?=$blogpost['id'] ?>">Edit</a>
        </small>
      </p>
      <div class='blog_content'>
        <?php if (strlen($blogpost['content']) > 200): ?>
          <?= substr($blogpost['content'], 0, 200) ?>
          <a href="showComment.php?id=<?=$blogpost['id'] ?>">Read Full Post</a>
        <?php else: ?>
          <?= $blogpost['content'] ?>  
        <?php endif ?>
        
      </div>
    </div>
    <?php endforeach ?>
      
</div>
        <div id="footer">
            
        </div> 
    </div> 
</body>
</html>