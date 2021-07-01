<?php include_once('../authen.php') ?>
<?php
    // if(isset($_POST['submit'])){
    //     $sql = "UPDATE `president` 
    //             SET `id_village` = '".$_POST['id_village']."', 
    //             `prefix` = '".$_POST['prefix']."',
    //             `fname` = '".$_POST['fname']."',
    //             `lname` = '".$_POST['lname']."',
    //             `id_card` = '".$_POST['id_card']."',
    //             `username` = '".$_POST['username']."',
    //             `password` = '".$_POST['password']."'
    //             WHERE `id` = '".$_POST['id']."';";

    if(isset($_POST['submit'])){
        $sql = "UPDATE `president` 
                SET `prefix` = '".$_POST['prefix']."',
                `fname` = '".$_POST['fname']."',
                `lname` = '".$_POST['lname']."',
                `id_card` = '".$_POST['id_card']."',
                `username` = '".$_POST['username']."'
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