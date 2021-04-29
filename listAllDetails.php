<?php
include "dbConnection.php";

$fname =  $_GET['fname'];
$lname =  $_GET['lname'];

$query = "SELECT * FROM contacts WHERE fname = '$fname' AND lname = '$lname'";
$result = mysqli_query($conn,$query);

$info= mysqli_fetch_array($result);
$email = $info['email'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Address Book</title>
    <style>
        .parent{
            display: flex;
            justify-content: flex-start;
            flex-direction: row;
            margin: 15px;
        }
        .main{
            margin-left: 100px;
            margin-top: 100px;
            font-size: 100%;
        }
    </style>
</head>
<body>
<div class="parent">
    <div class="buttons">
        <br><b><span style="font-size: 144%;margin-left: 35px "> Address Book</span></b><br><br>
            <a href=add.php> Add Contact </a><br><br>
            <a href=delete.php> Delete Contact </a><br><br>
            <a href=search.php> Search Contact </a><br><br>
            <a href=listAll.php> List All Contact </a><br><br>
    </div>

    <div class="main">
        <span style="font-size: 150%;font-weight: bold;"><?php echo $lname . ', ' . $fname; ?></span><br><br>
        First Name: &ensp;&emsp;<?php echo $fname?><br><br>
        Last Name:  &ensp;&emsp;<?php echo $lname?><br><br>
        Email Address: <?php echo $email?><br><br>


    </div>
</div>

</body>
</html>
