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
        $query = "insert into contacts(fname,lname,email,homePhone) values ('$fname','$lname','$email','$phone')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>alert('Content  info has been created in the database !');
                   location.href='add.php';</script>";

        } else
            echo '<br><center> Error ' . $query . "<br>" . mysqli_errno($conn) . '</center>';

        mysqli_close($conn);
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Contact Adding</title>
    <style>
        .error {color: #FF0000;}
        .parent{
            display: flex;
            flex-direction: row;
            margin: 15px;
        }
        .main{
            justify-content: flex-start;
            display: flex;
            flex-direction: column;
            margin-left: 100px;
            margin-top: 100px;
            font-size: 100%;
            font-weight: bold;
        }
        .main > input[type=submit] {
            align-self: center;
        }
    </style>
</head>
<body">   <!--<body style="background-color:aqua;">-->
<div class="parent">
    <div class="buttons">
        <br><b><span style="font-size: 144%;margin-left: 35px "> Address Book</span></b><br><br>
            <a href=add.php> Add Contact </a><br><br>
            <a href=add.php> Delete Contact </a><br><br>
            <a href=add.php> Add Contact </a><br><br>
            <a href=add.php> Search Contact </a><br><br>
            <a href=add.php> List All Contact </a><br><br>
    </div>

    <div class="main">
        <b><span style="font-size: 144%;margin-left: -18px ">Add contact Information</span></b>
        <br><br>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
            First Name : <input type="text" name="fname" value="<?= $_POST['fname'] ?? ''; ?>">
            <span class="error"> * <?php echo $fnameErr;?></span>
            <br><br>
            Last Name :&ensp;<input type="text" name="lname"value="<?= $_POST['lname'] ?? ''; ?>">
            <span class="error"> * <?php echo $lnameErr;?></span>
            <br><br>
            E-mail : &emsp;&emsp;<input type="text" name="email" value="<?= $_POST['email'] ?? ''; ?>">
            <span class="error"> * <?php echo $emailErr;?></span>
            <br><br>
            Home Phone:<input type="text" name="phone" value="<?= $_POST['phone'] ?? ''; ?>">
            <span class="error"> * <?php echo $phoneErr;?></span>
            <br><br>
            <input type="submit">
        </form>
    </div>
</div>

</body>
</html>
