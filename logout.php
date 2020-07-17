<?php
unset($_SESSION['code']);
session_destroy(); // destroy session
header("location:login.php"); 

?>