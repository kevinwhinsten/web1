<?php
include("../include/DatabaseConnection.php");

if (!isset($_POST["author_name"])) {
    ob_start();
    include("../admin/add_author.html.php"); // Form thêm tác giả
    $output = ob_get_clean();
} else {
    $author_name = trim($_POST['author_name']);

    if (!empty($author_name)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO author (name) VALUES (:name)");
            $stmt->execute(['name' => $author_name]);
            header("Location:author.php"); // Chuyển về trang quản lý tác giả/người dùng
            exit;
        } catch (PDOException $e) {
            echo "Lỗi khi thêm tác giả: " . $e->getMessage();
        }
    } else {
        echo "Vui lòng nhập tên tác giả!";
    }
}

include("../admin/admin_layout.html.php");
