<?php

session_start();

//Makes sure that the username and password are correct so they can continue
function loggingIn($username, $password)
{
    if(($username == "000397426") && ($password == "mohawk"))
    {
        $_SESSION['verifyLogin'] = true;
        return true;
    }
    else
    {
        return false;
    }
}

// Filter the users input so we won't be avaiable for SQL injections
if(!isset($POST))
{
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $isLoggedIn = loggingIn($username, $password);
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Logging In </title>
        <link rel ="stylesheet" type ="text/css" href="assignment3.css">
    </head>
    
        <?php
        //If the user is logged in, display message and buttons to continue with app or logout
        if($isLoggedIn == true)
        {
                ?>
    <div class="loggedIn">
             <h1> You are logged in </h1>
             <div class="tableButton">
             <a href='mainPage.php'><input type='submit' name='managmentTable' value="Manage Table">
             </div>
             <div class="logoutButton">
        <form action="logoutPage.php" method="POST" >
            
            <p><input type="submit" name="logout"  value="Logout"></p>
        </form>  
             </div>
    </div>          
           
            <?php
        }else
        {
            ?>
            <!-- Message if the username or password is incorrect-->
            <h1>User name or Password is incorrect</h1>
            <a href='startPage.php'><input type="submit" name='startPage' value='Go Back To Login Page'>
               
             
            <?php
        }
        ?>
       

    </body>
</html>



