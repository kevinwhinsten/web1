<?php
include("../include/DatabaseConnection.php");
if(!isset($_POST["module_id"])){
    ob_start();
    include("../admin/delete_module.html.php");
    $output = ob_get_clean();
    $title = "Delete module";
}else{
    $sql = "DELETE FROM module WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam("id", $_POST["module_id"]);
    $stmt->execute();
    // Gán thông báo sau khi xóa
    $output = "<p>delete successfully</p>";
    $title = "Delete module";
    if ($stmt->execute()) {
        header("Location:manage_user_module.php"); // Chuyển về trang quản lý môn học
        exit;
    } else {
        $output = "❌ Lỗi khi xóa môn học!";
    }
    $title = "Delete module";
}

include("../admin/admin_layout.html.php");