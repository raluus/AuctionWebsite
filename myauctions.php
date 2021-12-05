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
    
    <?php
   
    session_start();
    $id_util = $_SESSION['id_util'];
    session_write_close();
    $foundErr = "";
    include 'functii_conexiune.php';
    $conn = conectare_mysql();
    $sql = "SELECT * FROM `licitatie` WHERE licitatie.id_util = $id_util ";
    $result = $conn->query($sql);
    $nr_licitatii = $result->num_rows;
    if ($nr_licitatii == 0)
        $foundErr = "No auctions to display! Try bidding first! ";

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
        <div id=auctions>
            <h2> My Auctions: </h2>
            <?php

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT licitatie.id_licitatie,licitatie.id_util,licitatie.timp_alocat,licitatie.data_inceperii,licitatie.pret_curent,cai.poza,cai.tip,cai.name,cai.varsta,cai.rasa,vanzator.nume,vanzator.prenume,vanzator.oras,vanzator.tara FROM ((`licitatie` INNER JOIN `cai` ON cai.id_cal=licitatie.id_licitatie) INNER JOIN `vanzator` ON vanzator.id_vanzator=licitatie.id_licitatie)";
            $result = mysqli_query($conn, $sql);
            $nr_licitatii = $result->num_rows;
            if ($nr_licitatii > 0) {
                while ($row = $result->fetch_assoc()) {

                    if ($row['id_util'] == $id_util) {
                        $id = $row["id_licitatie"];
                        $pret = $row["pret_curent"];
                        $startdate = $row['data_inceperii'];
                        $enddate = $row['timp_alocat'];
                        $today = "";
                        $timeErr = 0;
                        echo  "<div class=\"collection\">
                        <div class=left-column>
                        <a target=\"_blank\" href=\"Imagini/" . $row['poza'] . "\">
                        <img src=\"Imagini/" . $row['poza'] . "\" alt=\"Our Beauty 1\">
                         </a>
                         </div>
                    <div class=\"desc\">

                     <br><label>Horse name: </label><label style=\"font-weight:bold;color:red;\">" . $row["name"] . "</label> <br>" . "<label>Current Price:</label><label style=\"font-weight:bold;color:red;\"> $" . number_format($row['pret_curent']) . "</label> <br>" . "<label>Horse age: </label> <label  style=\"font-weight:bold;color:red;\">" . $row["varsta"] . " year(s) old </label> <label> " . "Breed: </label> <label  style=\"font-weight:bold;color:red;\">" . $row["rasa"] . "</label>";
                        echo "<br>";
                        echo "<label>Horse type:</label> <label style=\"font-weight:bold;color:red;\"> Purebred</label>";
                        echo "<br>";
                        echo "<label>Start date: </label> <label style=\"font-weight:bold;color:red;\">" . $row['data_inceperii'] . "</label> <label>End date: </label> <label style=\"font-weight:bold;color:red;\">" . $row['timp_alocat'] . "</label><br>";

                        echo " <br> <label> Seller's personal info:" . $row["nume"] . " " . $row["prenume"] . " " . $row["oras"] . " " . $row["tara"] . "</label>

                     <div class=sth2>";

                        $today = time();
                        $startdate = strtotime($startdate);
                        if ($today < $startdate) {

                            echo "<label style=\"font-weight:bold;color:red;\">Inactive Auction,starts later.</label>";
                            $timeErr = 1;
                        }
                        $enddate = strtotime($enddate);
                        if ($today > $enddate) {

                            echo "<label style=\"font-weight:bold;color:red;\">Auction Ended.</label>";
                            $timeErr = 1;
                        }
                  ?>
            <?php
                        if ($today < $startdate) {

                            echo "<label style=\"font-weight:bold;color:red;padding-left:200px;\">CAN'T BID.</label>";
                            $timeErr = 1;
                        }
                        if ($today > $enddate) {

                            echo "<label style=\"font-weight:bold;color:red;padding-left:100px;\">Auction Ended,can't bid anymore :(.</label>";
                            $timeErr = 1;
                        }

                        echo " </div>
                

                    </div>
                </div>";
                    }
                }
            } else {

                echo '<h3 class="error">' . $foundErr . "</h3>";
            }

            ?>

        </div>
        <div id="go-back">
             <a href="utilizator.php">Go back!</a>
        </div>
    </div>
</body>