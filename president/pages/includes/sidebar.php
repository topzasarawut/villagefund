<?php 
$uri = $_SERVER['REQUEST_URI']; 
$array = explode('/', $uri);
$key = array_search("pages", $array);
$name = $array[$key + 1];
?>
<nav class="main-header navbar navbar-expand border-bottom navbar-dark bg-info">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <!-- Last login: <?php echo date_format(new DateTime($_SESSION['last_login']), "j F Y H:i:s") ?> -->
          <i class="fa fa-th-large"></i>
        </a>
      </li>
    </ul>
</nav>
  <!-- /.navbar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light text-center d-block">ประธานกองทุนหมู่บ้าน</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?></a> 
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="../dashboard" class="nav-link <?php echo $name == 'dashboard' ? 'active': '' ?>">
              <i class="fas fa-tachometer-alt nav-icon"></i>
              <p>กรอกข้อมูลกองทุนฯ</p>
            </a>
          </li>
          <!-- <?php if($_SESSION['status'] == 'superadmin') { ?> -->
          <li class="nav-item">
            <a href="../admin" class="nav-link <?php echo $name == 'admin' ? 'active': '' ?>">
              <i class="fas fa-users-cog nav-icon"></i>
              <p>Admin Management</p>
            </a>
          </li>
          <!-- <?php } ?> -->
          <!-- <li class="nav-item">
            <a href="../material" class="nav-link <?php echo $name == 'material' ? 'active': '' ?>">
              <i class="fas fa-chalkboard-teacher nav-icon"></i>
              <p>Materials</p>
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <a href="../member" class="nav-link <?php echo $name == 'member' ? 'active': '' ?>">
              <i class="fas fa-tachometer-alt nav-icon"></i>
              <p>กรอกข้อมูลกองทุนฯ</p>
            </a>
          </li> -->
          <!-- <li class="nav-header">Account Settings</li> -->
          <li class="nav-header">การตั้งค่าบัญชี</li>
          <li class="nav-item">
            <a href="../../logout.php" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
              <!-- <p>Logout</p> -->
              <p>ลงชื่อออกจากระบบ</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>