<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "tesmkm";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST["btn"])){
    if($_POST["password"] === $_POST["repeat"]){
        $name = $_POST["username"];
        $pass = $_POST["password"];
        $sql = "insert into user(username, password) values('$name', '$pass')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    header('location:../front-end/index.html');
}
?>