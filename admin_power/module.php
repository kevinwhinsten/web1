<?php
include("../include/DatabaseConnection.php");
$sql = "SELECT * FROM module";
$modules = $pdo->query($sql)->fetchAll();
ob_start();
include("../admin/module.html.php");
$output = ob_get_clean();
include("../admin/admin_layout.html.php");
