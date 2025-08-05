<?php
try {
    include '../include/DatabaseConnection.php';

     $stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $admin = true; // Giả sử bạn đang ở trang quản trị

    $title = 'Joke list';
    

    ob_start();
    include '../admin/admin_posts.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include '../admin/admin_layout.html.php';
?>