<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Purchases</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>List of Purchases:</h1>
<ol>
<?php
   $whichOwner= $_POST["customer"];
   $query = "SELECT * FROM customer, purchases, product WHERE customer.cusID =  purchases.cusID 
            AND product.prodID = purchases.prodID AND customer.cusID =".$whichOwner." ORDER BY description ASC";
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
     }
    echo "<ol>";
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<li>';
        echo $row["description"]."\t".$row["cost"];
        echo '</li>';
     }
    echo "</ol>";
    echo '<form action="costasc.php" method="post">';
    echo '<input type="hidden" name="customer" value = "'.$whichOwner.'">';
    echo '<input type="submit" value="sort by cost: ascending">';
    echo '</form>';
    
    echo '<form action="costdesc.php" method="post">';
    echo '<input type="hidden" name="customer" value = "'.$whichOwner.'">';
    echo '<input type="submit" value="sort by cost: descending">';
    echo '</form>';
    
    echo '<form action="descasc.php" method="post">';
    echo '<input type="hidden" name="customer" value = "'.$whichOwner.'">';
    echo '<input type="submit" value="sort by description: ascending">';
    echo '</form>';
    
    echo '<form action="descdesc.php" method="post">';
    echo '<input type="hidden" name="customer" input value = "'.$whichOwner.'">';
    echo '<input type="submit" value="sort by description: descending">';
    echo '</form>';
    mysqli_free_result($result);
?>
</ol>
<br><br>
<form action="index2.php" method="post">
<input type="submit" value="go back">
</form> 

<?php
   mysqli_close($connection);
?>
</body>
</html>