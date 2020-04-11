<?php
session_start();
$error = 0;
$_SESSION['profile_pic'] = 'default.png';

$error_image_array = array(
    ' Image should not more than 10mb to upload',
    ' Invalid Type'
); 
 
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
        upload($name, $tmp);
        $_SESSION['profile_pic'] = $name;
        header("location: form.php?user=".$_SESSION['username']);
    }
}

?>