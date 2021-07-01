<?php include_once('../authen.php') ?>
<?php
    if(isset($_POST['submit'])){
        $sql = "UPDATE `member` 
                SET 
                `role` = '".$_POST['role']."',
                `prefix` = '".$_POST['prefix']."', 
                `first_name` = '".$_POST['first_name']."', 
                `last_name` = '".$_POST['last_name']."', 
                `id_card` = '".$_POST['id_card']."', 
                `telephone` = '".$_POST['telephone']."', 
                `id_line` = '".$_POST['id_line']."'
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

<!-- if(isset($_POST['submit'])){
        $sql = "UPDATE `member` 
                SET `id_village` = '".$_POST['id_village']."', 
                `role` = '".$_POST['role']."',
                `prefix` = '".$_POST['prefix']."', 
                `first_name` = '".$_POST['first_name']."', 
                `last_name` = '".$_POST['last_name']."', 
                `id_card` = '".$_POST['id_card']."', 
                `telephone` = '".$_POST['telephone']."', 
                `id_line` = '".$_POST['id_line']."'
                WHERE `id` = '".$_POST['id']."';"; -->

<!-- $sql = "INSERT INTO `member`(`id_village`, `role`, `prefix`, `first_name`, `last_name`, `id_card`, `telephone`, `id_line`)  
                    VALUES ('" . $_POST['id_village'] . "', 
                            '" . $_POST['prefix'] . "',
                            '" . $_POST['role'] . "', 
                            '" . $_POST['first_name'] . "', 
                            '" . $_POST['last_name'] . "', 
                            '" . $_POST['id_card'] . "', 
                            '" . $_POST['telephone'] . "', 
                            '" . $_POST['id_line'] . "');";  -->