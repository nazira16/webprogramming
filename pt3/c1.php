<?php 
  include_once 'products_crud.php';
  include_once 'database.php';
  include_once 'session.php';
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
	  <div class="col-md-12" style="background-color: #000000">
	    <div class="page-header">
	      <h2>Catalogue</h2>
	    </div>
	    <form action="c1.php" method="get" class="form-horizontal">
	    	<div class="form-group">
	    		<div class="col-sm-9">
	    			<input name="searchfrm" type="text" class="form-control" id="customerid" placeholder="BRACELET PINK LOVISA">
	    		</div>
	    		<div class="row pull-right">
	    		<button type="submit" name="submitSearch" class="btn btn-success">Search</button>
	    		<button type="reset" id="clear" class="btn btn-warning">Clear</button>
	    	</div>
	    	</div>
	    </form>
	</div>
	<div class="row">
	    <div class="col-xs-12 col-sm-10 col-sm-offset-2 col-md-8 col-md-offset-2">
	      <?php
	      try {
	              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	              //$stmt = $conn->prepare("SELECT * FROM tbl_products_a168219");
	               $stmt->execute();
	               $result = $stmt->fetchAll();

	               if(isset($_GET['submitSearch'])){
	               	$search = $_GET['searchfrm'];
	               	$query = "SELECT * FROM tbl_products_a168219";

	               	if(empty($search)){
	               		echo '<script language="javascript">';
	               		echo 'alert("Search Bar is empty")';
	               		echo '</script>';
	               	}
	               	else{

	               		if ($search === "fld_product_type")

	               		$query = $query." WHERE (fld_product_name LIKE '%".$search."%') OR ( fld_product_brand LIKE '%".$search."%') OR ( fld_product_type LIKE '%".$search."%')";

	               		$stmt = $conn->prepare($query);
	               	}
	               	$stmt->execute();
	               	$result = $stmt->fetchAll();
	               	if($stmt->rowCount() == 0)
	               	    {
	               	        echo "<script>alert('No results found');</script>";
	               	    }

	               }
	       }
	       catch(PDOException $e){
	                   echo "Error: " . $e->getMessage();
	             }
	             foreach($result as $readrow) {
	             ?>
	             <div class="col-sm-4 col-lg-4 col-md-4" style="background-color: #B0C4DE"><br><br>
	                 <div class="thumbnail" style="height:340px; position: relative;">
	                     <img src="products/<?php echo $readrow['fld_product_image'] ?>" class="img-responsive" width="50%" height="50%">
	                     <div class="caption">
	                         <h4><center><a href="products_details.php?pid=<?php echo $readrow['fld_product_name']; ?>"?> <?php echo $readrow['fld_product_name']; ?></a></center></h4>
	                         <h5 ><td>RM<?php echo $readrow['fld_product_price']; ?></td></h5> 
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
	</div>



</body>
</html>