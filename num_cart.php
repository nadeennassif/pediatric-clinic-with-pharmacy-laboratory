<?php
session_start();
include_once("pages/conn.php");
if(isset($_SESSION['user'])){
    $sql = "SELECT cid FROM cart WHERE uid='".$_SESSION['user']['id']."';";
    if($res = mysqli_query($conn,$sql)){
        echo $res->num_rows;
        exit();
    }
}