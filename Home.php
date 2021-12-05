<?php
session_start();
if (isset($_SESSION['logat'])) {
    if ($_SESSION['logat'] == 'yessir' && $_SESSION['tip'] == 0)
        header("Location:Homel.php");
}
?>

<!DOCTYPE html>

<html lang=en>

<head>
    <meta charset="utf-8">
    <link rel="icon" href="horse.ico">
    <link rel="stylesheet" href="tempstyle.css">
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
    <div id=all>
        <div id=container>
            <div id=left-column>
                <img src="Imagini/HomeHorsie.jpg" alt="Beautiful Horse">
            </div>
            <div id=container2>
                <img src="Imagini/pasune5.jpg" alt="A Beautiful grassland" style="width:100%;">
                <div id=right-column>
                    <h2>About our Auctions </h2>
                    <p>Online Auctions organizes every year multiple horse sales auctions for show jumpers,
                        dressage horses, yearlings, foals, embryos, broodmares, ponies, recreational horses and
                        All Stars. 100% online.</p>
                    <p>Our site is offering everyone a chance to buy a horse
                        at a reasonable price from a rich collection. With this project we wish to connect the
                        sellers with the potential clients in a neutral environment.</p>
                    <p>We want to give breeders the opportunity to promote their horses in a
                        professional manner and to offer them to national and international customers
                        in order to increase the sales market in a fair, healthy and transparent way.</p>
                    <p>This is how the auction works:</p>
                    <ul>
                        <li>First you have to login to be able to bid!</li>
                        <li>Choose your category</li>
                        <li>Bid</li>
                    </ul>
                    <p>Don't forget to <a href="Login.php">login</a> in your account or sign up if you're new!<br>
                        You can sign up <a href="SignUp.php">here</a>!

                    </p>
                </div>
            </div>

        </div>
        <div id=part3>
            <h2>Enjoy our beautiful horses!</h2>

            <div class="collection">
                <a target="_blank" href="Imagini/beauty1.jpg">
                    <img src="Imagini/beauty1.jpg" alt="Our Beauty 1">
                </a>
                <div class="desc">KOKOMO</div>
            </div>

            <div class="collection">
                <a target="_blank" href="Imagini/beauty7.jpg">
                    <img src="Imagini/beauty7.jpg" alt="Our Beauty 2">
                </a>
                <div class="desc">VERSAILLES&QUEEN&MARQUIS</div>
            </div>

            <div class="collection">
                <a target="_blank" href="Imagini/beauty3.jpg">
                    <img src="Imagini/beauty3.jpg" alt="Our Beauty 3">
                </a>
                <div class="desc">NAPOLEON</div>
            </div>

            <div class="collection">
                <a target="_blank" href="Imagini/beauty4.jpg">
                    <img src="Imagini/beauty4.jpg" alt="Our Beauty 4">
                </a>
                <div class="desc">NAPOLEON</div>
            </div>

            <div class="collection">
                <a target="_blank" href="Imagini/beauty6.jpg">
                    <img src="Imagini/beauty6.jpg" alt="Our Beauty 5">
                </a>
                <div class="desc">SPIRIT</div>
            </div>

            <div class="collection">
                <a target="_blank" href="Imagini/beauty21.jpg">
                    <img src="Imagini/beauty21.jpg" alt="Our Beauty 6">
                </a>
                <div class="desc">PIPPI LONGSTOCKING</div>
            </div>

            <div class="collection">
                <a target="_blank" href="Imagini/beauty22.jpg">
                    <img src="Imagini/beauty22.jpg" alt="Our Beauty 7">
                </a>
                <div class="desc">MISTY&DOLLY&OLAF&COOKIE</div>
            </div>

            <div class="collection">
                <a target="_blank" href="Imagini/beauty23.jpg">
                    <img src="Imagini/beauty23.jpg" alt="Our Beauty 8">
                </a>
                <div class="desc">CINNAMON</div>
            </div>

            <div class="collection">
                <a target="_blank" href="Imagini/beauty24.jpg">
                    <img src="Imagini/beauty24.jpg" alt="Our Beauty 9">
                </a>
                <div class="desc">ONYX</div>
            </div>
        </div>
    </div>
    <div id=part4>
        <h4>Contact</h4>
        <p>Telephone number : +40-711-5552-241 <br> Or you can contact us on : onlineauctions@horses.com! </p>
        <div id=footer>
            <p>Copyright &copy; All rights reserved 2021</p>
        </div>
    </div>




</body>