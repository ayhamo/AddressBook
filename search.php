<?php
include "dbConnection.php";

$string = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $query = "SELECT fname , lname FROM contacts WHERE fname LIKE '%$name%' OR lname LIKE '%$name%'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) != 0) {
        while ($info = mysqli_fetch_array($result)) {
            $string .= "<li><a href='" . 'listAllDetails.php?fname=' . $info['fname'] . '&' . 'lname=' . $info['lname'] . "'>" . $info['lname'] . ', ' . $info['fname'] . "</a></li><br>";
        }
    } else
        $string = "No results found";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search Contact</title>
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

        .form #search {
            background: #fff;
            border: 1px solid #9c9c9c;
            border-radius: .20rem;
            height: 25px;
        }

        .form #button {
            background-color: white;
            border-radius: .25rem;
            height: 30px;

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
        <span style="font-size: 144%;margin-left: -9px;font-family: 'Rockwell Nova Light',serif">Search for a  Contact</span><br><br>
        <form class="form" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <input id="search" type="text" name="name" placeholder="Enter Contact name"
                   value="<?= $_POST['name'] ?? ''; ?>"
                   required oninvalid="this.setCustomValidity('Please Fill the box with valid name')"
                   oninput="this.setCustomValidity('')">
            &ensp;<input id="button" type="submit" value="Search">
            <br>
            <ul>
                <?php echo $string; ?>
            </ul>

        </form>
    </div>
</div>

</body>
</html>
