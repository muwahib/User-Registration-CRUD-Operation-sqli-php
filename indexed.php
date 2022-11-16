<?php
//require('user_validator.php');

if (isset($_POST["username"]) && isset($_POST["email"])) {
  $username = $_POST['username'];
  $email = $_POST['email'];

  // validate enteries
  //$validation = new UserValidator($_POST);
  //$errors = $validation->validateForm();

//////////////////////////////////////////////////////////////////////////////////////////////

  //save data to db using sqli 
  //database connection
  include('config/db_connection.php');

  //query creation
  $sql = "INSERT INTO user_login (username, email) VALUES ('$username','$email')";
  
  
  //query execution
  $result = mysqli_query($conn, $sql);
  // echo '<pre>';
  // print_r($result);
  // echo '</pre>';
  // die();

  // $login = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // mysqli_free_result($result);

  mysqli_close($conn);

  

  //show message sucessfully / non sucessfully

  // if (mysqli_query($conn, $sql)) {
  //   //success
  //   echo "it is successfully saved";
  // } else {
  //   //error
  //   echo "query Error, non-successfully saved";
  // }
}
?>



<html lang="en">
<head>
  <title>PHP OPP Tutorial</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

  <div class="new-user">

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
</body>

</html>