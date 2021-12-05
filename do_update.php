<?php 

        include "connect.php";
        $conn = conectare_mysql1();
        $a = $_POST['timp_alocat'];
        $id = $_POST['id'];

        $sql = "UPDATE `licitatie` SET licitatie.timp_alocat='$a' WHERE licitatie.id_licitatie = '$id'";

        $rez = mysqli_query($conn,$sql);
         
        header("Location:AuctionsUpdate.php");
?>