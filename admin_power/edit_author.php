<?php
include("../include/DatabaseConnection.php");

if (!isset($_POST["new_user_name"])) {
    // Hiển thị form sửa
    ob_start();
    include("../admin/edit_author.html.php");
    $output = ob_get_clean();
} else {
    $id = $_POST['author_id'];
    $author = trim($_POST['new_user_name']);

    if (!empty($author)) {
        try {
            $sql = "UPDATE author SET name = :name WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $author);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            header("Location: manage_user_module.php"); // Chuyển về danh sách
        } catch (PDOException $e) {
            echo "Lỗi khi sửa môn học: " . $e->getMessage();
        }
    } else {
        echo "Tên môn học không được để trống!";
    }
}

include("../admin/admin_layout.html.php");
