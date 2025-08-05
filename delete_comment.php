<?php
require 'include/DatabaseConnection.php'; // Kết nối CSDL

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // An toàn
    $post_id = intval($_GET['postid']); // An toàn, nếu cần dùng

    try {
        $stmt = $pdo->prepare("DELETE FROM comments  WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        header("Location: post.php?id=$post_id"); // Chuyển hướng về trang bài viết
        exit;
    } catch (PDOException $e) {
        echo "Lỗi khi xóa bài viết: " . $e->getMessage();
        exit;
    }
} else {
    echo "Không tìm thấy ID bài viết để xóa.";
}
