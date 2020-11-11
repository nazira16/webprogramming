<?php 
  include_once 'products_crud.php';
  include_once 'database.php';
  include_once 'session.php';
 include_once 'nav_bar.php'; 
  if (isset($_POST["submit"])){
    if (!empty($_POST["search"])){
        $query = str_replace(" ","+",$_POST["search"]);
        header("location:catalogue.php?search=".$query);
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bingle Bangle: Catalogue</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    </style>
</head>
<body>
    <div class="container-fluid">
    <div class="col-md-12">
        <div class="jumbotron" style="background-color: #FAF0E6">
            <center>
                <h3> <font>Catalogue</font></h3>
            </center>
                    <form action="catalogue.php" method="post">
                    <div class="row">
                      <div class="col-sm-10">
                          <input class="form-control" type="text" name="search" value="<?php if (isset($_GET["search"])) echo $_GET["search"]; ?>" required placeholder="Search Name/Brand/Type/Price/Clasp...">
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
                    $sql_query = "SELECT * FROM tbl_products_a168219 WHERE CONCAT(`fld_product_name`, `fld_product_brand`,  `fld_product_type`, `fld_product_price`, `fld_product_clasp`) LIKE '%".$_GET["search"]."%'";
                    
                    $stmt=$conn->prepare($sql_query);
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
                        <a data-href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-primary btn-block" role="button" style="vertical-align: bottom;position: absolute; bottom: 10px; right: 7px; width: 95%; background-color: #BC8F8F"> View Product </a>
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
            <li><a href="catalogue.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"catalogue.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="catalogue.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
    </div>
</div>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
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