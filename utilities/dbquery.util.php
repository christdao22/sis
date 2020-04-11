<?php
function dbquery($sql = null)
{
    include 'dbconnect.util.php';
    $row = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($row);
    return $result;
} 
