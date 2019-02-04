<!DOCTYPE html>
<?php
//Connects to the database, if connections fails displays Exception message
try {
    $dbh = new PDO("mysql:host=localhost;dbname=000397426", '000397426', '19971226');
} catch (PDOException $e) {

    echo "Error " . $e->getMessage() . "</br>";
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Main Page</title>
        <link rel ="stylesheet" type ="text/css" href="assignment3.css">
    </head>
    <body>
        <div class="mainBody">
        <h1>Main Page</h1>
        
        <!--Form for inserting a record into the database -->
        <h2>Insert A Record</h2>
        <form action="insertPage.php" method="POST" >
            <p><input type="text" name="nameOfRecord">Name Of Record</p>
            <p><input type="text" name="description">Description</p>
            <p><input type="text" name="dateReleased">Date Released</p>
            <p><input type="text" name="leftInStock">Left In Stock</p>
            <p><input type="text" name="artist">Artist</p></br>
            <input type="submit" name="Sumbit">
        </form>
        
        <!--Form for updating a record in the database, using the VinylID -->
        <h2>Update A Record</h2>
        <form action="updatePage.php" method="POST">
            <p><input type="text" name="id"> ID of Record you want to update!</p>
            <p><input type="text" name="updateName"> Update Name of Record</p>
            <p><input type="text" name="updateDescription"> Update Description of Record</p>
            <p><input type="text" name="updateDate">Update Date of Record</p>
            <p><input type="text" name="updateStock"> Update Items left in Stock</p>
            <p><input type="text" name="updateArtist"> Update Artist</p>
            <input type="submit" name="Sumbit">
        </form>
        
        <!--Deletes a record in the database, using the Vinyl ID -->
        <h2>Delete A Record</h2>
        <form action="deletePage.php" method="POST">
             <p><input type="text" name="deleteID"> Choose ID of record you want to delete </p>
             <input type="submit" name="Sumbit">
            
        </form>
        
        <!--Options to view the database -->
        <h2>View Page</h2>
        <!-- View by Vinyl ID-->
        <form action="viewByID.php" method="POST" >
            
            <p><input type="submit" name="order"  value="Order By Vinyl ID"></p>
        </form>
        
        <!-- View by Artist-->
        <form action="viewByArtist.php" method="POST" >
            
            <p><input action="updatePage.php "type="submit" name="order"  value="Order By Artist"></p>
        </form>
        
        <!--View by stock level -->
        <form action="viewByStock.php" method="POST" >
            <p><input type="submit" name="order"  value="Order By Stock"></p>
        </form>
        
        <!--Logout button -->
        <form action="logoutPage.php" method="POST" >
            
            <p><input type="submit" name="logout"  value="Logout"></p>
        </form>
        </div>
    </body>
</html>

