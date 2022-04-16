<?php 

session_start();
unset($_SESSION['s_username']);

header("Location: ../index.php");

?>