<?php 
  include_once 'products_crud.php';
  include_once 'database.php';
  include_once 'session.php';
?>

<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Products: Catalogue</title>
  
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" /> 
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
    <link href="css/prettyPhoto.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />  

    <style type="text/css">

   
        .thumbnail {
            color : black;
        }

        .thumbnail img {
            height: 150px;
            width: 50%;
        }

        .warna h2, p {
          font : 14px white bold;

        }

        .table-striped>tbody>tr:nth-of-type(odd) {
          background-color: #808080;
      }

      .searchSingle {
        margin : 2px 10px 10px 2px;

      }


      .list-group-item {
        position: relative;
        display: block;
        padding: 10px 15px;
        margin-bottom: -1px;
        color : white;
        background-color: #fff;
        border: 1px solid #ddd;
    }

    </style>

</head>

<body style="background-color:#DCDCDC;">
	
    <?php include_once 'nav_bar.php'; ?>

    <!-- Page Content -->
    <br>
    <br>
        <div class="container warna">
            <div class="row">
                <div class="col-md-3">
                 
                    <br>


              <br>

                </div>  
                <br>
                <br>
                <div class="col-md-12">
                    <div class="jumbotron" id="advanceSearch" style="background-color: #000000">
                        <center>
                            <h3> <font color="#ffffff">Search</font></h3>
                        </center>

                            <form class="" action="try.php" method="get">
                            <div class="row">
                              <div class="col-md-10">
                                <div class="form-group">
                                  <input class="form-control" type="text" name="search" value="">
                                </div>
                              </div>
                            <div class="row pull-right">
                                <button type="submit" name="submitSearch" class="btn btn-success">Search</button>
                                <button type="reset" id="clear" class="btn btn-warning">Clear</button>
                            </div>
                        </form>
                        <br><br><br>
                    </div>

                    <div class="row">
    <div>
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
                            <div class="thumbnail" style="height: 400px; position: relative;">
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
            <li><a href="try.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"try.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"try.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="try.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
</div>
</body>
</html>