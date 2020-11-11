<?php 
  include_once 'products_crud.php';
  include_once 'db.php';
  include_once 'session.php';
?>

<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hikers : Catalogue</title>
  
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
                        
                    <!-- Advance search button -->
                    <div type="button" id="btnAdvanceSearch" class="btn btn-primary btn-lg btn-block" style="width: 95.5%; background-color: #000000;">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span><font color="#ffffff"> Search</font>
                    </div>
                    <br>


              <br>


                    <p class="control-label"><font size="5" color="#000000">Brand</font></lp>
                        <br>
                    <div class="list-group">
                            <a href="catalogue.php" class="list-group-item">All Brand</a>
                            <a href="genre.php?boot=Karrimor" class="list-group-item">Karrimor</a>
                            <a href="genre.php?boot=North Face" class="list-group-item">North Face</a>
                            <a href="genre.php?boot=Salomon" class="list-group-item">Salomon</a>
                        </div> 

                    <p class="lead"><font size="5" color="#000000">Type</font></p>
                        <div class="list-group">
                            <a href="catalogue.php" class="list-group-item">All Type</a>
                            <a href="genre.php?boot=Backpacking Boots" class="list-group-item">Backpacking Boots</a>
                            <a href="genre.php?boot=Day Hiking Boots" class="list-group-item">Day Hiking Boots</a>
                            <a href="genre.php?boot=Hiking Shoes" class="list-group-item">Hiking Shoes</a>
                        </div>  
                </div>  
                <br>
                <br>
                <div class="col-md-9">
                    <div class="jumbotron" id="advanceSearch" style="background-color: #000000">
                        <center>
                            <h3> <font color="#ffffff">Search</font></h3>
                        </center>

                            <form class="" action="catalogue.php" method="get">
                            <div class="row">
                              <div class="col-md-2">
                                <input disabled type="text" name="" value="Name:" class="form-control">
                              </div>
                              <div class="col-md-8">
                                <div class="form-group">
                                  <input class="form-control" type="text" name="searchName" value="">
                                </div>
                              </div>
                              <div class="col-md-2">
                                <select class="form-control" name="dropdownAndOr1">
                                  <option value="and">And</option>
                                  <option value="or">Or</option>
                                </select>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <input disabled type="text" name="" value="Brand:" class="form-control">
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                      <input class="form-control" type="text" name="searchBrand" value="">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" name="dropdownAndOr2">
                                      <option value="and">And</option>
                                      <option value="or">Or</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-md-2">
                                <input disabled type="text" name="" value="Type:" class="form-control">
                              </div>
                              <div class="col-md-8">
                                <div class="form-group">
                                  <input class="form-control" type="text" name="searchType" value="">
                                </div>
                              </div>
                            </div>

                            <div class="row pull-right">
                                <button type="submit" name="submitSearch" class="btn btn-success">Search</button>
                                <button type="button" id="searchCancel" class="btn btn-warning">Cancel</button>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <?php
                        //pagination
                        $per_page = 9;
                        if (isset($_GET["page"]))
                                { 
                                    $page = $_GET["page"] ;
                                }
                            else
                                {
                                    $page = 1;
                                }
                            $start_from = ($page-1) * $per_page;
                        try {
                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                //check sini
                                if (isset($_GET['submitSearch'])) 
                                {
                                    $searchName = $_GET['searchName'];
                                    $searchBrand = $_GET['searchBrand'];
                                    $searchType = $_GET['searchType'];
                                    $dropdownAndOr1 = $_GET['dropdownAndOr1'];
                                    $dropdownAndOr2 = $_GET['dropdownAndOr2'];
                                    $query = "SELECT * FROM tbl_product_a171782_pt2";
                                    if(empty($searchName) && empty($searchBrand) && empty($searchType))
                                        {$query = "SELECT * FROM tbl_product_a171782_pt2";} 
                                    else 
                                        {$query = $query." WHERE";
                                            if (!empty($searchName)) 
                                                {$query = $query." FLD_PRODUCT_NAME LIKE '%".$searchName."%'";
                                                $query = $query." ".$dropdownAndOr1;
                                                if (!empty($searchBrand) && !empty($searchType)) 
                                                        { $query = $query." (FLD_BRAND LIKE '%".$searchBrand."%' ".$dropdownAndOr2." FLD_TYPE LIKE '%".$searchType."%')";} 
                                                    elseif (!empty($searchBrand)) 
                                                        {$query = $query." FLD_BRAND LIKE '%".$searchBrand."%'";} 
                                                    elseif (!empty($searchType)) 
                                                        {$query = $query." FLD_TYPE LIKE '%".$searchType."%'";}
                                            } 
                                            elseif (!empty($searchBrand))
                                                { $query = $query." FLD_BRAND LIKE '%".$searchBrand."%'";
                                                    if (!empty($searchType)) 
                                                        { $query = $query." ".$dropdownAndOr2." FLD_TYPE LIKE '%".$searchType."%'";}
                                                } 
                                            elseif (!empty($searchType)) 
                                                { $query = $query." FLD_TYPE LIKE '%".$searchType."%'";}

                                        $stmt = $conn->prepare($query);
                                    }
                                }

                            else if (isset($_GET['find'])) 
                                {
                                $getSearch = $_GET['find-text'];
                                $stmt = $conn->prepare("SELECT * FROM tbl_product_a171782_pt2 WHERE FLD_PRODUCT_NAME LIKE '%".$getSearch."%'");
                                }
                            else if (isset($_GET["sort"])) {
                                $getSort = $_GET["sort"];

                                if($getSort == "nameAsc"){
                                  $stmt = $conn->prepare("SELECT * FROM tbl_product_a171782_pt2 ORDER BY FLD_PRODUCT_NAME ASC");
                                } elseif ($getSort == "nameDesc") {
                                  $stmt = $conn->prepare("SELECT * FROM tbl_product_a171782_pt2 ORDER BY FLD_PRODUCT_NAME DESC");
                                } elseif ($getSort == "priceAsc") {
                                  $stmt = $conn->prepare("SELECT * FROM tbl_product_a171782_pt2 ORDER BY FLD_PRODUCT_PRICE ASC");
                                } elseif ($getSort == "priceDesc") {
                                  $stmt = $conn->prepare("SELECT * FROM tbl_product_a171782_pt2 ORDER BY FLD_PRODUCT_PRICE DESC");
                                } elseif ($getSort == "brandAsc") {
                                  $stmt = $conn->prepare("SELECT * FROM tbl_product_a171782_pt2 ORDER BY FLD_BRAND ASC");
                                } elseif ($getSort == "brandDesc") {
                                  $stmt = $conn->prepare("SELECT * FROM tbl_product_a171782_pt2 ORDER BY FLD_BRAND DESC");
                                }
                              }
                            else
                                {
                                $stmt = $conn->prepare("SELECT * FROM tbl_product_a171782_pt2 LIMIT $start_from, $per_page");    
                                }

                            $stmt->execute();
                            $result = $stmt->fetchAll();
                            if($stmt->rowCount() == 0)
                                {
                                    echo "<script>alert('No results found');</script>";
                                }
                            }


                        catch(PDOException $e){
                            echo "Error: " . $e->getMessage();
                        }
                        foreach($result as $readrow) {
                        ?> 
                        

                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail" style="height: 340px; position: relative;">
                                <img src="products/<?php echo $readrow['fld_product_image'] ?>" class="img-responsive" width="10%" height="5%">
                                <div class="caption">
                                    <h4 class="pull-right"><td>RM<?php echo $readrow['FLD_PRODUCT_PRICE']; ?></h4>
                                    <h4><a href="products_details.php?pid=<?php echo $readrow['FLD_PRODUCT_NAME']; ?>"?> <?php echo $readrow['FLD_PRODUCT_NAME']; ?></a></h4>
                                    <p style="color:black"><?php echo $readrow['FLD_TYPE']; ?></p>
                                </div>
                                
                                <a href="products_details.php?pid=<?php echo $readrow['FLD_PRODUCT_ID']; ?>" role="button" class="btn btn-primary btn-lg btn-block" style="vertical-align: bottom;position: absolute; bottom: 10px; right: 7px; width: 95%; background-color: #000000">View Product</a>
                            </div>
                        </div>
                        <?php
                            }
                            $conn = null;
                            ?>
                                
                        <div class="row">
                            <div class="col-xs-12 col-sm-10 col-sm-offset-4 col-md-8 col-md-offset-4">
                                <nav>
                                    <ul class="pagination">
                                    <?php
                                    try {
                                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        //check sini sekali. yang ini untuk advance search
                                    if (isset($_GET['submitSearch'])) 
                                        {
                                            $searchName = $_GET['searchName'];
                                            $searchBrand = $_GET['searchBrand'];
                                            $searchType = $_GET['searchType'];
                                            $dropdownAndOr1 = $_GET['dropdownAndOr1'];
                                            $dropdownAndOr2 = $_GET['dropdownAndOr2'];
                                            $query = "SELECT * FROM tbl_product_a171782_pt2";

                                            if(empty($searchName) && empty($searchBrand) && empty($searchType))
                                                {
                                                    $query = "SELECT * FROM tbl_product_a171782_pt2";
                                                } 
                                            else 
                                                {
                                                    $query = $query." WHERE";
                                                    if (!empty($searchName)) 
                                                        {
                                                            $query = $query." FLD_PRODUCT_NAME LIKE '%".$searchName."%'";
                                                            $query = $query." ".$dropdownAndOr1;

                                                            if (!empty($searchBrand) && !empty($searchType)) 
                                                                {
                                                                     $query = $query." (FLD_BRAND LIKE '%".$searchBrand."%' ".$dropdownAndOr2." FLD_TYPE LIKE '%".$searchType."%')";
                                                                } 
                                                            elseif (!empty($searchBrand)) 
                                                                {
                                                                    $query = $query." FLD_BRAND LIKE '%".$searchBrand."%'";
                                                                } 
                                                            elseif (!empty($searchType)) 
                                                                {
                                                                    $query = $query." FLD_TYPE LIKE '%".$searchType."%'";
                                                                }

                                                        } 
                                                    elseif (!empty($searchBrand))
                                                        {
                                                            $query = $query." FLD_BRAND LIKE '%".$searchBrand."%'";

                                                            if (!empty($searchType)) 
                                                                {
                                                                    $query = $query." ".$dropdownAndOr2." FLD_TYPE LIKE '%".$searchType."%'";
                                                                }

                                                        } 
                                                    elseif (!empty($searchType)) 
                                                        {
                                                            $query = $query." FLD_TYPE LIKE '%".$searchType."%'";

                                                        }

                                                }


                                            $stmt = $conn->prepare($query);

                                             }


                                        //single search
                                        else if (isset($_GET['find'])) {
                                            $getSearch = $_GET['find-text'];
                                            $stmt = $conn->prepare("SELECT * FROM tbl_product_a171782_pt2 WHERE FLD_PRODUCT_NAME LIKE '%".$getSearch."%'");
                                        }else{
                                            $stmt = $conn->prepare("SELECT * FROM tbl_product_a171782_pt2");
                                        }
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
                                    <?php } ?>
                                    <?php
                                    for ($i=1; $i<=$total_pages; $i++)
                                        if ($i == $page)
                                            echo "<li class=\"active\"><a href=\"catalogue.php?page=$i\">$i</a></li>";
                                        else
                                            echo "<li><a href=\"catalogue.php?page=$i\">$i</a></li>";
                                    ?>
                                    <?php if ($page==$total_pages) { ?>
                                        <li class="disabled"><span aria-hidden="true">»</span></li>
                                    <?php } else { ?>
                                        <li><a href="catalogue.php?page=<?php echo $page+1 ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                    <?php } ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function(){

                $("#advanceSearch").hide();

                $("#btnAdvanceSearch").click(function(){
                    $("#advanceSearch").slideDown(500);
                });
                $("#searchCancel").click(function(){
                    $("#advanceSearch").slideUp(500);
                });
            });
          </script>

    </body>
</html>