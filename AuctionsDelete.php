<!DOCTYPE html>

<html lang=en>

<head>
    <meta charset="utf-8">
    <link rel="icon" href="horse.ico">
    <link rel="stylesheet" href="tempstyle7_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Online Auctions </title>
</head>

<body>

    <div id=wrapper>

        <div id=header>



            <h1>International Online Horse Auctions</h1>



        </div>
        <div id=mymenu>
            <?php include "menuadmin.php"; ?>
        </div>
    </div>
    <div id=container>
        <div id=main-column>
            <div id=sth>
                <h2 style="color:white;text-align:center;margin-bottom:10px;">Delete auction: </h2>


                <?php
                include 'functii_conexiune.php';
                $conn = conectare_mysql();
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT licitatie.id_licitatie,licitatie.pret_curent,cai.tip,cai.name,cai.varsta,cai.rasa,vanzator.nume,vanzator.prenume,vanzator.oras,vanzator.tara FROM ((`licitatie` INNER JOIN `cai` ON cai.id_cal=licitatie.id_licitatie) INNER JOIN `vanzator` ON vanzator.id_vanzator=licitatie.id_licitatie)";
                $result = mysqli_query($conn, $sql);
                $nr_licitatii = $result->num_rows;
                if ($nr_licitatii > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<br><label> Auction ID: " . $row["id_licitatie"] ." ". " - Current Price: " . $row["pret_curent"] ."<br>". "Type:" . $row["tip"] ." ; ". "Horse name:" . $row["name"] ." ; "."Horse age:" . $row["varsta"] ." ; "."Breed:" . $row["rasa"]."</label>";
                        echo "<br> <label> Seller's personal info:" . $row["nume"] ." ". $row["prenume"] ." " . $row["oras"] ." " . $row["tara"] ."</label>";
                        echo "<div id=sth2>";
                        
                        
                        echo "<br> <a href=sterge_licitatii.php?id=".$row['id_licitatie'].">Delete</a>";
                        echo "</div>";
                              
                    }
                } else {
                    echo "0 auctions (Nothing to delete)";
                }
                

                $conn->close();
                ?>
            </div>
            </div>
    </div>
            <div id=footer>
            <p>Copyright &copy; All rights reserved 2021</p>

        </div>
        


        



</body>