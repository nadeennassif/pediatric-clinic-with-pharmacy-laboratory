<?php
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    session_start();
    include_once("pages/conn.php");
    if(!isset($_SESSION['user'])){
        header("Location: index.php?rem=no_usr");
        exit();
    }
    if(empty($_GET['pid'])){
        header("Location: cart.php?error=no_id");
        exit();
    }
    $sql = "DELETE FROM cart WHERE pid='".$_GET['pid']."' AND uid='".$_SESSION['user']['id']."'; ";
    if($res = mysqli_query($conn,$sql)){
        header("Location: cart.php?remove=success");
        exit();
    }else{
        header("Location: cart.php?error=query_error");
        exit();
    }
}