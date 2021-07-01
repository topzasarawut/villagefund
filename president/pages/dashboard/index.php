<?php  
include_once('../authen.php');
// include('../../../php/connect.php');
// $sql = "SELECT * FROM `member` WHERE id_village = '".$_SESSION['id_village']."'";
// $result = $conn->query($sql); 

//echo $_SESSION['id_village']."pp";

include_once('../../php/connect.php');
        $sql = "SELECT * FROM `president`";
        $result = $conn->query($sql);

        // นับจำนวน สมาชิก
        $sql = "SELECT COUNT(*) AS topza FROM `member` WHERE id_village = '".$_SESSION['id_village']."'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $countmember= $row["topza"];

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
            <!-- <h1>กรอกข้อมูลสมาชิกกองทุนฯ</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="../dashboard">หน้าแรก</a></li> -->
              <!-- <li class="breadcrumb-item active">กรอกข้อมูลสมาชิกกองทุนฯ</li> -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-6 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $countmember; ?></h3>
                <p>สมาชิก กองทุนหมู่บ้าน</p>

               <!-- ดึง รหัสกองทุน ชื่อกองทุนหมู่บ้านและชุมชนเมือง มาแสดง--> 
                <div class="form-group">
                    <label for="id_village">ชื่อกองทุนหมู่บ้านและชุมชนเมือง</label>
                    <?php echo $_SESSION['name_village']; ?><br>
                    <label for="id_village">รหัสกองทุน</label>
                    <?php echo $_SESSION['id_village']; ?>  
                    <input type="hidden"  class="form-control" name="id_village" id="id_village" placeholder="<?php echo $_SESSION['id_village']."-".$_SESSION['name_village']; ?>" value = "<?php echo $_SESSION['id_village']; ?>" required>
                </div>

              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">ข้อมูลเพิ่มเติม <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-6 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>0</h3>
                <p>จำนวนที่ตอบแบบสอบถาม</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">ข้อมูลเพิ่มเติม <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
    <?php 
    $sql = "SELECT * FROM `member` WHERE id_village = '".$_SESSION['id_village']."' ORDER BY role ";
    $result = $conn->query($sql); 
    
    ?>

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title d-inline-block">รายชื่อสมาชิก</h3>
          <a href="form-create.php" class="btn btn-primary float-right ">เพิ่ม สมาชิก +</a href="">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="dataTable" class="table table-bordered table-striped">
            <thead>
            <tr>
              <!-- <th>No.</th> -->
              <!-- <th>รหัสกองทุนฯ</th> -->
              <th>ตำแหน่ง</th>
              <th>คำนำหน้า</th>
              <th>ชื่อ</th>
              <th>สกุล</th>
              <th>เลขบัตรประชาชน</th>
              <th>โทรศัพท์</th>
              <th>ไอดีไลน์</th>
              <th>วันเกิด</th>
              <th>อายุ</th>
              <th>อีเมล</th>
              <th>แก้ไข</th>
              <th>ลบ</th>
            </tr>
            </thead>
            <tbody>
            <!-- <?php 
            $num = 0;
            while ($row = $result->fetch_assoc()) {
              $num++;
              ?> -->
              <tr>
                <!-- <td><?php echo $num; ?></td> -->
                <!-- <td><?php echo $row['id_village']; ?></td> -->
                <td><?php echo $row['role']; ?></td>
                <td><?php echo $row['prefix']; ?></td>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['id_card']; ?></td>
                <td><?php echo $row['telephone']; ?></td>
                <td><?php echo $row['id_line']; ?></td>
                <td><?php echo $row['birthday']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                  <a href="form-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning text-white">
                    <i class="fas fa-edit"></i> แก้ไข
                  </a> 
                </td>
                <td>
                  <?php if($row['id'] != 0){ ?>
                  <a href="#" onclick="deleteItem(<?php echo $row['id']; ?>);" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash-alt"></i> ลบ
                  </a>
                  <?php } ?>
                </td>
              </tr>
            <!-- <?php } ?> -->
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
      //window.location='delete.php?id='+id;
    }
  };

</script>

</body>
</html>
