<?php
include_once "database.php";
include_once "session.php";

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM tbl_products_a168219 WHERE fld_product_name LIKE '%".$valueToSearch."%' OR fld_product_brand LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
else {
    $query = "SELECT * FROM `tbl_products_a168219`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("lrgs.ftsm.ukm.my", "a168219", "littlewhitehamster", "a168219");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
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
  <div class="col-md-12">
    <div class="jumbotron" style="background-color: #FAF0E6">
        <center>
            <h3> <font>Catalogue</font></h3>
        </center>
        <div class="search-container">
          <form action="c3.php" method="post">
            <div class="row">
              <div class="col-md-10">
                <div class="form-group">
                  <input type="text" placeholder="Search Brand/Type/Price" id="search" name="valueToSearch" class="form-control" required>
                </div>
              </div>

            <div class="">
                <button type="submit" id="search_btn" name="search" class="btn btn-success">Search</button>
            </div>
          </form>
          <div class="picture-grid">             
            <div class="row">
              <?php while($row = mysqli_fetch_array($search_result)):?>
              <div class="col-xs-12 col-md-4"> 
                  <div class="thumbnail" style="height:400px; position: relative;">              
                    <img src="products/<?php echo $row['fld_product_id']?>.jpg" class="img-responsive" width="50%" height="50%">
                    <div class="caption">
                        <center><h4 class="text"><?php echo $row['fld_product_name']; ?></h4></center>
                        <h5 class="pull-right">RM <?php echo $row['fld_product_price']; ?></h5><br><br>
                    </div>
                    <center> 
                    <center>
                        <a href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-primary btn-block" role="button" style="vertical-align: bottom;position: absolute; bottom: 10px; right: 7px; width: 95%; background-color: #000000"> View Product </a>
                    </center>        
                  </div>
              </div>
              <?php endwhile;?>
            </div>             
          </div>
           <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <nav>
          <ul class="pagination">
            <li><a href="#">&laquo;</a></li>           
            <li><a href="#" rel="page-1" class="active">1</a></li>            
            <li><a href="#">&raquo;</a></li>            
          </ul>
        </nav>
      </div>
    </div>
        </div>
      </div>
</body>
</html>
<script type="text/javascript"> 
  function validateForm() { 
      var x = document.forms["frmsearch"]["valueToSearch"].value;
      //var x = document.getElementById("prd").value;
      if (x == null || x == "") {
          alert("Search bar cannot be empty!");
          document.forms["frmsearch"]["valueToSearch"].focus();
          //document.getElementById("prd").focus();
          return false;
      }
      
      return true;
  }
</script>