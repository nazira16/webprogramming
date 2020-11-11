  <!DOCTYPE html>
  <html>
  <head>
    <title>Bingle Bangle: Products</title>
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
    <font face="Lucida Sans Unicode">
      <form action="products.php" method="post">
       <table cellpadding="6" width="50%">
        <tr>
          <td>Product ID:</td>
          <td><input name="pid" type="text" width="80%"></td>
        </tr>
        <tr>
         <td> Name: </td>
         <td><input name="name" type="text" width="80%"></td>
       </tr>
       <tr>
         <td>Price:</td>
         <td><input name="price" type="price" width="80%"></td>
       </tr>
       <tr>
         <td>Brand:</td>
         <td><select name="brand">
          <option value="Thomas Sabo">THOMAS SABO</option>
          <option value="Pandora">PANDORA</option>
          <option value="ETSY">ETSY</option>
          <option value="SMGLOBALSHOP">SMGLOBALSHOP</option>
          <option value="LOVISA">LOVISA</option>
          <option value="POHKONG">POHKONG</option>
          <option value="Tiffany & Co.">Tiffany & Co.</option>
          <option value="Elsa Peretti">Elsa Peretti</option>
        </select></td>
      </tr>
      <tr>
        <td>Type:</td>
        <td><input name="type" type="radio" value="Bangle"> BANGLE
          <input name="type" type="radio" value="Bracelet"> BRACELET </td>
        </tr>
        <tr>
          <td>Clasp:</td>
          <td><select name="clasp">
            <option value="Adjustable Clasp">Adjustable Clasp</option>
            <option value="Folding Clasp">Folding Clasp</option>
            <option value="Sliding Clasp">Sliding Clasp</option>
            <option value="Bangle">Bangle</option> </select></td>
          </tr>
          <tr>
           <td>Color:</td>
           <td><input name="color" type="text" width="80%"></td>
         </tr>
       </table>
       <button type="submit" name="create">Create</button>
       <button type="reset">Clear</button>
     </form>
     <hr>
     <table border="1">
      <tr>
        <td>Product ID</td>
        <td>Name</td>
        <td>Price (RM)</td>
        <td>Brand</td>
        <td>Type</td>
        <td>Clasp</td>
        <td>Color</td>
        <td></td>
      </tr>
      <tr>
        <td>P001</td>
        <td>BRACELET FOR BEADS</td>
        <td>309.00</td>
        <td>THOMAS SABO</td>
        <td>BRACELET</td>
        <td>Folding Clasp</td>
        <td>Silver</td>
        <td>
          <a href="products_details.php">Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>P002</td>
        <td>BRACELET TOGETHER HEART SMALL</td>
        <td>829.00</td>
        <td>THOMAS SABO</td>
        <td>BRACELET</td>
        <td>Folding Clasp</td>
        <td>Rose Gold</td>
        <td>
          <a href="products_details.php">Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>
       <tr>
        <td>P003</td>
        <td>CHARM BRACELET</td>
        <td>409.00</td>
        <td>THOMAS SABO</td>
        <td>BRACELET</td>
        <td>Lobster Clasp</td>
        <td>Sterling Silver</td>
        <td>
          <a href="products_details.php">Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>
       <tr>
      <td>P004</td>
      <td>BRACELET FOR BEADS BLACK</td>
      <td>139.00</td> 
      <td>THOMAS SABO
      <td>BRACELET</td>
      <td>LOBSTER CLASP</td>
      <td>BLACK</td>
        <td>
          <a href="products_details.php">Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>
      <tr>
      <td>P005</td>
      <td>BRACELET KARMA WHEEL </td>
      <td>219.00 </td>
      <td>THOMAS SABO</td>
      <td>BRACELET</td>
      <td>LOBSTER CLASP</td>
      <td>STERLING SILVER</td>
      <td>
          <a href="products_details.php">Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>
      <tr>
      <td>P006</td>
      <td>BRACELET LITTLE SECRET ANCHOR</td>
      <td>139.00</td>
      <td>THOMAS SABO</td>
      <td>BRACELET </td>
      <td>ADJUSTABLE SLIDING CLASP</td>
      <td>STERLING SILVER</td>
      <td>
          <a href="products_details.php">Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>
      <tr>
      <td>P007</td>
      <td>PEARL BRACELET</td>
      <td>516.00</td>
      <td>THOMAS SABO</td>
      <td>BRACELET</td>
      <td>LOBSTER CLASP</td>
      <td>PEARL</td>
      <td>
          <a href="products_details.php">Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>
      <tr>
      <td>P008 </td>
      <td>BANGLE SKULL PAVÉ</td>
      <td>1,089.00</td>
      <td>THOMAS SABO</td>
      <td>BANGLES</td>
      <td>OPEN BANGLE</td>
      <td>STERLING SILVER</td>
      <td>
          <a href="products_details.php">Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>
      <tr>
      <td>P009</td>
      <td>BANGLE CLASSIC</td>
      <td>329.00</td>
      <td>THOMAS SABO</td>
      <td>BANGLES</td>
      <td>BANGLE</td>
      <td>STERLING SILVER</td>
       <td>
          <a href="products_details.php">Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>
      <tr>
      <td>P010</td>
      <td>BRACELET CLASSIC</td>
      <td>379.00</td>
      <td>THOMAS SABO</td>
      <td>BRACELET</td>
      <td>LOBSTER CLASP</td>
      <td>ROSE GOLD</td>
       <td>
          <a href="products_details.php">Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>
    </table>
  </center>
</font>
</body>
</html>