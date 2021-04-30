<?php
include "dbConnection.php";

$fname = $lname = $email = $cphone = $hphone = $ophone = $address = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = ucwords($_POST["fname"]);
    $lname = ucwords($_POST["lname"]);
    $query = "insert into contacts(fname,lname,email,cellphone,homephone,officephone,address,comment) values ('$fname','$lname','{$_POST["email"]}','{$_POST["cphone"]}
                                                                                                ','{$_POST["hphone"]}','{$_POST["ophone"]}','{$_POST["address"]}','{$_POST["comment"]}')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Contact info has been created in the database !');
                   </script>";

    } else
        echo '<br><center> Error ' . $query . "<br>" . mysqli_errno($conn) . '</center>';

    mysqli_close($conn);

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

        .form {
            background-color: #eeeeee;
            padding: 1rem;
            border: 1px solid darkgray;
            border-radius: .25rem;
        }

        .form > input {
            margin-bottom: 8px;
            background: #fff;
            border: 1px solid #9c9c9c;
            border-radius: .20rem;
            height: 22px;

        }

        .form #submit {
            background-color: white;
            border-radius: .25rem;
            height: 50px;
        }

        .textarea * {
            vertical-align: middle;
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
        <span style="font-size: 144%; "> Add contact Information</span>
        <br>
        <form id="form" class="form" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <label>First Name<span class="error"> *</span>:&ensp;</label><input type="text" name="fname"
                                                                                required
                                                                                oninvalid="this.setCustomValidity('First Name Field is required')"
                                                                                oninput="this.setCustomValidity('')">
            <br>

            <label>Last Name<span class="error"> *</span></label>:&hairsp;&ensp;<input type="text" name="lname"
                                                                                       required
                                                                                       oninvalid="this.setCustomValidity('Last Name Field is required')"
                                                                                       oninput="this.setCustomValidity('')">
            <br>

            <label>Email<span class="error"> *</span></label>:&emsp;&emsp;&ensp;&ensp;<input type="text" name="email"
                                                                                             required
                                                                                             oninvalid="this.setCustomValidity('Email Field is required')"
                                                                                             oninput="this.setCustomValidity('')">
            <br>

            <label>Cell Phone<span class="error"> *</span></label>:&ensp;<input type="text" name="cphone"
                                                                                required
                                                                                oninvalid="this.setCustomValidity('Cell Phone Field is required')"
                                                                                oninput="this.setCustomValidity('')">
            <br>

            <label> Home Phone</label>: <input type="text" name="hphone">
            <br>

            <label>Office Phone</label>: <input type="text" name="ophone">
            <br>

            <label class="textarea">Address:&emsp;&emsp;&hairsp;&hairsp;&hairsp;&hairsp;&hairsp;<textarea rows="2"
                                                                                                          name="address"> </textarea><br></label>
            <br>

            <label class="textarea">Comment: &emsp;&ensp;<textarea rows="2" name="comment"> </textarea><br></label>
            <br>

            <div style="text-align: center;"><input id="submit" type="submit" value="Create Contact"></div>
        </form>
    </div>
</div>

</body>
</html>
