<?php 
  require('functions/login.php');
  require('functions/menu.php');
  require('functions/db_connect.php');
  
  require('functions/helperQuiries.php');
  
     isUserLogedIn();

  $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
  
  if (!$id) {
    header('Location:comments.php');
  }

  $query = "SELECT * FROM comments WHERE id = :id";
  $statement = $connection->prepare($query);
  $statement->bindValue(':id', $id);
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
            <h1><a href="comments.php">Soccer Comments</a></h1>
        </div>
<ul id="menu">
    <li><a href="comments.php" >Home</a></li>
    <li><a href="createComment.php" >New Comment</a></li>
    <li><a href="main.php" >Go To Main</a></li>
</ul>
<div id="all_blogs">
  <form action="functions/process_post.php" method="post">
    <fieldset>
      <legend>Edit Comment</legend>
     
      <p>
        <label for="content">Content</label>
        
        <textarea name="content" id="content"><?= $blogpost['content'] ?></textarea>
      
      </p>
      
      <p>
        <input type="hidden" name="id" value="<?= $id ?>" />
        <input type="submit" name="command" value="Update" />
        <input type="submit" name="command" value="Delete" onclick="return confirm('Are you sure you want to delete your comment?')" />
      </p>
    </fieldset>
  </form>
</div>
        <div id="footer">
            
        </div>
    </div>
</body>
</html>