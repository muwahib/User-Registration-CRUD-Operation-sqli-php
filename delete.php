<?php

//database connection
include('config/db_connection.php');

// deleting data to sql
if (isset($_GET['id'])){
$id = $_GET['id'];

$sql = "DELETE FROM `user_login` WHERE `id`='$id'";

$result = mysqli_query($conn, $sql);
    
}

// delete data from the form
$sql = "SELECT * from user_login";
$result = mysqli_query($conn,$sql);

// Redirect
if ($id != '') {
    //  To redirect form on a particular page
    header("Location: index.php?msg=Data deleted Successfully");
}else{
    echo "Failed:" . mysqli_error($conn);
}

?>