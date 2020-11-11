<?php
  include_once 'orders_details_crud.php';
?>

<html>
<head>
  <title>Bingle Bangle: Order Details</title>
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
        $stmt = $conn->prepare("SELECT * FROM tbl_orders_a168219, tbl_staffs_a168219,
          tbl_customers_a168219 WHERE
          tbl_orders_a168219.fld_staff_id = tbl_staffs_a168219.fld_staff_id AND
          tbl_orders_a168219.fld_customer_id = tbl_customers_a168219.fld_customer_id AND
          fld_order_id = :oid ");
      $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
        $oid = $_GET['oid'];
      $stmt->execute();
      $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
      }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
    Order ID: <?php echo $readrow['fld_order_id'] ?> <br>
    Order Date: <?php echo $readrow['fld_order_date'] ?> <br>
    Staff: <?php echo $readrow['fld_staff_fname']." ".$readrow['fld_staff_lname'] ?> <br>
    Customer: <?php echo $readrow['fld_customer_name']; ?> <br>
    </font>
    <hr>
    <font face="Lucida Sans Unicode">
    <form action="orders_details.php" method="post">
      Product
      <select name="pid">
       <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_products_a168219");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $productrow) {
      ?>
        <option value="<?php echo $productrow['fld_product_id']; ?>"><?php echo $productrow['fld_product_brand']." ".$productrow['fld_product_name']; ?></option>
      <?php
      }
      $conn = null;
      ?>
      </select>
      Quantity
      <input name="quantity" type="text" pattern="[0-9\s]+">
      <input name="oid" type="hidden" value="<?php echo $readrow['fld_order_id'] ?>">
      <button type="submit" name="addproduct">Add Product</button>
      <button type="reset">Clear</button>
    </form>
    <hr>
    <table border="1">
      <tr>
        <td>Order Detail ID</td>
        <td>Product</td>
        <td>Quantity</td>
        <td></td>
      </tr>
       <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_orders_details_a168219,
            tbl_products_a168219 WHERE
            tbl_orders_details_a168219.fld_product_id = tbl_products_a168219.fld_product_id AND
          fld_order_id = :oid");
          $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
          $oid = $_GET['oid'];
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $detailrow) {
      ?>
      <tr>
        <td><?php echo $detailrow['fld_order_detail_id']; ?></td>
        <td><?php echo $detailrow['fld_product_name']; ?></td>
        <td><?php echo $detailrow['fld_order_detail_quantity']; ?></td>
        <td>
          <a href="orders_details.php?delete=<?php echo $detailrow['fld_order_detail_id']; ?>&oid=<?php echo $_GET['oid']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>
    </table>
    <hr>
    <a href="invoice.php?oid=<?php echo $_GET['oid']; ?>" target="_blank">Generate Invoice</a>
  </center>
  </font>
</body>
</html>