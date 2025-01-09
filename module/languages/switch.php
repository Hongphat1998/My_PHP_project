<?php  
if(!isset($_SESSION)) session_start();
$_SESSION["locale"] = $_GET['lang']."";    

header("Location: " . $_SERVER['HTTP_REFERER']);
exit;