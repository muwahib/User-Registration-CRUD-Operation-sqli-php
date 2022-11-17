<?php
//require('user_validator.php');

if (isset($_POST["username"]) && isset($_POST["email"])) {
  $username = $_POST['username'];
  $email = $_POST['email'];


  //save data to db using sqli 
  //database connection
  include('config/db_connection.php');

  //query creation
  $sql = "INSERT INTO user_login (username, email) VALUES ('$username','$email')";


  //query execution or save data to database
  

  //connection close
  mysqli_close($conn);
  
}

// if(isset($rows['id']) && isset($rows['username']) && isset($rows['email'])){
//   $id = $rows['id'];
//   $username = $rows['username'];
//   $email = $rows['email'];

//   //database connection
//   include('config/db_connection.php');

  
//   //query creation
//   $sql= "SELECT * FROM userdata ORDER BY id DESC";

  
//   $result = mysqli_query($conn, $sql);
//   echo '<pre>';
//   print_r($result);
//   echo '</pre>';
//   die();

//   // read data from the database to my table
//   $table = mysqli_fetch_all($result, MYSQLI_ASSOC);

//   print_r($table);
  
//   //mysqli_free_result($result);

//   //mysqli_close($conn);
// }

?>



<html lang="en">

<head>
  <title>PHP OPP Tutorial</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
  <div class="flex-container">
    
    <div class="flex-box1">
      <div class="new-user flex-box">
        <h2>Create new user</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
          <label>Username:</label>
          <input type="text" name="username" value="">
          <div class="error">
            <?php echo $errors['username'] ?? '' ?>
          </div>
  
          <label>Email:</label>
          <input type="text" name="email" value="">
          <div class="error">
            <?php echo $errors['email'] ?? '' ?>
          </div>
          <input type="submit">
        </form>
      </div>
    </div>


    <div class="flex-box2">
      <div class="table flex-box">
        <h2>LOGIN FORM</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="#">
          <div class="st_wrap_table" data-table_id="0">
            <header class="st_table_header">
              <div class="st_row">
                <div class="st_column _id">ID</div>
                <div class="st_column _username">USERNAME</div>
                <div class="st_column _email">EMAIL</div>
              </div>
            </header>
          </div>

        <?php
            //  LOOP TILL END OF DATA
            //while($rows=$table->mysqli_fetch_all())
            //{
        ?>
          <div class="st_table">
            <div class="st_row">
              <div class="st_column _id"><?php // echo $rows['_id'];?></div>
              <div class="st_column _username"><?php // echo $rows['_username'];?></div>
              <div class="st_column _email"><?php // echo $rows['_email'];?></div>
            </div>
          </div>
        <?php // } ?>

        </form>
      </div>
    </div>

  </div>
</body>

</html>