<?php
include "dbConnection.php";

$fnameErr = $lnameErr = $emailErr = $phoneErr = "";
$fname = $lname = $email = $phone = "";
$add = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
        $fnameErr = "First Name is required";
        $add = false;
    } else {
        $fname = $_POST['fname'];
    }

    if (empty($_POST["lname"])) {
        $lnameErr = "Last Name is required";
        $add = false;
    } else {
        $lname = $_POST['lname'];
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $add = false;
    } else {
        $email = $_POST['email'];
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Home Number is required";
        $add = false;
    } else {
        $phone = $_POST['phone'];
    }

    if ($add) {
        $fname = ucwords($fname);
        $lname = ucwords($lname);
        $query = "insert into contacts(fname,lname,email,homePhone) values ('$fname','$lname','$email','$phone')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>alert('Contact info has been created in the database !');
                   location.href='add.php';</script>";
//            window.location.replace('../Main.php');

        } else
            echo '<br><center> Error ' . $query . "<br>" . mysqli_errno($conn) . '</center>';

        mysqli_close($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Contact</title>
    <style>
        .error {
            color: #FF0000;
        }
        .parent {
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
    </style>
</head>
<body
">   <!--<body style="background-color:aqua;">-->
<div class="parent">
    <div class="buttons">
        <br><b><span style="font-size: 144%;margin-left: 35px "> Address Book</span></b><br><br>
        <a href=add.php> Add Contact </a><br><br>
        <a href=delete.php> Delete Contact </a><br><br>
        <a href=search.php> Search Contact </a><br><br>
        <a href=listAll.php> List All Contact </a><br><br>
    </div>

    <div class="main">
        <span style="font-size: 144%;margin-left: -18px ">Add contact Information</span>
        <br><br>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            First Name : <input type="text" name="fname" value="<?= $_POST['fname'] ?? ''; ?>">
            <span class="error"> * <?php echo $fnameErr; ?></span>
            <br><br>
            Last Name :&ensp;<input type="text" name="lname" value="<?= $_POST['lname'] ?? ''; ?>">
            <span class="error"> * <?php echo $lnameErr; ?></span>
            <br><br>
            E-mail : &emsp;&emsp;<input type="text" name="email" value="<?= $_POST['email'] ?? ''; ?>">
            <span class="error"> * <?php echo $emailErr; ?></span>
            <br><br>
            Home Phone:<input type="text" name="phone" value="<?= $_POST['phone'] ?? ''; ?>">
            <span class="error"> * <?php echo $phoneErr; ?></span>
            <br><br>&emsp;&emsp;&emsp;
            <input type="submit" value="Create Contact">
        </form>
    </div>
</div>

</body>
</html>
