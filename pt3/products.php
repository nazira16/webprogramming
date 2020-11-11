<?php
  include_once 'products_crud.php';
  include_once 'database.php';
  include_once 'session.php';
?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Bingle Bangle: Products</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
  <?php include_once 'nav_bar.php';?>
 
<div class="container-fluid">
  <div class="row" <?php if ($pos== "Normal Staff"){ ?> style="display: none"<?php   } ?>>
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Create New Product</h2>
      </div>
    <form action="products.php" method="post" class="form-horizontal">
      <div class="form-group">
          <label for="productid" class="col-sm-3 control-label">ID</label>
          <div class="col-sm-9">
          <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID"value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_id']; ?>" required>
        </div>
        </div>
      <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
          <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name"value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>" required>
        </div>
        </div>
        <div class="form-group">
          <label for="productprice" class="col-sm-3 control-label">Price</label>
          <div class="col-sm-9">
          <input name="price" type="text" class="form-control" id="productprice" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>"min="0.0" step="0.01" required>
        </div>
        </div>
          <div class="form-group">
          <label for="productbrand" class="col-sm-3 control-label">Brand</label>
          <div class="col-sm-9">
          <select name="brand" class="form-control" id="productbrand" required="">
          <option value="THOMAS SABO" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="THOMAS SABO") echo "selected"; ?>>THOMAS SABO</option>
          <option value="PANDORA" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="PANDORA") echo "selected"; ?>>PANDORA</option>
          <option value="ETSY" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="ETSY") echo "selected"; ?>>ETSY</option>
          <option value="SMGLOBALSHOP" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="SMGLOBALSHOP") echo "selected"; ?>>SMGLOBALSHOP</option>
          <option value="LOVISA" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="LOVISA") echo "selected"; ?>>LOVISA</option>
          <option value="POHKONG" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="POHKONG") echo "selected"; ?>>POHKONG</option>
          <option value="Tiffany & Co." <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Tiffany & Co.") echo "selected"; ?>>Tiffany & Co.</option>
          <option value="Elsa Peretti" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Elsa Peretti") echo "selected"; ?>>Elsa Peretti</option>
        </select>
         </div>
        </div>    
        <div class="form-group">
          <label for="type" class="col-sm-3 control-label">Type</label>
          <div class="col-sm-9">
          <div class="radio">
            <label>
              <input name="type" type="radio" id="type" value="Bangle" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Bangle") echo "checked"; ?>required> BANGLE
            </label>
          </div>
          <div class="radio">
            <label>
              <input name="type" type="radio" id="type" value="Bracelet" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Bracelet") echo "checked"; ?>>BRACELET
            </label>
            </div>
          </div>
          </div>
        <div class="form-group">
          <label for="clasp" class="col-sm-3 control-label">Clasp</label>
          <div class="col-sm-9">
          <select name="clasp" class="form-control" id="clasp" required>
            <option value="Adjustable Clasp" <?php if(isset($_GET['edit'])) if($editrow['fld_product_clasp']=="Adjustable Clasp") echo "selected"; ?>>Adjustable Clasp</option>
            <option value="Folding Clasp" <?php if(isset($_GET['edit'])) if($editrow['fld_product_clasp']=="Folding Clasp") echo "selected"; ?>>Folding Clasp</option>
            <option value="Sliding Clasp" <?php if(isset($_GET['edit'])) if($editrow['fld_product_clasp']=="Sliding Clasp") echo "selected"; ?>>Sliding Clasp</option>
          <option value="Bangle" <?php if(isset($_GET['edit'])) if($editrow['fld_product_clasp']=="Bangle") echo "selected"; ?>>Bangle</option>
          </select>
          </div>
        </div>  
      <div class="form-group">
          <label for="productcolor" class="col-sm-3 control-label">Color</label>
          <div class="col-sm-9">
           <input name="color" type="text" class="form-control" id="productcolor" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_color']; ?>" required>
            </div>
        </div>
         <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
          <?php if (isset($_GET['edit'])) { ?>
          <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_id']; ?>">
          <button class="btn btn-default" type="submit" name="update" <?php if ($pos== "Normal Staff"){ ?> disabled <?php   } ?>><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
          <?php } else { ?>
          <button class="btn btn-default" type="submit" name="create"
          <?php if ($pos== "Normal Staff"){ ?> disabled <?php   } ?> ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
          <?php } ?>
          <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
        </div>
      </div>
     </form>
    </div>
  </div>
     <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
         <h2>Products List</h2>
      </div>
      <table class="table table-striped table-bordered">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Brand</th>
        <th>Type</th>
        <th>Clasp</th>
        <th>Color</th>
        <th></th>
      </tr>
       <?php
      // Read
        $per_page = 5;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_products_a168219 LIMIT $start_from, $per_page");
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
          <button data-href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>"class="btn btn-warning btn-xs" role="button" >Details</button>
          <button class="btn btn-success btn-xs" onclick="window.location.href='products.php?edit=<?php echo $readrow['fld_product_id']; ?>';" <?php if ($pos== "Normal Staff"){ ?> style="display: none"<?php   } ?>>Edit</button>
           <button class="btn btn-danger btn-xs" onclick="window.location.href='products.php?delete=<?php echo $readrow['fld_product_id']; ?>'; return confirm('Are you sure to delete?');" <?php if ($pos== "Normal Staff"){ ?> style="display: none"<?php   } ?>>Delete</button>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>

      </table>
       </div>
  </div>
  </font>
   <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
          <ul class="pagination">
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a168219");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $total_records = count($result);
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          $total_pages = ceil($total_records / $per_page);
          ?>
          <?php if ($page==1) { ?>
            <li class="disabled"><span aria-hidden="true">«</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"products.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<div class="bs-example">
	<!-- Modal HTML-->
	<div id="myModal" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Product Details</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $(".btn").click(function(){
      var dataURL = $(this).attr("data-href")
      $('.modal-body').load(dataURL,function() {
        $('#myModal').modal({show:true});
      });
      
    });
  });
</script>
</body>
</html>