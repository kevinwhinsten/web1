<?php
include("../include/DatabaseConnection.php");

if (!isset($_POST["author_id"])) {
    ob_start();
    include("../admin/delete_author.html.php");
    $output = ob_get_clean();
    $title = "Delete author";
} else {
    $sql = "DELETE FROM posts WHERE author_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $_POST["author_id"]);
    $stmt->execute();



    $sql = "DELETE FROM author WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $_POST["author_id"]);
    if ($stmt->execute()) {
        header("Location:manage_user_module.php"); // Chuyển về trang quản lý người dùng
        exit;
    } else {
        $output = "❌ Lỗi khi xóa tác giả!";
    }
    $title = "Delete author";
}

include("../admin/admin_layout.html.php");