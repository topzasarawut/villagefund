<?php include_once('../authen.php') ?> 
<?php
if (isset($_POST['submit'])) {
    $sql_check_idcard = "SELECT * FROM `member` WHERE `id_card` = '" . $_POST['id_card'] . "' ";
    $check_idcard = $conn->query($sql_check_idcard);
    if (!$check_idcard->num_rows) {
        // $hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO `member`(`id_village`, `role`, `prefix`, `first_name`, `last_name`, `id_card`, `birthday`, `age`, `email`, `telephone`, `id_line`)  
                    VALUES ('" . $_POST['id_village'] . "', 
                            '" . $_POST['role'] . "',
                            '" . $_POST['prefix'] . "', 
                            '" . $_POST['first_name'] . "', 
                            '" . $_POST['last_name'] . "', 
                            '" . $_POST['id_card'] . "', 
                            '" . $_POST['birthday'] . "', 
                            '" . $_POST['age'] . "',  
                            '" . $_POST['email'] . "',
                            '" . $_POST['telephone'] . "',
                            '" . $_POST['id_line'] . "');"; 
         $result = $conn->query($sql);
         if ($result) {
             echo '<script> alert("Finished Creating!")</script>';
             header('Refresh:0; url=index.php');
         } else {
             echo '<script> alert("Creating Error!")</script>';
             header('Refresh:0; url=index.php');
         }
     } else {
         echo '<script> alert("idcard is already exists!")</script>';
         header('Refresh:0; url=form-create.php');
     }
 } else {
     header('Refresh:0; url=index.php');
 }
 
 ?>


<?php
// include_once('../authen.php');
// include('../../php/connect.php');

// $sql = date('d-m-Y');
// echo $date;

// $sql = "INSERT INTO `member`(`id_village`, `prefix`, `first_name`, `last_name`, `id_card`, `phone`, `id_line`)  
//                     VALUES ('" . $_POST['id_village'] . "', 
//                             '" . $_POST['prefix'] . "', 
//                             '" . $_POST['first_name'] . "', 
//                             '" . $_POST['last_name'] . "', 
//                             '" . $_POST['id_card'] . "', 
//                             '" . $_POST['phone'] . "', 
//                             '" . $_POST['id_line'] . "');";
// $query = mysqli_query($conn,$sql);
// if($query){
//     echo "<meta http-equiv='refresh' content='0;url=index.php?check=complete' />";
// }
// else{
//     echo "<meta http-equiv='refresh' content='0;url=index.php?check=error' />";
// }
?>