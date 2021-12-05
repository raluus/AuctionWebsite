<!DOCTYPE html>

<html lang=en>

<head>
    <meta charset="utf-8">
    <link rel="icon" href="horse.ico">
    <link rel="stylesheet" href="tempstyle6_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Online Auctions </title>
</head>

<body>

    <div id=wrapper>

        <div id=header>

           

                <h1>International Online Horse Auctions</h1>
          


        </div>
        <div id=mymenu>
            <?php include "menuadmin.php";?>
        </div>
    </div>
    <div id=container>
        <div id=main-column>
            <div id=left-column>
            <h2 style="color:white;text-align:center;margin-bottom:10px;">Update auction: </h2> 
            <?php
                 $conn = conectare_mysql1();
                 $id = $_GET['id'];
                 $sql = "SELECT licitatie.timp_alocat FROM licitatie WHERE licitatie.id_licitatie='$id'"; 
                 $result=mysqli_query($conn,$sql);
                 $rand=mysqli_fetch_array($result);
            ?>
            

            <div id=right-column>
           

            <form method="post" action=do_update.php>
                    <label>Set new End date: </label><br><input type="date" name="timp_alocat" value=<?php echo $rand['timp_alocat'];?>>
        
                    
                    <input id="input" type="hidden" name="id" value=<?php echo $id;?>>
                    <input id="input" type="submit" value="Update">
                </form>

                </div>

        </div>


        </div>


    <div id=footer>
        <p>Copyright &copy; All rights reserved 2021</p>

    </div>



</body>