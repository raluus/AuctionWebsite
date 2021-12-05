<?php
session_start();
if (isset($_SESSION['logat'])) {
    if ($_SESSION['logat'] == 'yessir' && $_SESSION['tip'] == 0)
        header("Location:utilizator.php");
}
?>


<!DOCTYPE html>

<html lang=en>

<head>
    <meta charset="utf-8">
    <link rel="icon" href="horse.ico">
    <link rel="stylesheet" href="tempstyleAuction.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Online Auctions </title>
</head>

<body>

    <div id=wrapper>

        <div id=header>



            <h1>International Online Horse Auctions</h1>



        </div>
        <div id=mymenu>
            <?php include "menu.php";
            ?>
        </div>
    </div>
    <div id=container>
        <div id=auctions>
            <h2> Active Auctions: </h2>
            <?php


            include 'functii_conexiune.php';
            $conn = conectare_mysql();
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT licitatie.id_licitatie,licitatie.pret_curent,cai.poza,cai.tip,cai.name,cai.varsta,cai.rasa,vanzator.nume,vanzator.prenume,vanzator.oras,vanzator.tara FROM ((`licitatie` INNER JOIN `cai` ON cai.id_cal=licitatie.id_licitatie) INNER JOIN `vanzator` ON vanzator.id_vanzator=licitatie.id_licitatie)";
            $result = mysqli_query($conn, $sql);
            $nr_licitatii = $result->num_rows;
            if ($nr_licitatii > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id_licitatie'];
                    echo  "<div class=\"collection\">
                        <div class=left-column>
                        <a target=\"_blank\" href=\"Imagini/" . $row['poza'] . "\">
                        <img src=\"Imagini/" . $row['poza'] . "\" alt=\"Our Beauty 1\">
                         </a>
                         </div>
                    <div class=\"desc\">

                     <br><label>Horse name: </label><label style=\"font-weight:bold;color:red;\">" . $row["name"] . "</label> <br>" . "<label>Current Price:</label><label style=\"font-weight:bold;color:red;\"> $" . number_format($row['pret_curent']) . "</label> <br>" . "<label>Horse age: </label> <label  style=\"font-weight:bold;color:red;\">" . $row["varsta"] . " year(s) old </label> <label> " . "Breed: </label> <label  style=\"font-weight:bold;color:red;\">" . $row["rasa"] . "</label>";
                    echo "<br>";
                    if ($row['tip'] == 1)
                        echo "<label>Horse type:</label> <label style=\"font-weight:bold;color:red;\"> Pony</label>";
                    else if ($row['tip'] == 2)
                        echo "<label>Horse type:</label> <label style=\"font-weight:bold;color:red;\"> Purebred</label>";
                    echo "<br>";

                    echo " <br> <label> Seller's personal info:" . $row["nume"] . " " . $row["prenume"] . " " . $row["oras"] . " " . $row["tara"] . "</label>

                     <div class=sth2>
                    
                    
                     <form method=\"get\" action=no_login.php>
                     <label>Place your bid: </label><br><input type=\"text\" name=\"pret_curent\" value=";
                    echo $row['pret_curent'];
                    echo ">
         
                     
                    
                     <input class=\"input\" type=\"submit\" value=\"Send!\">
                 </form>
                    </div>


                    </div>
                </div>";
                }
            } else {
                echo "<p>0 auctions (Nothing to show)</p>";
            }
            ?>

        </div>
    </div>
</body>