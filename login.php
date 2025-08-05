<?php
try {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
       
        // Start session if not already started
        include 'include/DatabaseConnection.php';
        $username = $_POST["username"];
        $password = $_POST["password"];

        $stmt = $pdo->prepare("SELECT * FROM author WHERE name = :username AND password = :password");
        $stmt->execute([':username' => $username, ':password' => $password]);
        $user = $stmt->fetch();
        
        if ($stmt->rowCount() > 0) {
            $output = 'Login successful';
            session_start();
            $_SESSION['user'] = $username;
            $_SESSION['id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            if ($user['role'] == 'admin') {
                header('location:admin_power/admin.php');
            } else {
                header('location:home.php');
            }

        
        } else {
            $output = 'login unsuccessful';
            echo "<script>alert(Invalid username or password.)</script>";
        }
    }else {
         ob_start();
        include("template/login.html.php");
        $output = ob_get_clean();

    }

}catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    include("template/layout.html.php");
?>  