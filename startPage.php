<!DOCTYPE html>
<?php
session_start();
/*
 * Instructor: Mihai Albu
 * Student: Andrew Dolihan #000397426
 * Date Completed: Nov 7th, 2018
 * Purpose: The purpose of this app is to get the user to login using a
 * hard coded username and password and to be able to insert, delete and update
 * record in a Database called 'Vinyl Records', the user also has the options to 
 * view the table three different ways along with being able to logout at anytime.
 * 
 */
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel ="stylesheet" type ="text/css" href="assignment3.css">
    </head>
    <body>
        <!--Start Page -->
        <div class="body">
        <h1>Start Page</h1>
        <h2>Please Log In</h2>
        <!-- Form for user to login and will take them to the next page-->
        <form class='login' action='verifyLogin.php' method="post">
            <label class="login">UserName</label></br>
            <input type="text" name="username"></br>
            <label class="login">Password</label></br>
            <input type="text" name="password"></br>
            <input type='submit' name='login' value='Login'>
        </form>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
