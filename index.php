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

    $res = mysqli_query($conn, "SELECT COUNT(*) FROM users");
    $user_count = mysqli_fetch_assoc($res)['COUNT(*)'];
    $res = mysqli_query($conn, "SELECT COUNT(*) FROM todos");
    $task_count =  mysqli_fetch_assoc($res)['COUNT(*)'];


    echo " <h1>Serving " . $user_count . " users with " . $task_count . " tasks</h1>";

    mysqli_close($conn);
  ?>

  <h1>Welcome!</h1>
  <a href="login.php"><button>login</button></a>
  <a href="register.php"><button>register</button></a>


  <!-- TODO: zamykac polaczenie z baza danych -->
</body>
</html>