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
   ?>

   <h1>Welcome <?php echo $login_session; ?></h1> 

   <table>
      <tr>
         <th>id</th>
         <th>title</th>
         <th>description</th>
         <th>status</th>
         <th>update status</th>
      </tr>
      <?php
         $res = mysqli_query($conn, "SELECT id FROM users WHERE username = '" . $login_session . "';");
         $user_id = mysqli_fetch_assoc($res)['id'];

         $tasks = mysqli_query($conn, "SELECT * FROM todos WHERE user_id = '" . $user_id . "';");

         while ($task=mysqli_fetch_assoc($tasks)) {
         echo "<tr>
                  <td>" . $task['id'] . "</td>
                  <td>" . $task['title'] . "</td>
                  <td>" . $task['description'] . "</td>
                  <td>" . $task['status'] . "</td>
                  <td><button>update</button></td>
               </tr>";
         }

         // $query = "SELECT * FROM todos WHERE "
      ?>
   </table>

   <a href = "logout.php"><button>Sign Out</button></a>
</body>
</html>
