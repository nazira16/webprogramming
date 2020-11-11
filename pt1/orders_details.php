<!DOCTYPE html>
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
    Order ID: H001<br>
    Order Date: 17/12/2019 <br>
    Staff: Jaemin Na <br>
    Customer: Suzy <br></font>
    <hr>
    <font face="Lucida Sans Unicode">
    <form action="orders_details.php" method="post">
      Product
      <select name="pid">
        <option value="P001">BRACELET FOR BEADS</option>
        <option value="P002">BRACELET TOGETHER HEART SMALL</option>
        <option value="P003">CHARM BRACELET</option>
         <option value="P004">BRACELET FOR BEADS BLACK</option>
          <option value="P005">BRACELET KARMA WHEEL</option>
          <option value="P006">BRACELET LITTLE SECRET ANCHOR</option>
          <option value="P007">PEARL BRACELET</option>
          <option value="P008">BANGLE SKULL PAVÉ</option>
          <option value="P009">BANGLE CLASSIC</option>
          <option value="P010">BRACELET CLASSIC</option>
      </select>
      Quantity
      <input name="quantity" type="text" pattern="[0-9\s]+">
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
      <tr>
        <td>H001</td>
        <td>BRACELET FOR BEADS</td>
        <td>1</td>
        <td>
          <a href="orders_details.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>H001</td>
        <td>BRACELET TOGETHER HEART SMALL</td>
        <td>2</td>
        <td>
          <a href="orders_details.php">Delete</a>
        </td>
      </tr>
    </table>
    <hr>
    <a href="invoice.php" target="_blank">Generate Invoice</a>
  </center>
  </font>
</body>
</html>