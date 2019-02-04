<?php
//Connects to database, displays Exception if the connection fails
session_start();
try {
    $dbh = new PDO("mysql:host=localhost;dbname=000397426", '000397426', '19971226');
} catch (PDOException $e) {

    echo "Error " . $e->getMessage() . "</br>";
}

/*
 * Filters the inputs so program isn't open to SQL injections 
 */
$newName = filter_input(INPUT_POST, 'updateName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$updateID = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$newDescription = filter_input(INPUT_POST, 'updateDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$dateFormat = '/[0-9]{4}-[0-1][0-9]-[0-3][0-9]/';
$newDate = filter_input(INPUT_POST, 'updateDate', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$newStock = filter_input(INPUT_POST, 'updateStock', FILTER_SANITIZE_NUMBER_INT);
$newArtist = filter_input(INPUT_POST, 'updateArtist', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

//Update name in record
$updateSql = "UPDATE `Vinyl Records` SET `Name`=\"$newName\", `Description`=\"$newDescription\",`Date Released` = \"$newDate\", `Left in Stock` = \"$newStock\",`Artist` = \"$newArtist\" WHERE `VinylID` = $updateID";
//Prepares database with sql statment 
$updateStmt = $dbh->prepare($updateSql);
// Executes statment 
$updateStmt->execute();


/*
 * If the update is successful and all parameters are met
 * display the row user just entered
 */
if(preg_match($dateFormat,$newDate)&&($updateStmt))
{
    
    echo"<h1>Your update was successful! </h1></br>";
    echo"Row Updated </br>";
    echo"<table>";
    echo"<tr>";
    echo"<th>Name Of Record</th>";
    echo"<th>Description</th>";
    echo"<th>Date Released</th>";
    echo"<th>Left In Stock </th>";
    echo"<th>Artist</th>";
    
    echo"</tr>";
    echo"<tr>";
    echo"<td>$newName </td>";
    echo"<td>$newDescription</td>";
    echo"<td>$newDate</td>";
    echo"<td>$newStock</td>";
    echo"<td>$newArtist </td>";
  
    echo"</table>";
    
    echo"Your statement was </br>";
    echo"UPDATE `Vinyl Records` SET Name= '$newName',Description = '$newDescription','$newDate', '$newStock','$newArtist' WHERE VinylID = '$updateID'";
    
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Page</title>
        <link rel ="stylesheet" type ="text/css" href="assignment3.css">
    </head>
    <body>
        <!--Sort by Vinyl ID -->
        <form action="viewByID.php" method="POST" >
            
            <p><input type="submit" name="order"  value="Order By Vinyl ID"></p>
        </form>
        
        <!--Sort by artist -->
        <form action="viewByArtist.php" method="POST" >
            
            <p><input action="updatePage.php "type="submit" name="order"  value="Order By Artist"></p>
        </form>
        
        <!--Sort by stock level -->
        <form action="viewByStock.php" method="POST" >
            <p><input type="submit" name="order"  value="Order By Stock"></p>
        </form>
        
        <!--Logout button -->
        <form action="logoutPage.php" method="POST" >
            
            <p><input type="submit" name="logout"  value="Logout"></p>
        </form>

<?php
}
 else   
 {
     ?>
    <head>
        <meta charset="UTF-8">
        <title>Main Page</title>
        <link rel ="stylesheet" type ="text/css" href="assignment3.css">
    </head>
        <h2>There is no user with that ID</h2>
     
        <form action="logoutPage.php" method="POST" >
            
            <p><input type="submit" name="logout"  value="Logout"></p>
        </form>  
      
        
        <form action="mainPage.php" method="POST" >
            
            <p><input type="submit" name="order"  value="Return to Main Page"></p>
        </form>
     <?php
 }
 ?>
     </body>
</html>