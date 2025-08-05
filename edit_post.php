<?php
include "include/DatabaseConnection.php";
  try{
    $id = intval($_GET["id"]);
     
        $sql = 'SELECT * FROM posts WHERE id=:id';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
           
            if($stmt->rowCount()>0){
                $post = $stmt->fetch(PDO::FETCH_ASSOC);
            }else{
                die("post not skibidi");
            }
            ob_start();
            include "template/edit_post.html.php";
            $output =ob_get_clean();

            
  }catch(PDOException $error){
      die("");
  }
    include "template/layout.html.php";
