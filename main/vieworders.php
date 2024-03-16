<?php
session_start();
include_once "functions.php";
if(checkAdminLogin()){
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
            <i class="fas fa-power-off"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="adminpanel.php" class="nav-link ">
                    <i class="fas fa-plus-circle"></i>
                    <p>
                        &nbsp;Add products
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="editdelete.php" class="nav-link ">
                    <i class="fas fa-plus-circle"></i>
                    <p>
                        &nbsp;Edit / Delete
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="vieworders.php" class="nav-link active">
                    <i class="fas fa-list"></i>
                    <p>
                        &nbsp;View Orders
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="feedbackadmin.php" class="nav-link">
                    <i class="fas fa-list"></i>
                    <p>
                        &nbsp;Feedback
                    </p>
                </a>
            </li>
        </ul>
      </nav>
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
<!--            <h1 class="m-0 text-dark">Dashboard</h1>-->
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

              <?php
                $sql = "SELECT DISTINCT oid FROM orders";
                $res = mysqli_query($conn, $sql);

                if(mysqli_num_rows($res) > 0){
                    while ($row = mysqli_fetch_assoc($res)){
                        $oid = $row["oid"];

                        ?>
                        <div class="card">
                        <div class="card-header">
                            <h3>Order ID - <?php echo $oid; ?></h3>
                        </div>
                        <div class="card-body">
                        <?php

                        $sqlunq = "SELECT * FROM orders WHERE oid = '$oid'";
                        $resunq = mysqli_query($conn, $sqlunq);
                        if(mysqli_num_rows($resunq) > 0){
                            while ($rowunq = mysqli_fetch_assoc($resunq)){
                                $uid = $rowunq["uid"];
                                $pid = $rowunq["pid"];

                                $sqluser = "SELECT * FROM user WHERE id = $uid";
                                $resusr = mysqli_query($conn, $sqluser);
                                if(mysqli_num_rows($resusr) > 0) {
                                    while ($rowusr = mysqli_fetch_assoc($resusr)) {
                                        $name = $rowusr["name"];
                                        $phone = $rowusr["phone"];
                                        $email = $rowusr["email"];
                                        $address = $rowusr["address"];
                                    }
                                }

                                $sqlproducts = "SELECT * FROM products WHERE id = $pid";
                                $resproduct = mysqli_query($conn, $sqlproducts);
                                if(mysqli_num_rows($resproduct) > 0) {
                                    while ($rowproduct = mysqli_fetch_assoc($resproduct)) {
                                        $productTitle = $rowproduct["title"];
                                        $img = $rowproduct["img"];
                                        $price = $rowproduct["price"];
                                        echo "<div class='row'><div class='col-sm-4'><img src='productimg/$img' height='250px' width='250px' class='img img-fluid'></div><div class='col-sm-4'><h3>$productTitle</h3></div><div class='col-sm-4'><h3>$price</h3></div></div><br><br>";
                                    }
                                }

                            }
                        }
                        echo "<hr><b>" . $name . " | " . $phone . " | " . $email . " | " . $address . "</b>";
                        ?>
                        </div>
                        </div>
                        <?php
                    }
                }
              ?>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="#"></a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      
    </div>
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="plugins/sparklines/sparkline.js"></script>
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="dist/js/adminlte.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<script src="dist/js/demo.js"></script>
</body>
</html>
<?php
}
?>