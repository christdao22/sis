<?php
if(isset($_POST['submit'])){
    session_start();    
    $_SESSION['password'] = $password = $_POST['password'];
    $_SESSION['username'] = $username = $_POST['username'];
    
    $sql = "SELECT userid, count(*) as user from users where username = '$username' and password = '$password'";
    $result = dbquery($sql);
    $result["userid"];
    $_SESSION['userid'] = $userid = $result["userid"];
    if($result['user'] != 0){
        $sql = "UPDATE users set last_login = sysdate() where userid = '$userid'";
        mysqli_query($conn, $sql);
        header('location:home.php?user='.$username);
    }
    else{
        echo "<div class='alert alert-danger role='alert' style='border:1px solid red; color:red; font-size:11px'>The username and password you've entered doesn't match any account</div>";
    }
}

?>