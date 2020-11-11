<!DOCTYPE html>
<html>
<head>
  <title>Bingle Bangle : Orders</title>
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
    <form action="orders.php" method="post">
       <table cellpadding="6" width="50%">
      <tr>
        <td>Order ID:</td>
        <td><input type="text" name="oid" disabled></td>
      </tr>
      <tr>
     <td>Order Date: </td>
      <td><input width="50%" name="orderdate" type="date" disabled></td>
      </tr>
      <tr>
      <td>Staff:</td>
      <td><select name="sid">
        <option value="S001">Fatimah Khalid</option>
        <option value="S002">Salman Khan</option>
        <option value="S003">Jaemin Na</option>
      </select></td>
    </tr>
    <tr>
     <td>Customer:</td> 
      <td><select name="cid">
        <option value="C001">Suzy</option>
        <option value="C002">Siti Melawati</option>
        <option value="C003">Ahmad Ali</option>
      </select></td>
    </tr>
  </table>
      <button type="submit" name="create">Create</button>
      <button type="reset">Clear</button>
    </form>
    <hr>
    <table border="1">
      <tr>
        <td>Order ID</td>
        <td>Order Date</td>
        <td>Staff ID</td>
        <td>Customer ID</td>
        <td></td>
      </tr>
      <tr>
        <td>H001</td>
        <td>17/12/2019</td>
        <td>Suzy</td>
        <td>Jaemin Na</td>
        <td>
          <a href="orders_details.php">Details</a>
          <a href="orders.php">Edit</a>
          <a href="orders.php">Delete</a>
        </td>
      </tr>
    </table>
  </font>
  </center>
</body>
</html>