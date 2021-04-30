<?php
include "dbConnection.php";

$query = "SELECT fname , lname FROM contacts";
$result = mysqli_query($conn, $query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['name'])) {
        header("Refresh:0");
        exit(0);
    }
    foreach ($_POST['name'] as $name) {
        $parts = explode(',', $name);
        $query1 = "DELETE FROM contacts WHERE fname = '$parts[0]' AND lname = '$parts[1]'";
        $result1 = mysqli_query($conn, $query1);
        if (!$result1)
            echo '<br><center> Error ' . $query . "<br>" . mysqli_errno($conn) . '</center>';

    }

    mysqli_close($conn);
    header("Refresh:0");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete Contact</title>
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
            input:: before
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
        <span style="font-size: 144%;margin-left: -18px ">Delete Contact Information</span><br><br>
        <form id="myForm" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <?php
            while ($info = mysqli_fetch_array($result)) {
                $fn = $info['fname'];
                $ln = $info['lname'];
                echo "<input type='checkbox' name='name[]' value='$fn,$ln'> <a href='" . 'listAllDetails.php?fname=' . $fn . '&' . 'lname=' . $ln . "'>" . $ln . ', ' . $fn . "</a><br><br>";
            }
            ?>
            <input type="submit" value="Delete"> &emsp;&emsp;<input type="reset" onclick="clear()" value="Clear">
            <script>
                function clear() {
                    document.getElementById("myForm").reset();
                }</script>
        </form>
    </div>
</div>

</body>
</html>
