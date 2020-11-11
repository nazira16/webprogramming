<?php
include_once 'database.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Bingle Bangle : Invoice</title>
</head>
<body>
  <center>
    Bingle Bangle Sdn. Bhd. <br>
    Universiti Kebangsaan Malaysia <br>
    43600 Bangi <br>
    Selangor <br>
    <hr>
    <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM tbl_orders_a168219, tbl_staffs_a168219,
        tbl_customers_a168219, tbl_orders_details_a168219 WHERE
        tbl_orders_a168219.fld_staff_id = tbl_staffs_a168219.fld_staff_id AND
        tbl_orders_a168219.fld_customer_id = tbl_customers_a168219.fld_customer_id AND
        tbl_orders_a168219.fld_order_id = tbl_orders_details_a168219.fld_order_id AND
        tbl_orders_a168219.fld_order_id = :oid");
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
    Order ID: <?php echo $readrow['fld_order_id'] ?>
    Order Date: <?php echo $readrow['fld_order_date'] ?>
    <hr>
    Staff: <?php echo $readrow['fld_staff_fname']." ".$readrow['fld_staff_lname'] ?>
    Customer ID: <?php echo $readrow['fld_customer_name'];?>
    Date: <?php echo date("d M Y"); ?>
    <hr>
    <table border="1">
      <tr>
        <td>No</td>
        <td>Product</td>
        <td>Quantity</td>
        <td>Price(RM)/Unit</td>
        <td>Total(RM)</td>
      </tr>
      <?php
      $grandtotal = 0;
      $counter = 1;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_orders_details_a168219,
          tbl_products_a168219 where 
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
          <td><?php echo $counter; ?></td>
          <td><?php echo $detailrow['fld_product_name']; ?></td>
          <td><?php echo $detailrow['fld_order_detail_quantity']; ?></td>
          <td><?php echo $detailrow['fld_product_price']; ?></td>
          <td><?php echo $detailrow['fld_product_price']*$detailrow['fld_order_detail_quantity']; ?></td>
        </tr>
        <?php
        $grandtotal = $grandtotal + $detailrow['fld_product_price']*$detailrow['fld_order_detail_quantity'];
        $counter++;
      } // while
      $conn = null;
      ?>
      <tr>
        <td colspan="4" align="right">Grand Total (RM)</td>
        <td><?php echo $grandtotal ?></td>
      </tr>
    </table>
    <hr>
    Computer-generated invoice. No signature is required.
  </center>
</body>
</html>