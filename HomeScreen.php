<!DOCTYPE html>
<html>
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
                margin-top: 130px;
                font-size: 144%;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
    <div class="parent">
        <div class="buttons">
        <br><b><span style="font-size: 144%;margin-left: 35px "> Address Book</span><br><br>
        <a href=add.php> Add Contact </a><br><br>
        <a href=add.php> Delete Contact </a><br><br>
        <a href=add.php> Add Contact </a><br><br>
        <a href=add.php> Search Contact </a><br><br>
        <a href=add.php> List All Contact </a><br><br>
        </div>

        <div class="main">
            Welcome to the AddressBook App
        </div>
    </div>


        <?php
        // put your code here
        ?>
    </body>
</html>
