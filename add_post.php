<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "include/DatabaseConnection.php";

// Lấy danh sách tác giả và môn học để truyền vào form
$authors = $pdo->query("SELECT * FROM author")->fetchAll();
$modules = $pdo->query("SELECT * FROM module")->fetchAll();

$error = '';
$output = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
    $author_id = $_SESSION['id'] ?? ''; 
    $module_id = $_POST['module'] ?? '';

    try {
        // Kiểm tra dữ liệu không rỗng
        if ($title === '' || $content === '') {
            $error = "❗Tiêu đề và nội dung không được để trống.";
            ob_start();
            include "template/add_post.html.php";
            $output = ob_get_clean();
        } else {
            // Xử lý upload ảnh
            if (
                isset($_FILES["img"]) &&
                is_uploaded_file($_FILES['img']['tmp_name']) &&
                $_FILES['img']['name'] != ''
            ) {
                $imageTmpath = $_FILES['img']['tmp_name'];
                $imageName = basename($_FILES['img']['name']);
                $uploaddir = 'Upload/';
                // Tạo tên file duy nhất
                $imgpath = $uploaddir . uniqid() . '-' . $imageName;
                move_uploaded_file($imageTmpath, $imgpath);
            } else {
                $imgpath = NULL;
            }

            // Chèn vào bảng 'posts'
            $sql = "INSERT INTO posts (title, content, created_at, image_path, author_id, module_id) VALUES (:title, :content, NOW(), :image_path, :author_id, :module_id)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":content", $content);
            $stmt->bindParam(":image_path", $imgpath);
            $stmt->bindParam(":author_id", $author_id);
            $stmt->bindParam(":module_id", $module_id);
            $stmt->execute();

            // Chuyển hướng sau khi thêm
            header("Location: posts.php");
            exit;
        }
    } catch (PDOException $e) {
        ob_end_clean();
        $output = "❌ Lỗi CSDL: " . $e->getMessage();
    }
} else {
    // Hiển thị form khi chưa submit
    ob_start();
    include "template/add_post.html.php";
    $output = ob_get_clean();
}

// Giao diện tổng thể
include "template/layout.html.php";