<?php
include '../utilities/dbconnect.util.php';
session_start();
if(isset($_GET['logout'])){
    $userid = $_SESSION['userid'];
    $sql = "UPDATE users set last_logout = sysdate() where userid = '$userid'";
    mysqli_query($conn, $sql);
    unset($userid);
    header('location:../');
}
?>