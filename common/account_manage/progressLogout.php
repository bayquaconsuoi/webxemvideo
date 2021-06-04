<?php
session_start();

if(isset($_SESSION['user']) && $_SESSION['user'] != NULL){
    unset($_SESSION['user']);
    header('Location: ../../index.php');
}
if(isset($_SESSION['admin']) && $_SESSION['admin'] != NULL){
    unset($_SESSION['admin']);
    header('Location: ../../admin/index.php');
}
?>