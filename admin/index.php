<?php include('model/koneksi.php');

  session_start();
  if(empty($_SESSION['admin'])){
    // session_destroy();
    echo"<script>
      window.location='login.php';
    </script>";
  }

?>


<!DOCTYPE html>
<html>
<head>
<?php include ('component/head.php') ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php include('component/topbar.php') ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('component/sidebar.php') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->

    <!-- Main content -->
    <?php include('content.php') ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('component/footer.php') ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include('component/script.php') ?>
</body>
</html>
