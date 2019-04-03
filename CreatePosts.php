
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
        <div class="card-header">Create Post</div>
        <div class="card-body">
<?php 
  $mysqli = new mysqli("mysql.eecs.ku.edu", "j939v704", "ahLeiph4", "j939v704");  
  if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }
  $username = htmlspecialchars($_POST["usr"]);
  $postText = htmlspecialchars($_POST["postText"]);
  echo "User: " . $username . "<br>";
  /* Not blank */
  if ($username) {
    $exists = "SELECT * FROM Users WHERE username='" . $username . "'";
    $checkUser = $mysqli->query($exists);
    if ($checkUser->num_rows > 0) {
      $row = $checkUser->fetch_assoc();
      $user_id = $row['user_id'];
      echo "Userid: " . $user_id . "<br>";
      /* post data here */
      $query = "INSERT INTO Posts (content, author_id) 
                VALUES ('" . $postText . "','" . $user_id . "')";
      if ($result = $mysqli->query($query)) {
          echo "Inserted: " . $postText . "<br>";
          $result->free();
      } else {
        echo "Insertion failed.<br>";
      }
    } else {
      echo "Username does not exist: " . $username . "<br>";
    }
    $checkUser->free();
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
