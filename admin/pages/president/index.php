<?php  
include_once('../authen.php');
// include('../../../php/connect.php');
$sql = "SELECT * FROM `president`";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>president Management</title>
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

  <?php
        include_once('../../php/connect.php');
        // material Table
        $sql = "SELECT * FROM `president`";
        $result = $conn->query($sql);
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>president Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">president Management</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
        <?php
          if(@addslashes($_GET['check']=="complete")){
            echo "<div class='alert alert-success'>ทำรายการสำเร็จ!</div>";
          }
          if(@addslashes($_GET['check']=="error")){
            echo "<div class='alert alert-danger'>ทำรายการไม่สำเร็จ!</div>";
          }
          // if(@addslashes($_GET['check']=="not")){
          //   echo "<div class='alert alert-warning'>ทำรายการไม่สำเร็จ เนื่องเบิกเกินจำนวนที่มีอยู่!</div>";
          // }
        ?>
          <h3 class="card-title d-inline-block">Contents List</h3>
          <a href="form-create.php" class="btn btn-primary float-right ">Add president +</a href="">
        </div>

        <!-- <form action="" method="post">
          <input type="text" name="" pl="">
        </form> -->
        
        <!-- /.card-header -->
        <div class="card-body">
          <table id="dataTable" class="table table-bordered table-striped">
            <thead>
            <tr class="text-center">
                <th scope="col">ลำดับ</th>
                <th scope="col">รหัสหมู่บ้าน</th>
                <th scope="col">คำนำหน้า</th>
                <th scope="col">ชื่อ</th>
                <th scope="col">สกุล</th>
                <th scope="col">เลขบัตรประชาชน</th>
                <th scope="col">username</th>
                <th scope="col">แก้ไข</th> 
                <th scope="col">ลบ</th> 
              </tr>
            </thead>
            <tbody>
            <?php 
            $num = 0;
            while ($row = $result->fetch_assoc()) {
              $num++;
              
              // equioment Table
              // $equipment = "SELECT SUM(number) AS sum FROM equipment WHERE material_id='".$row['material_id']."'";
              // $eQuery = mysqli_query($conn, $equipment);
              // $resultEquipment = mysqli_fetch_array($eQuery);
              
              //คำนวณค่าคงเหลือของวัสดุ
              // $sumdata = $row['number'] - $resultEquipment['sum'];

              ?>
              <tr>
                <td><?php echo $num; ?></td>
                <td><?php echo $row['id_village']; ?></td>
                <td><?php echo $row['prefix']; ?></td>
                <td><?php echo $row['fname']; ?></td>
                <td><?php echo $row['lname']; ?></td>
                <td><?php echo $row['id_card']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td>
                  <a href="form-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning text-white">
                    <i class="fas fa-edit"></i> edit
                  </a> 
                </td>
                <td>
                  <?php if($row['id'] != 0){ ?>
                  <a href="#" onclick="deleteItem(<?php echo $row['id']; ?>);" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash-alt"></i> Delete
                  </a>
                  <?php } ?>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

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

  function deleteItem (id) { 
    if( confirm('Are you sure, you want to delete this item?') == true){
      window.location=`delete.php?id=${id}`;
      // window.location='delete.php?id='+id;
    }
  };

</script>

</body>
</html>
