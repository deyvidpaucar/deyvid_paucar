<?php
session_start();

session_destroy();

header("Location:loggin_index.php");
?>