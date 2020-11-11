<!DOCTYPE html>
<html>
<head>
  <title>Bingle Bangle : Staffs</title>
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
    <form action="staffs.php" method="post">
       <table cellpadding="6" width="50%">
      <tr>
        <td>Staff  ID:</td>
        <td><input type="text" name="sid"width="60%"></td>
      </tr>
      <tr>
        <td>First Name:</td>
        <td><input type="text" name="fname" width="60%"></td>
      </tr>
      <tr>
        <td>Last Name:</td>
        <td><input type="text" name="lname" width="60%"></td>
      </tr>
      <tr>
        <td>Sex:</td>
        <td><input type="radio" name="sex" value="male" required>Male<input type="radio" name="sex" value="female">Female</td>
      </tr>
      
    </table>
        <button type="submit" name="create">Create</button>
        <button type="reset">Clear</button>
      </form>
      <hr>
    <table border="1" width="70%" cellpadding="3" >
      <tr>
        <td>Staff ID</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Gender</td>
        <td></td>
      </tr>
      <tr>
        <td>S001</td>
        <td>Fatimah</td>
        <td>Khalid</td>
        <td>Female</td>
        <td>
          <a href="staffs.php">Edit</a>
          <a href="staffs.php">Delete</a>
        </td>
      </tr>
     <tr>
        <td>S002</td>
        <td>Salman</td>
        <td>Khan</td>
        <td>Male</td>
        <td>
          <a href="staffs.php">Edit</a>
          <a href="staffs.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>S003</td>
        <td>Jaemin</td>
        <td>Na</td>
        <td>Male</td>
        <td>
          <a href="staffs.php">Edit</a>
          <a href="staffs.php">Delete</a>
        </td>
      </tr>
    </table>
  </center>
</body>
</html>