<?php 

ob_start();
include '../admin/admin_home.html.php';
$output = ob_get_clean();
include '../admin/admin_layout.html.php';
?>