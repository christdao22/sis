<?php
if(isset($_POST['submit'])){
    session_start();    
    $_SESSION['password'] = $password = $_POST['password'];
    $_SESSION['username'] = $username = $_POST['username'];
    
    $sql = "SELECT *, count(*) as user from users where username = '$username' and password = '$password'";
    $result = dbquery($sql);
    
    $_SESSION['userid'] = $userid = $result["userid"];
    $usertype = $result["usertype"];
    if($result['user'] != 0){
        if($usertype == 'admin'){
            proceed($userid, $username, 'admin/');
        }
        elseif($usertype == 'student'){
            proceed($userid, $username, 'my');
        }
    }
    else{
        echo "<div class='alert alert-danger role='alert' style='border:1px solid red; color:red; font-size:11px'>The username and password you've entered doesn't match any account</div>";
    }
}

function proceed($userid, $username, $destination){
    $sql = "UPDATE users set last_login = sysdate() where userid = '$userid'";
    mysqli_query($conn, $sql);
    header('location:'.$destination);
}

?>