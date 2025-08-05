<?php
require '../include/DatabaseConnection.php'; // Kết nối CSDL

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // An toàn

    try {
        $stmt = $pdo->prepare("DELETE FROM posts WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        header("Location: admin.php");
        exit;
    } catch (PDOException $e) {
        echo "Lỗi khi xóa bài viết: " . $e->getMessage();
        exit;
    }
} else {
    echo "Không tìm thấy ID bài viết để xóa.";
}
