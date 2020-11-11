<?php
include_once 'database.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Search
	</title>
</head>
<body>
<form action="index.php" method="post">
	<input type="text" name="search" placeholder="Search">
	<input type="submit" value=">>"/>
</form>
<div class ="row">
	<?php
	//pagination
	$per_page = 9;
	if (isset($_GET["page"])){
		$page = $_GET["page"];
	}else{
		$page = 1;
	}
	$start_from = ($page-1)*$per_page;

	try{
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if (isset($_POST['search'])) {
			$searchq = $_POST['search'];
			$query = "SELECT * FROM tbl_products_a168219 WHERE fld_product_name LIKE '%$searchq%' OR fld_product_brand LIKE '%searchq%' OR fld_product_type LIKE '%searchq%' ";

			if (empty($searchq)) {
				$query = "SELECT * FROM tbl_products_a168219";
			}
		}

		else {
			$stmt = $conn->prepare("SELECT * FROM tbl_products_a168219 LIMIT $start_from, $per_page"); 
		}

		$stmt->execute();
		$result = $stmt->fetchAll();
		if($stmt->rowCount() == 0){
			echo "<script>alert('No results found');</script>";
		}
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	foreach($result as $readrow){
	?>
	<div class="col-sm-4 col-lg-4 col-md-4">
		<div class="thumbnail" style="height: 340px; position: relative;">
			<img src="products/<?php echo $readrow['fld_product_image'] ?>" class="img-responsive" width="10%" height="5%">
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
</body>
</html>