<!DOCTYPE html>

<html lang=en>

<head>
    <meta charset="utf-8">
    <link rel="icon" href="horse.ico">
    <link rel="stylesheet" href="tempstyle4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Online Auctions </title>
</head>

<body>
   
    <?php
    include 'functii_conexiune.php';
    $conn = conectare_mysql();


    $id = $_SESSION['id_util'];
    $sql = "SELECT * FROM `utilizatori` WHERE `id_utilizator`=$id";
    $rez = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rez);
    $util = $row['nume_utilizator'];
    $id_util = $row['id_utilizator'];
    $foundErr = "";
    

    $sql = "SELECT * FROM `licitatie` ";   
    $result = $conn->query($sql);
    $nr_licitatii = $result->num_rows;
    if ($nr_licitatii == 0)
        $foundErr = "There're no active auctions to display right now ";
    ?>

    <div id=wrapper>

        <div id=header>
            <h1>International Online Horse Auctions</h1>
        </div>
        <div id=mymenu>
            <?php include "menul.php"; ?>
        </div>
    </div>
    <div id=container>
        <div id=right-column>
            <p> </p>
        </div>
        <div id=left-column>

        </div>
        <?php if ($foundErr)
            echo "<h3 class=\"error\">". $foundErr ;
        ?>
    </div>


    <div id=footer>
        <p>Copyright &copy; All rights reserved 2021</p>

    </div>



</body>