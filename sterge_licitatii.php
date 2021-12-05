<?php

        include "connect.php";

        $conn = conectare_mysql1();
        $id = $_GET['id'];
        $sql = "DELETE FROM `licitatie` WHERE licitatie.id_licitatie = '$id'";
        $result = mysqli_query($conn,$sql);

        $sql = "DELETE FROM `cai` WHERE cai.id_cal = '$id'";
        $result = mysqli_query($conn,$sql);

        $sql = "DELETE FROM `vanzator` WHERE vanzator.id_vanzator = '$id'";
        $result = mysqli_query($conn,$sql);

        header("Location:AuctionsDelete.php");



?>