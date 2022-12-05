<?php
//database connection
include('config/db_connection.php');

//read data from sql or fetch data from sql
//query creation
$sql = "SELECT * FROM user_login ORDER BY id ASC";

//query execution or gee queryga to database $connection
$result = mysqli_query($conn, $sql);

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
        <h2>Create new user</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <?php
        include "/xampp/htdocs/Login/insert.php";
        ?>
          <input type="hidden" name="id" value="">
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
  <?php
  
  ?>

    <div class="flex-box2">
      <div class="table flex-box">
        <h2>USERS FORM</h2>
        <table class="table text-center">
          <thead>
            <tr class="bg-dark text-white">
              <th>ID</th>
              <th>USERNAME</th>
              <th>EMAIL</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              // read data of each row
              while($row = mysqli_fetch_assoc($result)){
            
              echo "<tr>
              <td>" . $row["id"] . "</td>
              <td>" . $row["username"] . "</td>
              <td>" . $row["email"] . "</td>
              <td>
              <a class='btn btn-primary btn-sm' href='edit.php?id=$row[id]'>Edit</a>
              <a class='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>Delete</a>
              </td>
              </tr>";
              }
              mysqli_free_result($result);
            ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</body>

</html>
