<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Display Customers</title>
</head>
   <body>
      <?php
         include 'connectdb.php';
      ?>
      <h4>Product Revenue</h4>
      <?php
         $prodID =  $_POST["product"];
         $query = "SELECT SUM(quantity) s FROM purchases WHERE purchases.prodID =" . $prodID;
         $result=mysqli_query($connection,$query);
         if (!$result) {
            die("ERROR1: " . mysqli_error($connection));
         }
         while($row = mysqli_fetch_assoc($result)){
         $sum = doubleval($row["s"]);
         echo $sum;
         echo "<br>";
         }

         $query2 = "SELECT cost FROM product WHERE product.prodID =" . $prodID;
         $result2=mysqli_query($connection,$query2);
         if (!$result2) {
            die("ERROR2: " . mysqli_error($connection));
         }         
         while($row2 = mysqli_fetch_assoc($result2)){
         echo $row2;
         echo "<br>";
         $cost = doubleval($row["cost"]);
         echo $cost;
         echo "<br>";
         }
         
         $Rev = $sum * $cost;
         $revenue = (string)$Rev;
         echo "Total Revenue is: " . $Revenue;
         mysqli_close($connection);
      ?>

   <br><br>
   <form action="index2.php" method="post">
   <input type="submit" value="go back">
   </form> 

   </body>


</html>