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

  <a href="/todolist-php"><button><- go back</button></a>
  <h1>Welcome back!</h1>
  <p>Log in to get started</p>

  <form method="POST">
    <input type="text" name="login" placeholder="login"><br/>
    <input type="password" name="password" placeholder="password"><br/>
    
    <button type="submit">submit</button><br/>

     <?php 
      if ($_POST) {
        session_start();
        if ($_POST['login'] || $_POST['password']) {
          $query = "SELECT * FROM `users` WHERE username = '" . $_POST['login'] . "' AND password = '" . $_POST['password'] . "';";
          $res = mysqli_query($conn, $query);

          if (mysqli_num_rows($res) == 1) {
            echo "correct";
            $_SESSION['login_user'] = $_POST['login'];
            header("Location: dash.php");

          } else {
            echo "email or password incorrect";
          }
        } else {
        echo "all fields are required!";
        }

        mysqli_close($conn);
      }
    ?>
  </form>
</body>
</html>