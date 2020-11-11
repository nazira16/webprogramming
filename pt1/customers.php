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
        <td><input type="text" name="cid"width="60%"></td>
      </tr>
      <tr>
        <td>Customer Name:</td>
        <td><input type="text" name="cname" width="60%"></td>
      </tr>
      <tr>
        <td>Phone Number:</td>
        <td><input type="tel" name="phone" autofocus pattern="[0-9\s]+"></textarea></td>
      </tr>
      <tr>
        <td>Address:</td>
        <td><textarea name="address" cols="60%" rows="5"></textarea></td>
      </tr>
    </table>
        <button type="submit" name="create">Create</button>
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
        <tr>
          <td>C001</td>
          <td>Suzy</td>
          <td>0182343672</td>
          <td>Kuala Lumpur</td>
          <td>
            <a href="customers.php">Edit</a>
            <a href="customers.php">Delete</a>
          </td>
        </tr>
        <tr>
          <td>C002</td>
          <td>Siti Melawati</td>
          <td>0192934521</td>
          <td>Melaka</td>
          <td>
            <a href="customers.php">Edit</a>
            <a href="customers.php">Delete</a>
          </td>
        </tr>
        <tr>
          <td>C003</td>
          <td>Ahmad Ali</td>
          <td>0117892542</td>
          <td>Johor</td>
          <td>
            <a href="customers.php">Edit</a>
            <a href="customers.php">Delete</a>
          </td>
        </tr>
      </table>
    </font>
  </center>
</body>
</html>