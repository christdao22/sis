<?php
session_start();
$error = 0;
$_SESSION['profile_pic'] = 'default.png';

$error_image_array = array(
    ' Image should not more than 10mb to upload',
    ' Invalid Type'
); 

// change this into a variable and make it a indicator if change or register
if (isset($_GET['userid'])){
    $_SESSION['userid'] = $_GET['userid'];
}
if (isset($_POST['cancel'])){
    header("location: ../admin/account.php?user=".$_SESSION['userid']);
} 
if (isset($_POST['skip'])){
    $_SESSION['profile_pic'] = 'default.png';
    header("location: form.php?user=".$_SESSION['username']);
}
if (isset($_FILES["imageToUpload"])) {
    $image = $_FILES["imageToUpload"];
    $name = $image['name'];
    $type = $image['type'];
    $size = $image['size'];
    $tmp = $image['tmp_name'];

    $error = validateImage($size, $type, $name, $tmp);
}


function validateImage($size= null, $type=null, $name=null, $tmp=null){
    if (validateImageType($type)){
        return 2;
    }
    elseif (validateImageSize($size)){
        return 1;
    }
    else{ 
        $destination = "../upload/" . basename($name);
        upload($name, $tmp, $destination);
        if(isset($_SESSION['userid'])){
            include '../utilities/dbconnect.util.php'; 
            $destination = "../upload/" . basename($name);
            upload($name, $tmp, $destination);
            $userid = $_SESSION['userid'];
            $destination = "upload/" . basename($name);
            $sql = "UPDATE users set profilePic = '$destination' where userid = '$userid'";
            mysqli_query($conn, $sql); 
            header("location: ../admin/account.php?user=".$userid);
        }
        else{
            $destination = "upload/" . basename($name);
            upload($name, $tmp, $destination);
            $_SESSION['profile_pic'] = $name;
            header("location: form.php?user=".$_SESSION['username']);
        }

    }
}

?>