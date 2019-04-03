
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">Show Users</div>
        <div class="card-body">
<?php 
  $mysqli = new mysqli("mysql.eecs.ku.edu", "j939v704", "ahLeiph4", "j939v704");  
  /* check connection */
  if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }
  /* Check if exists */
  $exists = "SELECT * FROM Users";
  //echo "Query String: " . $exists . "<br>";
  $checkUser = $mysqli->query($exists);
  if ($checkUser->num_rows > 0) {
    echo "<table class='table'><tr><th>ID</th><th>Username</th></tr>";
    while ($row = $checkUser->fetch_assoc()) {
      echo "<tr><td>".$row["user_id"]."</td><td>".$row["username"]."</td></tr>";
    }
    $checkUser->free();
  } else {
    echo "There are no users.<br>";
  }
  $mysqli->close();
?>
        </div>
      </div>
    </div>
  </div>
</div>
  
</body>
</html>
