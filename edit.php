<?php
//database connection
include('config/db_connection.php');
$id = "";
$username = "";
$email = "";
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql ="SELECT * FROM `user_login` WHERE `id`='$id' LIMIT 1";
        $update = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($update);
        // print_r($row);
    } else {
        header("location: indexed.php");
        
    }
    $id = $row['id'];
    $username = $row['username'];
    $email = $row['email'];

}


// updating data 
if(isset($_POST)){
    
//database connection
include('config/db_connection.php');

//update data
//query creation
$sql = "UPDATE `user_login` SET `username`='$username',`email`='$email' WHERE `id`='$id'";

$update = mysqli_query($conn,$sql);

if($update){
    header("location: edit.php");
} else {
    echo "failed: " . mysqli_error($conn);
}

}



?>


<html lang="en">

<head>
  <title>PHP OPP Tutorial</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>

<body style="margin: 10px;">
  <div class="flex-container">

    <div class="flex-box1">
      <div class="new-user flex-box">
        <h2>Update User Information</h2>
        <?php 
        if(isset($row)){ ?>
            <form action="edit.php?id=<?php echo $id?>" method="POST">
          <input type="hidden" name="id" value="<?php echo $id ?>">
          <label>Username:</label>
          <input type="text" name="username" value="<?php echo $row['username'] ?>">
          <div class="error">
            <?php echo $errors['username'] ?? '' ?>
          </div>

          <label>Email:</label>
          <input type="text" name="email" value="<?php echo $row['email'] ?>">
          <div class="error">
            <?php echo $errors['email'] ?? '' ?>
          </div>
          <input type="submit" value="submit">
        </form>
        <?php }else{ 
           echo"NOT AVAILABLE";
        }
            
        ?>

        
      </div>
    </div>
    
  </div>
</body>
</html>