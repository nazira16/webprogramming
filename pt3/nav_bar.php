<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Bingle Bangle</a>
    </div>
 
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <?php if($name!=""){ ?>
    <ul class="glyphicon glyphicon navbar-right" align="center">
      <h4 style="font: Century Gothic"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo $pos; ?>: <?php echo $name; ?></h4>
    </ul>

<?php }?>
    <ul class="nav navbar-nav">
      <li><a href="mainpage.php">Home</a></li>
    </ul>
      <ul class="nav navbar-nav navbar-left">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="catalogue.php">Catalogue</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="customers.php">Customers</a></li>
            <li><a href="staffs.php">Staffs</a></li>
            <li><a href="orders.php">Orders</a></li>
            <li><a href="change_password.php">Change Password</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>   Logout </a></li>

          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>