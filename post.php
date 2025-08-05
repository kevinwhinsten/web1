<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'include/DatabaseConnection.php';

// Xử lý xóa bài viết nếu có ?delete=id
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    try {
        $stmt = $pdo->prepare("DELETE FROM posts WHERE id = ?");
        $stmt->execute([$id]);
        header("Location: posts.php"); // Tránh xóa lại nếu F5
        exit;
    } catch (PDOException $e) {
        echo "Lỗi khi xóa bài viết: " . $e->getMessage();
        exit;
    }
}


include 'include/DatabaseConnection.php';

if (isset($_GET['id'])) {
    $id = intval( $_GET['id']);

    try {
        $stmt = $pdo->prepare("SELECT  posts.id, title, content, created_at,image_path,author.name,module.name AS modulename FROM posts
        INNER JOIN author ON author_id=author.id
        INNER JOIN module ON module_id=module.id
        WHERE posts.id = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $post = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $pdo->prepare("SELECT comments.id,post_id,commenter_id,comment_content,created_at,author.name FROM comments 
        INNER JOIN author ON commenter_id=author.id
         WHERE post_id = :post_id ORDER BY created_at DESC");
         $stmt->bindValue(":post_id", $id);
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);


        ob_start();
        include "template/post.html.php";
        $output = ob_get_clean();

    } catch (PDOException $e) {
        $output = "❌ Lỗi khi truy xuất bài viết: " . $e->getMessage();
    }

   
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_comment'])) {
    $commenter_name = 2; // Không lấy từ form nữa
    $comment_content = $_POST['comment_content'] ?? '';
    $post_id = $_GET['id'];
    $created_at = date('Y-m-d H:i:s');

    if (!empty($comment_content)) {
        $stmt = $pdo->prepare('INSERT INTO comments (post_id, commenter_id, comment_content, created_at) 
                               VALUES (:post_id, :commenter_name, :comment_content, :created_at)');
        $stmt->execute([
            ':post_id' => $post_id,
            ':commenter_name' => $commenter_name,
            ':comment_content' => $comment_content,
            ':created_at' => $created_at
        ]);
        header("Location: post.php?id=$post_id");
        exit();
    }
    
}


} else {
    echo "⚠️ Không có ID hợp lệ trong URL.";
}



// Hiển thị giao diện
include 'template/layout.html.php';
?>




