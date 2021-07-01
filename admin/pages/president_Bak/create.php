<?php
include('../../php/connect.php');

$date = date('d-m-Y');
echo $date;

$data = "INSERT INTO president (id_village, prefix, fname, lname, id_card, username, password)
VALUES ('".$_POST['id_village']."', 
        '".$_POST['prefix']."',
        '".$_POST['fname']."',
        '".$_POST['lname']."',
        '".$_POST['id_card']."',
        '".$_POST['username']."',
        '".$_POST['password']."')";
$query = mysqli_query($conn,$data);
if($query){
    echo "<meta http-equiv='refresh' content='0;url=form-create.php?check=complete' />";
}
else{
    echo "<meta http-equiv='refresh' content='0;url=form-create.php?check=error' />";
}
?>

 