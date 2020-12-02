<?php 
  require('db_connect.php');

    // $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    

    if ($_POST['command'] == 'Delete') {
        $query = "DELETE FROM comments WHERE id = :id";
        $statement = $connection->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
    }

    if (strlen($content) > 0) {

        if ($_POST['command'] == 'Create') {
            $query = "INSERT INTO comments (content) values (:content)";
            $statement = $connection->prepare($query);
            // $statement->bindValue(':title', $title);
            $statement->bindValue(':content', $content);
            $statement->execute();
        }
        

        if ($_POST['command'] == 'Update') {
            $query = "UPDATE comments SET content = :content WHERE id = :id";
            $statement = $connection->prepare($query);
            // $statement->bindValue(':title', $title);
            $statement->bindValue(':content', $content);
            $statement->bindValue(':id', $id);
            $statement->execute();
        }

      header('Location:../comments.php');
        
    } else {
        echo 'Enter a valid post.';
        header("refresh:1;url=../createComment.php");
    }

?>