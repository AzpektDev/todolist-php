<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ToDo list</title>
</head>
<body>
  <?php
    $conn = mysqli_connect("localhost", "root", "", "todo_list");
  ?>


  <h1>We're happy to see you!</h1>
  <p>Let's get started</p>
  <form method="POST">
    <input type="email" name="email" placeholder="email"><br/>
    <input type="text" name="login" placeholder="login"><br/>
    <input type="password" name="password" placeholder="password"><br/>
    
    <button type="submit">submit</button>
  </form>

  <?php 
    if ($_POST) {
      if ($_POST['email'] || $_POST['login'] || $_POST['password']) {
        $query = "SELECT * FROM `users` WHERE username = '" . $_POST['login'] . "' OR email = '" . $_POST['email'] . "';";
        $res = mysqli_query($conn, $query);

        if (mysqli_num_rows($res) != 0) {
          echo "email or username is already in use!";
        } else {
          $query = "INSERT INTO `users` (username, password, email) VALUES ('" . $_POST['login'] . "', '" . $_POST['password'] . "', '" . $_POST['email'] . "');";

          $res = mysqli_query($conn, $query);

          echo "registration succesfull! proceed to login...";
          header("Location: login.php");
        }
      } else {
      echo "all fields are required!";
      }

      mysqli_close($conn);
    }
  ?>
</body>
</html>