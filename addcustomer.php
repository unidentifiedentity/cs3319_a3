<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add Customer</title>
</head>
<body>
<?php
   include 'connectdb.php';
?>
<?php
   $fname=  $_POST["firstname"];
   $lname = $_POST["lastname"];
   $city =  $_POST["city"];
   $phonenumber =  $_POST["phonenumber"];
   $agentnumber =  $_POST["agentnumber"];
   $pull_query = 'SELECT MAX(cusID) AS maxid FROM customer';
   $result = mysqli_query($connection,$pull_query);
   if (!$result) {
      die("database max query failed.");
   }
   $row=mysqli_fetch_assoc($result);
   $newkey = intval($row["maxid"]) + 1;
   $cusID = (string)$newkey;
   $query = 'INSERT INTO customer VALUES("' . $cusID . '","' . $fname . '","'. $lname . '","' . $city . '","' . $phonenumber . '","' . $agentnumber . '")';
   echo "<br>";
   if (!mysqli_query($connection, $query)) {
        die("ERROR: insert failed - " . mysqli_error($connection));
    }
   echo "a customer has been added";
   mysqli_close($connection);
?>

<form action="index2.php" method="post">
<input type="submit" value="go back">
</form> 

</body>
</html>