<?php  
  include_once('../authen.php');
  $id = $_GET['id'];
  $sql = "SELECT * FROM `member` WHERE `id` = '".$id."' ";
  // id_village, role, prefix, first_name, last_name, id_card, telephone, idline
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
?> 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Member Management</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="../../dist/img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../dist/img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../dist/img/favicons/favicon-16x16.png">
  <link rel="manifest" href="../../dist/img/favicons/site.webmanifest">
  <link rel="mask-icon" href="../../dist/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="shortcut icon" href="../../dist/img/favicons/favicon.ico">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-config" content="../../dist/img/favicons/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar & Main Sidebar Container -->
  <?php include_once('../includes/sidebar.php') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Member Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="../member">Member Management</a></li>
              <li class="breadcrumb-item active">Edit Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Edit Data</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="update.php" method="post">
          <div class="card-body">
            <div class="form-group">
              <label for="id_village">รหัสหมู่บ้าน</label>
              <input type="text" disabled class="form-control" name="id_village" id="id_village" placeholder="รหัสหมู่บ้าน" value="<?php echo $row['id_village']; ?>" required>
            </div>
            <div class="form-group">
              <label>เลือกบทบาท</label>
              <select class="form-control" required name="role">
                <option value="" disabled selected>เลือกบทบาท</option>
                <option value="1.ประธาน">1.ประธาน กทบ.</option>
                <option value="2.รองประธาน">2.รองประธาน กทบ.</option>
                <option value="3.เลขา">3.เลขา กทบ.</option>
                <option value="4.เหรัญญิก">4.เหรัญญิก กทบ.</option>
                <option value="5.กรรมการ">5.กรรมการ กทบ.</option>
                <option value="6.เก็บข้อมูล">6.เก็บข้อมูล กทบ.</option>
              </select>
            </div>
            <div class="form-group">
              <label for="prefix">คำนำหน้า</label>
              <input type="text" class="form-control" name="prefix" id="prefix" placeholder="คำนำหน้า" value="<?php echo $row['prefix']; ?>" required>
            </div>
            <div class="form-group">
              <label for="first_name">ชื่อ</label>
              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="ชื่อ" value="<?php echo $row['first_name']; ?>" required>
            </div>
            <div class="form-group">
              <label for="last_name	">สกุล	</label>
              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="สกุล" value="<?php echo $row['last_name']; ?>" required>
            </div>
            <div class="form-group">
              <label for="id_card">เลขบัตรประชาชน</label>
              <input type="text" class="form-control" name="id_card" id="id_card" placeholder="เลขบัตรประชาชน" value="<?php echo $row['id_card']; ?>" required>
            </div>
            <div class="form-group">
              <label for="telephone">หมายเลขโทรศัพท์</label>
              <input type="text" class="form-control" name="telephone" id="telephone" placeholder="หมายเลขโทรศัพท์" value="<?php echo $row['telephone']; ?>" required>
            </div>
            <div class="form-group">
              <label for="id_line">id_line</label>
              <input type="text" class="form-control" name="id_line" id="id_line" placeholder="id_line" value="<?php echo $row['id_line']; ?>" required>
            </div>
            
            <input type="hidden" name="id" value="<?php echo $id; ?>">

          </div>
          <div class="card-footer">
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- footer -->
  <?php include_once('../includes/footer.php') ?>
  
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- DataTables -->
<script src="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap4.min.js"></script>

<script>
  $(function () {
    $('#dataTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>

</body>
</html>
