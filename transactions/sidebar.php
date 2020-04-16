<?php
session_start();
$uid = $_SESSION['userid'];
$sql = "SELECT * from users left join faculty on users.userid = faculty.userid where users.userid = '$uid'";
$row = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($row);
$picture = $result['profilePic'];
$lname = $result['lastname'];
$fname = $result['firstname'];
$mname = $result['middlename'];
$fid = $result['faculty_id'];
$email = $result['email'];
$usertype = $result['usertype'];