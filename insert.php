<?php
//database connection
include('config/db_connection.php');
// inserting data 
if (isset($_POST["username"]) && isset($_POST["email"])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    //save data to db using sqli 
    //query creation
    $sql = "INSERT INTO user_login (username, email) VALUES ('$username','$email')";


    //query execution or save data to database
    $result = mysqli_query($conn, $sql);

    // Redirect
    if ($username != '' && $email != '') {
        //  To redirect form on a particular page
        header("Location: indexed.php");
    }else{
        echo "please fill all fields";
    }


    //connection close
    mysqli_close($conn);
}
