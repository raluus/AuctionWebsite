<!DOCTYPE html>

<html style ="background: url(Imagini/blurbackhd.jpg) no-repeat center center fixed; background-size: cover;" lang=en>

<head>
    <meta charset="utf-8">
    <link rel="icon" href="horse.ico">
    <link rel="stylesheet" href="tempstyle4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Online Auctions </title>
</head>

<body>
    <?php
   
    if (isset($_GET['utilizator']))
        $util = $_GET['utilizator'];
    if (isset($_GET['id_utilizator']))
        $id_util = $_GET['id_utilizator'];
    $foundErr = "";
    include 'functii_conexiune.php';
    $conn = conectare_mysql();

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
        <div id=part2>
            <h2>Choose category:</h2>
            <div id=big-container>
                <div id=container4>
                    <div id=top-part>
                        <img src="Imagini/ponyresized.jpeg" alt="A cute pony">
                        <div id=bottom-part>
                            <h3>Ponies</h3>
                            <p>With a range of prices starting from $1,000,check our May collection!</p>
                            <a href="PoniesAuctions.php">See here.. >></a>
                        </div>
                    </div>

                </div>
                <div id=container5>
                    <div id=top-part-from5><img src="Imagini/PureBloodCat.jpg" alt="Black Horse"></div>
                    <div id=bottom-part-from5>
                        <h3>Thoroughbred Horses </h3>
                        <p>With a range of prices starting from $70,000,check our May collection!</p>
                        <a href="Purebredauction.php">See here.. >></a>
                    </div>
                </div>
                <div id=container6>
                        <a href="myauctions.php">See my auctions.. >></a>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($foundErr)
            echo '<h3 class="error">' . $foundErr . " so please check <a href=\"Homel.php\">our gallery</a> in the meantime.</h3>"
        ?>
    



</body>
</html>