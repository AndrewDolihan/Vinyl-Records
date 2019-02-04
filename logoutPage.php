<!DOCTYPE html>
<?php
/*
 * If the user logs out, display a message and button to return back to the login page 
 */
$isLoggedIn = false;

if($isLoggedIn==false)
{
    
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Logout Page</title>
        <link rel ="stylesheet" type ="text/css" href="assignment3.css">
    </head>
    <body>
        <div class="logout">
        <form action="startPage.php" method="POST" >
            <h1>You are logged out!</h1>
            <p><input type="submit" name="order"  value="Return to Login"></p>
        </form>
        </div>
    </body>
</html>