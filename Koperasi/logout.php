<?php
session_start();
session_unset("username");
header("location:index.php");
?>
