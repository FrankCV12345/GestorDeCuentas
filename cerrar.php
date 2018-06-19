<?php
session_start();
session_destroy();
echo "<script> alert('session cerrada');</script>";
header('Location:index.html');
?>