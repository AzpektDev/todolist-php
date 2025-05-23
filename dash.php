<?php
   include('session.php');
?>
<html>
<head>
   <title>Welcome </title>
</head>
<body>
   <h1>Welcome <?php echo $login_session; ?></h1> 
   <a href = "logout.php"><button>Sign Out</button></a>
</body>
</html>
