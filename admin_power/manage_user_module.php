<?php

ob_start();
include "../admin/manage_user_module.html.php";
$output = ob_get_clean();
include '../admin/admin_layout.html.php';
?>