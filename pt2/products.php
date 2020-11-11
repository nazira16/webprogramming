  <?php
  include_once 'products_crud.php';
  ?>

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
          <td> <input name="pid" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_id']; ?>"> <br></td>
        </tr>
        <tr>
         <td> Name: </td>
         <td><input name="name" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>"></td>
       </tr>
       <tr>
         <td>Price:</td>
         <td><input name="price" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>"></td>
       </tr>
       <tr>
         <td>Brand:</td>
         <td><select name="brand">
          <option value="THOMAS SABO" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="THOMAS SABO") echo "selected"; ?>>THOMAS SABO</option>
          <option value="PANDORA" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="PANDORA") echo "selected"; ?>>PANDORA</option>
          <option value="ETSY" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="ETSY") echo "selected"; ?>>ETSY</option>
          <option value="SMGLOBALSHOP" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="SMGLOBALSHOP") echo "selected"; ?>>SMGLOBALSHOP</option>
          <option value="LOVISA" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="LOVISA") echo "selected"; ?>>LOVISA</option>
          <option value="POHKONG" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="POHKONG") echo "selected"; ?>>POHKONG</option>
          <option value="Tiffany & Co." <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Tiffany & Co.") echo "selected"; ?>>Tiffany & Co.</option>
          <option value="Elsa Peretti" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Elsa Peretti") echo "selected"; ?>>Elsa Peretti</option>
        </select></td>
      </tr>
      <tr>
        <td>Type:</td>
        <td> <input name="type" type="radio" value="Bangle" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Bangle") echo "checked"; ?>> BANGLE
          <input name="type" type="radio" value="Bracelet" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Bracelet") echo "checked"; ?>>BRACELET <br> </td>
        </tr>
        <tr>
          <td>Clasp:</td>
          <td><select name="clasp">
            <option value="Adjustable Clasp" <?php if(isset($_GET['edit'])) if($editrow['fld_product_clasp']=="Adjustable Clasp") echo "selected"; ?>>Adjustable Clasp</option>
            <option value="Folding Clasp" <?php if(isset($_GET['edit'])) if($editrow['fld_product_clasp']=="Folding Clasp") echo "selected"; ?>>Folding Clasp</option>
            <option value="Sliding Clasp" <?php if(isset($_GET['edit'])) if($editrow['fld_product_clasp']=="Sliding Clasp") echo "selected"; ?>>Sliding Clasp</option>
          <option value="Bangle" <?php if(isset($_GET['edit'])) if($editrow['fld_product_clasp']=="Bangle") echo "selected"; ?>>Bangle</option>
          </tr>
          <tr>
           <td>Color:</td>
           <td><input name="color" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_color']; ?>"></td>
         </tr>
       </table>
      <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_id']; ?>">
      <button type="submit" name="update">Update</button>
      <?php } else { ?>
      <button type="submit" name="create">Create</button>
      <?php } ?>
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
       <?php
      // Read
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
      foreach($result as $readrow) {
      ?>   
      <tr>
        <td><?php echo $readrow['fld_product_id']; ?></td>
        <td><?php echo $readrow['fld_product_name']; ?></td>
        <td><?php echo $readrow['fld_product_price']; ?></td>
        <td><?php echo $readrow['fld_product_brand']; ?></td>
        <td><?php echo $readrow['fld_product_type']; ?></td>
        <td><?php echo $readrow['fld_product_clasp']; ?></td>
        <td><?php echo $readrow['fld_product_color']; ?></td>
        <td>
          <a href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>">Details</a>
          <a href="products.php?edit=<?php echo $readrow['fld_product_id']; ?>">Edit</a>
          <a href="products.php?delete=<?php echo $readrow['fld_product_id']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>

      </table>
    </center>
  </font>
  </body>
  </html>