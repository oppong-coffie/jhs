<?php
    //deleting admin records
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($connection,"DELETE FROM `admin` WHERE `id` = $id" );
    if ($delete) {
        header('location:./admin_reg.php');
    }
}
?>