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
	<title>Bingle Bangle: Catalogue</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<?php include_once 'nav_bar.php'; ?>
	<div class="container-fluid">
	<div class="row">
	  <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
	  	<form action="test.php" method="get" class="form-horizontal">
	  		<label>Search</label>
	  		<div class="row">
	  			<div class="col-md-12">
	  					<input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
	  				</div>
			</div>
			
	</div>
</form>
</div>
</div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
         <h2>Products List</h2>
      </div>
       <?php
      // Read
        $per_page = 6;
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
      <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail" style="height: 340px; position: relative;">
                                <img src="products/<?php echo $readrow['fld_product_image'] ?>" class="img-responsive" width="50%" height="50%">
                                <div class="caption">
                                    <h4 class="pull-right"><td>RM<?php echo $readrow['fld_product_price']; ?></h4>
                                    <h4><a href="products_details.php?pid=<?php echo $readrow['fld_product_name']; ?>"?> <?php echo $readrow['fld_product_name']; ?></a></h4>
                                    <p style="color:black"><?php echo $readrow['fld_product_type']; ?></p>
                                </div>
                                
                                <a href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>" role="button" class="btn btn-primary btn-lg btn-block" style="vertical-align: bottom;position: absolute; bottom: 10px; right: 7px; width: 95%; background-color: #000000">View Product</a>
                            </div>
                        </div>
      <?php
      }
      $conn = null;
      ?>

      
       </div>
  </div>
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
<script>
function myFunction() {
  // Declare variables
  var input, filter, ul, li, a, i;
  input = document.getElementById("mySearch");
  filter = input.value.toUpperCase();
  ul = document.getElementById("myMenu");
  li = ul.getElementsByTagName("li");

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
</script>
</body>
</html>