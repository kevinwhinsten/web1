<?php
include '../include/DatabaseConnection.php';

if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['content'])) 
{
$id = intval($_POST['id']);
$title = $_POST['title'];
$content = $_POST['content']; 

try{
    $sql = "UPDATE posts SET title =:title, content = :content WHERE id= :id";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    $stmt->execute();
    
    header('Location:admin.php');
    exit;
} catch(PDOException $e){
    echo 'Database error'. $e->getMessage();

}
}