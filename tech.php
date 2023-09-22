<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost:3307";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $sql = "INSERT INTO `form`.`form`(`fullname`,`phone`,`email`,`subject`,`message`)VALUES('$fullname', '$phone', '$email', '$subject', '$message', current_timestamp());";


    if($con->quert($sql) == true){

        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
        
    }

    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <div class="container">
        <p> Enter your details </p>
        <?php
        if($insert == true){
            echo "<p class='submitMsg'>Thanks for submitting</p>"; 
        }
        
        ?>

        <form action="tech.php" method="post">
            <input type="text" name="fullname" id="fullname" placeholder="Enter your fullname">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="text" name="subject" id="subject" placeholder="Enter your subject">
            <input type="text" name="message" id="message" placeholder="Enter your message">
            <button class="btn">Submit</button>
    </form>
    </div>
    
</body>
</html>

