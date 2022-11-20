<?php

//database connection
include('config/db_connection.php');

// deleting data to sql
if (isset($_GET['id'])){
$id = $_GET['id'];

$sql = "DELETE FROM `user_login` WHERE `id`='$id'";

$delete = mysqli_query($conn, $sql);
    
}

// delete data from the form
$delete = "SELECT * from user_login";
$query = mysqli_query($conn,$delete);

// Redirect
if ($id != '') {
    //  To redirect form on a particular page
    header("Location: indexed.php?msg=Data deleted Successfully");
}else{
    echo "Failed:" . mysqli_error($conn);
}

?>