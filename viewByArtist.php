<!DOCTYPE html>
<?php
session_start();
//Connects to database, displays Exception if the connection fails
try {
    $dbh = new PDO("mysql:host=localhost;dbname=000397426", '000397426', '19971226');
} catch (PDOException $e) {

    echo "Error " . $e->getMessage() . "</br>";
}

/**
 * Orders the table by Artist and displays it 
 */
$insertSql = "SELECT * FROM `Vinyl Records` ORDER BY `Artist` ASC";
$insertStmt = $dbh->prepare($insertSql);
$insertStmt->execute();

echo"<table>";
echo"<tr>";
echo"<th>Vinyl ID </th>";
echo"<th>Name Of Record</th>";
echo"<th>Description</th>";
echo"<th>Date Released</th>";
echo"<th>Left In Stock </th>";
echo"<th>Artist</th>";

echo"</tr>";
while($row = $insertStmt->fetch())
{
    echo"<tr>";
    echo "<td>".$row["VinylID"]. "</td>";
    echo "<td>".$row["Name"]. "</td>";
    echo "<td>".$row["Description"]. "</td>";
    echo "<td>".$row["Date Released"]. "</td>";
    echo "<td>".$row["Left in Stock"]. "</td>";    
    echo "<td>".$row["Artist"]. "</td>"; 
    echo"</tr>";    
}
echo"</table>";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View by Artist</title>
        <link rel ="stylesheet" type ="text/css" href="assignment3.css">
    </head>
    <body>
         <!-- Returns to the main page -->
        <form action="mainPage.php" method="POST" >
            
            <p><input type="submit" name="order"  value="Return to Main Page"></p>
        </form>
        
         <!-- Order by Vinyl ID-->
        <form action="viewByID.php" method="POST" >
            
            <p><input action="updatePage.php "type="submit" name="order"  value="Order By ID"></p>
        </form>
        
         <!-- Order by stock level -->
        <form action="viewByStock.php" method="POST" >
            <p><input action="updatePage.php "type="submit" name="order"  value="Order By Stock"></p>
        </form>

        <!-- Logout button -->
        <form action="logoutPage.php" method="POST" >
            
            <p><input type="submit" name="logout"  value="Logout"></p>
        </form>
    </body>
</html>