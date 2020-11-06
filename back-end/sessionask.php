<?php
    session_start();
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
    
    if(isset($_SESSION["username"])){
        $sql1 = 'insert into login(username, time) values ("'.$_SESSION["username"].'", now())';
        if ($conn->query($sql1) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $message = 'Hello, '.$_SESSION["username"].' your login time is '. date("h:i:sa");
        echo "<script>
        alert('".$message."');
        window.location.href='../front-end/index.html';
        </script>";
    }
    else{
        header('location:../front-end/signin.html');
    }
?>