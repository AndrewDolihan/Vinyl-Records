<!DOCTYPE html> 
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
$nameOfRecord = filter_input(INPUT_POST, 'nameOfRecord', FILTER_SANITIZE_SPECIAL_CHARS);
$description = filter_input(INPUT_POST,'description',FILTER_SANITIZE_SPECIAL_CHARS);
$dateReleased = filter_input(INPUT_POST,'dateReleased',FILTER_SANITIZE_SPECIAL_CHARS);
$dateReleasedFormat = '/[0-9]{4}-[0-1][0-9]-[0-3][0-9]/';
$leftInStock = filter_input(INPUT_POST,'leftInStock',FILTER_SANITIZE_NUMBER_INT);
$artist = filter_input(INPUT_POST,'artist',FILTER_SANITIZE_SPECIAL_CHARS);

//Insert name of record
$nameSql ="INSERT INTO `Vinyl Records`(`Name`,`Description`,`Date Released`,`Left in Stock`,`Artist`) VALUES ('$nameOfRecord','$description','$dateReleased','$leftInStock','$artist')";
//Prepares record to go into database 
$nameStmt = $dbh->prepare($nameSql);
//Exucutes statment
$nameResult=$nameStmt->execute();





/*
 * If the insert is successful and all parameters are met
 * display the row user just entered
 */
if((preg_match($dateReleasedFormat, $dateReleased))&&($nameResult))
{
    echo"<h1>Your insert was successful! </h1></br>";
    echo"Row Inserted </br>";
    echo"<table>";
    echo"<tr>";
    echo"<th>Name Of Record</th>";
    echo"<th>Description</th>";
    echo"<th>Date Released</th>";
    echo"<th>Left In Stock </th>";
    echo"<th>Artist</th>";
    
    echo"</tr>";
    echo"<tr>";
    echo"<td>$nameOfRecord </td>";
    echo"<td>$description</td>";
    echo"<td>$dateReleased</td>";
    echo"<td>$leftInStock</td>";
    echo"<td>$artist </td>";
  
    echo"</table>";
    echo"Your statment was </br>";
    echo"INSERT INTO `Vinyl Records` (`Name`) Values ('$nameOfRecord','$description','$dateReleased','$leftInStock','$artist')";
    $_SESSION['nameOfRecord']=$nameOfRecord;
    $_SESSION['desciption'] = $description;
    $_SESSION['dateReleased'] = $dateReleased;
    $_SESSION['leftInStock'] = $leftInStock;
    $_SESSION['artist'] = $artist;
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View by ID</title>
        <link rel ="stylesheet" type ="text/css" href="assignment3.css">
    </head>
    <body>
        <!--Return to main page button  -->
        <form action="mainPage.php" method="POST" >
            
            <p><input type="submit" name="order"  value="Return to Main Page"></p>
        </form>
        <!--Order by Vinyl ID option -->
        <form action="viewByID.php" method="POST" >
            
            <p><input type="submit" name="order"  value="Order By Vinyl ID"></p>
        </form>
         <!--Order by artist -->
        <form action="viewByArtist.php" method="POST" >
            
            <p><input action="updatePage.php "type="submit" name="order"  value="Order By Artist"></p>
        </form>
         
        <!--Order by stock level -->
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
        <div class="insertFail">
        <h2>Insert was unsuccessful, please try again!</h2>
         <head>
        <meta charset="UTF-8">
        <title>View by ID</title>
        <link rel ="stylesheet" type ="text/css" href="assignment3.css">
        </head>
        <!--Return to main page button  -->
        <form action="mainPage.php" method="POST" >
            
            <p><input type="submit" name="order"  value="Return to Main Page"></p>
        </form>
        
        <!--Logout button -->
        <form action="logoutPage.php" method="POST" >
            
            <p><input type="submit" name="logout"  value="Logout"></p>
        </form>
        </div>
        <?php
}
?>
    </body>
</html>


