<?php 
    require('functions/login.php');
    require('functions/menu.php');
    require('functions/db_connect.php');
    
    require('functions/helperQuiries.php');
    
       isUserLogedIn();

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM comments WHERE id = $id";
    $statement = $connection->prepare($query); 
    $statement->execute(); 
    $blogpost = $statement->fetch();

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Soccer Comments</title>

    <link rel="stylesheet" href="../cssStyles/comments.css" type="text/css">

</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Soccer Comments</a></h1>
        </div> 
<ul id="menu">
    <li><a href="index.php" >Home</a></li>
    <li><a href="create.php" >New Post</a></li>
    <li><a href="main.php" >Go To Main</a></li>
</ul> 
  <div id="all_blogs">
    <div class="blog_post">
      <h2><?= $blogpost['title'] ?></a></h2>
      <p>
        <small>
        <?= date('M d, Y, h:m A', strtotime($blogpost['datetime'])) ?>
          <a href="edit.php?id=<?= $id ?>">edit</a>
        </small>
      </p>
      <div class='blog_content'>
        <?= $blogpost['content'] ?>

      </div>
    </div>
  </div>
        <div id="footer">
            
        </div> 
    </div> 
    
</body>
</html>