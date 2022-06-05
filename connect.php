<?php
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];

$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "pet";


if (isset($_POST['loginup'])) {
    // Create connection
    $conn = new mysqli($servername, $username, $pass, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $stmt = $conn->prepare("INSERT INTO loginup (phone, email,password) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $phone, $email, $password);
    $stmt->execute();

    echo "New records created successfully";
    header("Location: choice.php");

    exit();
    $stmt->close();
    $conn->close();
}





if ($_POST['login']) {
    // Create connection
    $conn = new mysqli($servername, $username, $pass, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "select *from loginup where email = '$email' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        echo "<h1><center> Login successful </center></h1>";
        $_SESSION['phone'] = $row['phone'];

        $_SESSION['email'] = $row['email'];



        header("Location: choice.php");

        exit();
    } else {
        echo "<h1> Login failed. Invalid username or password.</h1>";
    }
}






/*
    
        if($_POST['loginup'])
        {
    
        $stml= $conn->prepare("insert into loginup(phone,email,password) values(?,?,?)");
        $stml->bind_param("iss",$phone,$email,$password);
        $stml->execute();
        echo"registration seccess";
        $stml->close();
        $conn->close();

        }
        if($_POST['login'])
        {if (isset($phone)){
            $sql="select * from loginup where phone='".$phone."'AND password='".$password."'limit 1 " ;
            $result  = mysql_query($sql);
            if(mysql_num_rows($result)==1){
                echo"you have beed logid in";
                exit();

            }
            else{echo"incorrect log in";}
        }



        } */
