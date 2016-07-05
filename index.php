<?php
$servername = "localhost";
$username = "username";
$password = "password";
echo 'meowth';
// Create connection
try {
  $conn = new mysqli($servername, $username, $password);
} 
catch{}
// Check connection
// Check connection
if (mysqli_connect_error()) {
  echo 'meowaaa';
}
echo "Connected successfully";
?>
