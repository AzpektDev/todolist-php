<?php
   include('session.php');
?>
<html>
<head>
   <title>Dashboard </title>
</head>
<body>
   <?php
      $conn = mysqli_connect("localhost", "root", "", "todo_list");
      $res = mysqli_query($conn, "SELECT id FROM users WHERE username = '" . $login_session . "';");
      $user_id = mysqli_fetch_assoc($res)['id'];
   ?>

   <h1>Welcome <?php echo $login_session; ?></h1> 

   <div>
      <h3>Add a task</h3>

      <form method="POST">
         <input type="text" placeholder="title" name="title">
         <input type="text" placeholder="description" name="description">

         <button type="submit">submit</button>
      </form>
      <?php 
         if ($_POST) {
            if (isset($_POST['title']) && isset($_POST['description'])) {
               $query = "INSERT INTO `todos` (user_id, title, description, status) VALUES (" . $user_id . ", '" . $_POST['title'] . "', '" . $_POST['description'] . "', 0);";
               $res = mysqli_query($conn, $query);

               header("Refresh: 0");
            } else if (isset($_POST['id'])) {
               $query = "UPDATE todos SET status = CASE WHEN status = 0 THEN 1 ELSE 0 END WHERE id = " . $_POST['id'] . ";";
               $res = mysqli_query($conn, $query);

               header("Refresh: 0");
            }
         }
      ?>
   </div>

   <hr/>

   <table>
      <tr>
         <th>id</th>
         <th>title</th>
         <th>description</th>
         <th>completed?</th> 
         <th>update status</th>
      </tr>
      <?php
         $tasks = mysqli_query($conn, "SELECT * FROM todos WHERE user_id = '" . $user_id . "';");

         while ($task=mysqli_fetch_assoc($tasks)) {
            if ($task['status'] == 0) {
               $status = "no";
            } else {
               $status = "yes";
            }


            echo "<tr>
                     <td>" . $task['id'] . "</td>
                     <td>" . $task['title'] . "</td>
                     <td>" . $task['description'] . "</td>
                     <td>" . $status . "</td>
                     <td><form method=\"POST\"><input type=\"hidden\" name=\"id\" value=" . $task['id'] . "><button type=\"submit\">update</button></form></td>
                  </tr>";
         }

         // $query = "SELECT * FROM todos WHERE "
      ?>
   </table>

   <hr/>

   <a href = "logout.php"><button>Sign Out</button></a>
</body>
</html>
