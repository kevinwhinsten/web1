<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
try {
    include "include/DatabaseConnection.php";

    // Truy vấn dữ liệu từ bảng 'posts'
    $stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Nạp giao diện nội dung
    ob_start();
    include "template/posts.html.php";
    $output = ob_get_clean();

} catch (PDOException $e) {
    // Nếu có lỗi thì ngắt buffer và hiển thị lỗi
    ob_end_clean();
    $output = "❌ Lỗi CSDL: " . $e->getMessage();
}

// Giao diện tổng thể (layout)
include "template/layout.html.php";
