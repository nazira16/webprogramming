<?php
  include_once 'customers_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Bingle Bangle : Customers</title>
</head>
<body>
  <center>
    <font face="Verdana"><b>
    <a href="index.php">Home</a> |
    <a href="products.php">Products</a> |
    <a href="customers.php">Customers</a> |
    <a href="staffs.php">Staffs</a> |
    <a href="orders.php">Orders</a>
    </font></b>
    <hr>
    <font face="Lucida Sans Unicode">
      <form action="customers.php" method="post">
        <table cellpadding="6" width="50%">
      <tr>
        <td>Customer ID:</td>
        <td>   <input name="cid" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_customer_id']; ?>"></td>
      </tr>
      <tr>
        <td>Customer Name:</td>
        <td> <input name="cname" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_customer_name']; ?>"></td>
      </tr>
      <tr>
        <td>Phone Number:</td>
        <td><input name="phone" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_customer_phone']; ?>"></td>
      </tr>
      <tr>
        <td>Address:</td>
        <td><input name="address" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_customer_address']; ?>"></td>
      </tr>
    </table>
        <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldcid" value="<?php echo $editrow['fld_customer_id']; ?>">
      <button type="submit" name="update">Update</button>
      <?php } else { ?>
      <button type="submit" name="create">Create</button>
      <?php } ?>
      <button type="reset">Clear</button>
      </form>
      <hr>
      <table border="1">
        <tr>
          <td>Customer ID</td>
          <td>Customer Name</td>
          <td>Phone Number</td>
          <td>Address</td>
          <td></td>
        </tr>
       <?php
      // Read
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_customers_a168219");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>
      <tr>
        <td><?php echo $readrow['fld_customer_id']; ?></td>
        <td><?php echo $readrow['fld_customer_name']; ?></td>
        <td><?php echo $readrow['fld_customer_phone']; ?></td>
        <td><?php echo $readrow['fld_customer_address']; ?></td>
        <td>
          <a href="customers.php?edit=<?php echo $readrow['fld_customer_id']; ?>">Edit</a>
          <a href="customers.php?delete=<?php echo $readrow['fld_customer_id']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>
      </table>
    </font>
  </center>
</body>
</html>