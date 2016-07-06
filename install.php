<?php
$conn = @new mysqli('localhost', 'root', 'devops', 'devopsdb');

if ($conn->connect_errno) {
    die('Connect Error: ' . $mysqli->connect_errno);
}

// sql to create table
$sql = "CREATE TABLE dbversion (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
version VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table dbversion created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "INSERT INTO dbversion (version)
VALUES ('1.2')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "SELECT version FROM dbversion ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["version"]. "<br>";
    }
} else {
    echo "0 results";
}



$conn->close();

// $result = mysqli_query($mysqli,"INSERT INTO `users` (`name`,`email`) VALUES ('John Doe','john.doe@gmail.com')")

?>
