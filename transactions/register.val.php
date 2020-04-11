<?php
session_start();
$unErrors = $passErrors = 0;
if (isset($_POST['submit'])) {

    $uname = $_POST['username'];
    $pass = $_POST['password'];
    $repass = $_POST['repass'];
    $usertype = 'student';

    $_SESSION['username'] = $uname;
    $_SESSION['password'] = $pass;
    $_SESSION['usertype'] = $usertype;

    $unErrors = validateUname($uname);

    if (validatePass($pass) || validatePass($repass)) {
        $passErrors = 13;
    } 
    else if (($pass == $repass)) {
        if ($unErrors == 0 && $passErrors == 0) {
            header("location: upload.php?user=" . $uname);
        }
    } 
    else {
        $passErrors = 12;

    }
}


function validateUname($str)
{
    $sql = "SELECT count(*) as count_username from users where username='$str'";
    $result = dbquery($sql);
    if (isEmpty($str) || isLenLessthanTwo($str) || isStartWithSpecialChar(trim($str)) || isContainHtmlTag($str)) {
        return 11;
    }
    if ($result['count_username'] != 0) {
        return 10;
    }
}

function validatePass($pass)
{
    if (isEmpty($pass) || isContainHtmlTag($pass)) {
        return true;
    }
}
