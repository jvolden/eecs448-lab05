
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
        <div class="card-header">Show User Posts</div>
        <div class="card-body">
<?php 
  $username = $_POST['usr'];
  echo "Posts for ".$username.":<br>";
  $mysqli = new mysqli("mysql.eecs.ku.edu", "j939v704", "ahLeiph4", "j939v704");  
  /* check connection */
  if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }
  /* Check if exists */
  $exists = "SELECT * FROM Posts WHERE author_id=(SELECT user_id FROM Users WHERE BINARY username='".$username."')";
  $checkUser = $mysqli->query($exists);
  if ($checkUser->num_rows > 0) {
    echo "<table class='table'><tr><th>ID</th><th>Post</th></tr>";
    while ($row = $checkUser->fetch_assoc()) {
      echo "<tr><td>".$row["post_id"]."</td><td>".$row["content"]."</td></tr>";
    }
    $checkUser->free();
  } else {
    echo "There are no posts for this user.<br>";
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
