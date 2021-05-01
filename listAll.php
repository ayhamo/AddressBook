<?php
include "dbConnection.php";

$query = "SELECT fname , lname FROM contacts";
$result = mysqli_query($conn, $query);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>All Contacts</title>
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
            font-size: 120%;
            font-weight: bold;
        }

        ul {
            margin-left: -20px;
            list-style-position: outside;
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
        <span style="font-size: 144%;margin-left: -18px;font-family: 'Rockwell Nova Light',serif">All Contact Information</span>
        <br>
        <ul>
            <?php
            while ($info = mysqli_fetch_array($result)) {
                echo "<li><a href='" . 'listAllDetails.php?fname=' . $info['fname'] . '&' . 'lname=' . $info['lname'] . "'>" . $info['lname'] . ', ' . $info['fname'] . "</a></li><br>";
            }
            ?>
        </ul>
    </div>
</div>

</body>
</html>