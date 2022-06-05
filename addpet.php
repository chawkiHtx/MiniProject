<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "pet";


if (isset($_POST['addpet'])) {
    // Create connection
    $conn = new mysqli($servername, $username, $pass, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $stmt = $conn->prepare("INSERT INTO addpet (name, email,message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();

    echo "New records created successfully";
    header("Location: choice.php");

    $stmt->close();
    $conn->close();
}
else{

    echo "New records created nottttttt successfully";
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
