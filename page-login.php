<?php
include ("connectdbshore.php");

/* get the incoming ID and password hash */

$email = $_POST["email"];
$password = $_POST["password"];

$password = sha1($password);


/* SQL statement to query the database */
$query = "SELECT * FROM user WHERE email = '$email' AND password = '$password' AND verified = 1";

/* query the database */
$result = mysqli_query($conn,$query);

/* Allow access if a matching record was found, else deny access. */
if (mysqli_num_rows($result) == 1)
  {
    while($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];
    }
    session_start();
    $_SESSION['id'] = $id;
    header("Cache-control: private");
    header("Location: index.php");
  /* access granted */
  //while ($row = mysql_fetch_assoc($result)) {
    //$id = $row['id'];
  }

 else {
  /* access denied &#8211; redirect back to login */
  echo "<script type='text/javascript'>alert('error');</script>";
  header("Location: ./page-login.html");
  //echo "error";
}

mysql_close($conn);
?>
