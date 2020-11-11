<?php
include_once 'database.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Bingle Bangle : Products Details</title>
</head>
<body>
 <center><b><font face="Verdana">
  <a href="index.php" target="_parent">Home</a> | 
  <a href="products.php" target="_parent">Products</a> |
  <a href="customers.php" target="_parent">Customers</a> |
  <a href="staffs.php" target="_parent">Staffs</a> |
  <a href="orders.php" target="_parent">Orders</a>
</b>
<hr>
<?php
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT * FROM tbl_products_a168219 WHERE fld_product_id = :pid");
  $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
  $pid = $_GET['pid'];
  $stmt->execute();
  $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
}
catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>
<b>PRODUCT ID:</b> <?php echo $readrow['fld_product_id'] ?> <br>
<b>NAME:</b> <?php echo $readrow['fld_product_name'] ?> <br>
<b>PRICE:</b> RM <?php echo $readrow['fld_product_price'] ?> <br>
<b>BRAND:</b> <?php echo $readrow['fld_product_brand'] ?> <br>
<b>TYPE:</b> <?php echo $readrow['fld_product_type'] ?> <br>
<b>CLASP:</b> <?php echo $readrow['fld_product_clasp'] ?> <br>
<b>COLOR:</b> <?php echo $readrow['fld_product_color'] ?> <br>
<img src="products/<?php echo $readrow['fld_product_image'] ?>" width="50%" height="50%">
</center>
</body>
</html>