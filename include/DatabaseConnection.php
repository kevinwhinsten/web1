<?php
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=stack_overflex;charset=utf8mb4",
        "root",
        ""
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "❌ Kết nối CSDL thất bại: " . $e->getMessage();
    exit;
}
