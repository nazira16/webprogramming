<?php 
  include_once 'products_crud.php';
  include_once 'database.php';
  include_once 'session.php';

  if (isset($_POST["submit"])){
  	if (!empty($_POST["search"])){
  		$query = str_replace(" ","+",$_POST["search"]);
  		header("location:c2.php?search=".$query);
  	}
  	else
  		echo "search bar is empty";
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Products: Catalogue</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	</style>
</head>
<body>
	<?php include_once 'nav_bar.php'; ?>
	<div class="container-fluid">
	<div class="row">
	  <div class="col-md-3">
	  <br>
	  <br>
	</div>
	<br>
	<br>
	<div class="col-md-12">
		<div class="jumbotron" style="background-color: #000000">
		    <center>
		        <h3> <font color="#ffffff">Catalogue</font></h3>
		    </center>
		            <form class="" action="c2.php" method="get">
		            <div class="row">
		            	<div class="col-sm-3-pull-4">
		            		<select  name="filter" class="col-sm-3 control-label">
		            		<option>Name</option>
		            		<option>Brand</option>
		            		<option>Type</option>
		            	</select></div>
		              <div class="col-sm-8">
		                  <input class="form-control" type="text" name="search" value="<?php if (isset($_GET["search"])) echo $_GET["search"]; ?>">
		              </div>

		            <div class="row pull-right">
		                <button type="submit" name="submit" class="btn btn-success" value="search">Search</button>
		                <button type="reset" id="clear" class="btn btn-warning">Clear</button>
		            </div>
		        </form>
		    </div>
		    <br><br>
		 <div class="row">
		 	<?php
		 	$per_page = 6;
		 	if (isset($_GET["page"])) {
		 		$page = $_GET["page"];
		 	}else{
		 		$page = 1;
		 	}
		 	$start_from = ($page-1)*$per_page;

		 	try{
		 		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		 		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 		$stmt = $conn->prepare("SELECT * FROM tbl_products_a168219 LIMIT $start_from,$per_page");
		 		 

		 		 if (isset($_GET["search"])) {
		 		 	$sql_query = "SELECT * FROM tbl_products_a168219 WHERE fld_product_name LIKE '%".$_GET["search"]."%' OR fld_product_brand LIKE '%".$_GET["search"]."%'";
		 		 	
		 		 	$stmt=$conn->prepare($sql_query);
		 		 } else{
		 		 	echo "Data not Found";
		 		 }
		 		 $stmt->execute();
		 		 $result = $stmt->fetchAll();

		 	}
		 	catch(PDOException $e){
		 		echo "Error: " . $e->getMessage();
		 	}
		 	foreach($result as $readrow) {
		 	?>

		 	<div class="col-sm-4 col-lg-4 col-md-4">
		 	    <div class="thumbnail" style="height:340px; position: relative;">
		 	        <img src="products/<?php echo $readrow['fld_product_image'] ?>" class="img-responsive" width="50%" height="50%">
		 	        <div class="caption">
		 	            <h4><center><a href="products_details.php?pid=<?php echo $readrow['fld_product_name']; ?>"?> <?php echo $readrow['fld_product_name']; ?></a></center></h4>
		 	            <h5 class="pull-right" style="vertical-align: bottom;"><td>RM<?php echo $readrow['fld_product_price']; ?></td></h5> 
		 	        </div>
		 	        <center>
		 	            <a href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-primary btn-block" role="button" style="vertical-align: bottom;position: absolute; bottom: 10px; right: 7px; width: 95%; background-color: #000000"> View Product </a>
		 	        </center>  
		 	    </div>
		 	</div>
		 	<?php
		 	    }
		 	    $conn = null;
		 	    ?>
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
            <li><a href="c2.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"c2.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="c2.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
	</div>