<?php
include("../include/DatabaseConnection.php");
if(!isset($_POST["module_name"])){
    ob_start();
    include("../admin/add_module.html.php");
    $output = ob_get_clean();

}else{
    include '../include/DatabaseConnection.php';
    $module_name = trim($_POST['module_name']);

    if (!empty($module_name)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO module (name) VALUES (:name)");
            $stmt->execute(['name' => $module_name]);
            header("Location:module.php"); // Chuyển về danh sách môn học
            exit;
        } catch (PDOException $e) {
            echo "Lỗi khi thêm môn học: " . $e->getMessage();
        }
    } else {
        echo "Vui lòng nhập tên môn học!";
    }

}

include("../admin/admin_layout.html.php");

