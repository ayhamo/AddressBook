<?php
include "dbConnection.php";

$fname = $_GET['fname'];
$lname = $_GET['lname'];

$query = "SELECT * FROM contacts WHERE fname = '$fname' AND lname = '$lname'";
$result = mysqli_query($conn, $query);


$info = mysqli_fetch_array($result);
$email = $info['email'];
$cphone = $info['cellPhone'];
$hphone = $info['homePhone'];
$ophone = $info['officePhone'];
$address = $info['address'];
$comment = $info['comment'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Details</title>
    <style>
        .parent {
            font-family: sans-serif;
            display: flex;
            justify-content: flex-start;
            flex-direction: row;
            margin: 15px;
        }

        .main {
            margin-left: 100px;
            margin-top: 100px;
            font-size: 100%;
        }

        .ul {
            margin-left: -15px;
        }
    </style>
</head>
<body>
<div class="parent">
    <div class="buttons">
        <br><b><span style="font-size: 210%;margin-left: 17px;font-family: 'Agency FB',sans-serif">Address<br>&ensp;Book</span></b><br><br>
        <a href=add.php> Add Contact </a><br><br>
        <a href=delete.php> Delete Contact </a><br><br>
        <a href=search.php> Search Contact </a><br><br>
        <a href=listAll.php> List All Contact </a><br><br>
    </div>

    <div class="main">
        <span style="font-size: 150%;font-weight: bold;"><?php echo $lname . ', ' . $fname; ?></span><br>
        <ul class="ul">
            <li>First Name: &ensp;&emsp;<?php echo $fname ?></li>
            <br>
            <li>Last Name: &ensp;&emsp;&hairsp;<?php echo $lname ?></li>
            <br>
            <li>Cell Phone: &emsp;&ensp;<?php echo $cphone ?></li>
            <br>
            <li>Home Phone: &ensp;&hairsp;<?php echo $hphone ?></li>
            <br>
            <li>Office Phone: &ensp;&hairsp;&hairsp;<?php echo $ophone ?></li>
            <br>
            <li>Address: &emsp;&emsp;&ensp;<?php echo $address ?></li>
            <br>
            <li>Comment: &emsp;&emsp;<?php echo $comment ?></li>
            <br>
        </ul>


    </div>
</div>

</body>
</html>
