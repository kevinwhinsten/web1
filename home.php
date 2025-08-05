<?php 
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
ob_start();
include 'template/home.html.php';
$output = ob_get_clean();
include 'template/layout.html.php';
?>