<?php

include "connect.php";
$conn = conectare_mysql1();
$pretErr = $timeErr = "";
$a = $_POST['pret_curent'];
$b = $_POST['pret'];
$id = $_POST['id'];
$c = $_POST['timp'];
session_start();
$id_util = $_SESSION['id_util'];
session_write_close();

if ($c != 1) {

    if ($a > $b) {

        $sql = "UPDATE `licitatie` SET licitatie.pret_curent='$a' WHERE licitatie.id_licitatie = '$id'";

        $rez = mysqli_query($conn, $sql);

        $sql = "UPDATE `licitatie` SET licitatie.id_util='$id_util' WHERE licitatie.id_licitatie = '$id'";

        $rez = mysqli_query($conn, $sql);

    } else {
        $pretErr = "You were instantly outbid! Try bidding higher!";
    }
} else {
    $timeErr = "This auction is not active!!! Try later!";
}

header("Location:PoniesAuctions.php?pretErr=$pretErr&timeErr=$timeErr&id_p=$id"); 
?>
