<?php
    include_once('../utilities/dbconnect.util.php');

    if(isset($_GET['userid'])){
        $userid = $_GET['userid'];
        $sql = "UPDATE users set status = '0', is_archived = '1' where userid = '$userid'";
        if(mysqli_query($conn, $sql)){
            header('location: ../home.php');
        }

        echo "Failed to delete record";
        echo "<a href='../home.php'>Go Back</a>";
    }

?>