<?php
include("../include/DatabaseConnection.php");
$sql = "SELECT * FROM author";
$authors = $pdo->query($sql)->fetchAll();
ob_start();
include("../admin/author.html.php");
$output = ob_get_clean();
include("../admin/admin_layout.html.php");
