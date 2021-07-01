<?php include_once('../authen.php') ?>
<?php
    if(isset($_POST['submit'])){
        $sql = "UPDATE `village` 
                SET `id_village` = '".$_POST['id_village']."',
                `name_village` = '".$_POST['name_village']."',
                `sub_district` = '".$_POST['sub_district']."', 
                `district` = '".$_POST['district']."'
                WHERE `id` = '".$_POST['id']."';";

        $result = $conn->query($sql);
        if($result){
            echo '<script> alert("Finished Updating!")</script>'; 
            header('Refresh:0; url=index.php');
        } else {
            echo '<script> alert("Update Error!")</script>'; 
            header('Refresh:0; url=index.php');
        }

    } else {
        header('Refresh:0; url=index.php');
    }

?>
<!-- 
$sql = "INSERT INTO `village`(`id_village`, `name_village`, `sub_district`, `district`)  
                    VALUES ('" . $_POST['id_village'] . "', 
                            '" . $_POST['name_village'] . "',
                            '" . $_POST['sub_district'] . "', 
                            '" . $_POST['district'] . "');";  -->