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

    if(isset($_POST["btn"])){
        $sql = 'select * from user where username = "'.$_POST["username"].'" and password = "'.$_POST["password"].'"';
        $result = $conn->query($sql);

        echo $sql;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $sql1 = 'insert into login(username, time) values ("'.$_POST["username"].'", now())';
                if ($conn->query($sql1) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $_SESSION["username"] = $_POST["username"];
                #echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            } 
        }
        else {
        echo "0 results";
        }
        $conn->close();
    }
    $message = 'Hello, '.$_POST["username"].' your login time is '. date("h:i:sa");
    echo "<script>
    alert('".$message."');
    window.location.href='../front-end/index.html';
    </script>";
?>