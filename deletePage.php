<?php
//Connects to database, displays Exception if the connection fails
session_start();
try {
    $dbh = new PDO("mysql:host=localhost;dbname=000397426", '000397426', '19971226');
} catch (PDOException $e) {

    echo "Error " . $e->getMessage() . "</br>";
}
// Filters the Vinyl ID so they 
$deleteRecord = filter_input(INPUT_POST,'deleteID',FILTER_SANITIZE_NUMBER_INT);

/**
 * Deletes the name of the record by the Vinyl ID,
 * prepares the database to with the statement and executes it 
 */
$deleteSql = "DELETE FROM `Vinyl Records` WHERE`VinylID`= \"$deleteRecord\"";
$deleteStmt = $dbh->prepare($deleteSql);
$deleteStmt->execute();

/*
 * If the user was deleted show the statment that deleted it.
 */
if($deleteStmt)
{
    echo"<h1>Your delete was successful! </h1></br>";
    echo"You deleted a record with the ID of $deleteRecord</br>";
    echo"Your statement is:</br>";
    echo"DELETE * FROM `Vinyl Records WHERE `VinylID`= $deleteRecord";
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete Page</title>
        <link rel ="stylesheet" type ="text/css" href="assignment3.css">
    </head>
    <body>
        <!-- Returns to the main page -->
        <form action="mainPage.php" method="POST" >
            
            <p><input type="submit" name="order"  value="Return to Main Page"></p>
        </form>
        
        <!-- Order by Vinyl ID -->
        <form action="viewByID.php" method="POST" >
            
            <p><input type="submit" name="order"  value="Order By Vinyl ID"></p>
        </form>
        
        <!-- Order by Artist-->
        <form action="viewByArtist.php" method="POST" >
            
            <p><input action="updatePage.php "type="submit" name="order"  value="Order By Artist"></p>
        </form>
        
        <!-- Order by stock level -->
        <form action="viewByStock.php" method="POST" >
            <p><input type="submit" name="order"  value="Order By Stock"></p>
        </form>
        
        <!-- Logout button -->
        <form action="logoutPage.php" method="POST" >
            
            <p><input type="submit" name="logout"  value="Logout"></p>
        </form>

<?php
}
 else // If the sort doesn't work or there isn't a Vinyl ID
{
    echo"There was a problem with the Vinyl ID, please click the button below to try again!";
    ?>
        <!-- Return to the main page button -->
        <form action="mainPage.php" method="POST" >
            
            <p><input type="submit" name="order"  value="Return to Main Page"></p>
        </form>
        
        <!-- Logout button -->
        <form action="logoutPage.php" method="POST" >
            
            <p><input type="submit" name="logout"  value="Logout"></p>
        </form>
        <?php
}
?>
    </body>
</html>
