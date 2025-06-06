<?php
if(!isset($_SESSION['id'])){
    session_start();
}else{
    header("Location: login.php");
}
?>