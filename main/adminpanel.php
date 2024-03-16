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
                <a href="adminpanel.php" class="nav-link active">
                    <i class="fas fa-plus-circle"></i>
                    <p>
                        &nbsp;Add products
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="editdelete.php" class="nav-link">
                    <i class="fas fa-plus-circle"></i>
                    <p>
                        &nbsp;Edit / Delete
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="vieworders.php" class="nav-link ">
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
          <div class="card">
              <div class="card-header">
                  <h3>Add Product</h3>
              </div>
              <div class="card-body">
                  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                      <p>Enter Product Name : </p>
                      <input type="text" class="form-control" name="title">
                      <br>
                      <p>Enter Price</p>
                      <input type="number" class="form-control" name="price">
                      <br>
                      <p>Select Image : </p>
                      <input type="file" name="fileToUpload" id="fileToUpload">
                      <br>
                      <br>
                      <button type="submit" class="btn btn-primary form-control" name="addProduct">Add Product</button>
                  </form>
              </div>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="">farmersportal.gov@gmail.com</a></strong>
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
    if($_SERVER['REQUEST_METHOD'] == "POST") {

        if(isset($_POST['addProduct'])){
            $title = mysqli_real_escape_string($conn, $_POST['title']);
//            $post = $_POST['post'];
//            $post = htmlspecialchars($post);
            $price = mysqli_real_escape_string($conn, $_POST['price']);
            #$post = base64_encode($post);
            #$categoryname = mysqli_real_escape_string($conn, $_POST['categoryname']);


            date_default_timezone_set("Asia/Calcutta");
            $datet = date("d-m-Y-h-i-s");
            $target_dir = "productimg/";
            $target_file = $target_dir . "/" . $datet . basename($_FILES["fileToUpload"]["name"]);
            $filebasename = basename($_FILES["fileToUpload"]["name"]);
            $filename = $datet . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;


            // Check if file already exists
            /*if (file_exists($target_file)) {
                echo "File already exists.";
                $uploadOk = 0;
            }*/

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "File was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                    $sqlinblog = "INSERT INTO products(title, img, price) VALUES('$title', '$filename', $price) ";

                    if(mysqli_query($conn, $sqlinblog)){
                        echo "<script>alert('Product Added'); document.location='adminpanel.php'</script>";
                    }else{
                        echo "<script>alert('Error occured'); document.location='adminpanel.php'</script>";
                        #echo mysqli_error($conn);
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }
}
?>