<?php 
                include "connect.php";
                $conn = conectare_mysql1();
                session_start();
                $id=$_SESSION['id_util'];
                $sql = "SELECT * FROM `utilizatori` WHERE `id_utilizator`=$id";
                $rez = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($rez);
           
           
           echo "<a href=\"#\"><i class=\"fa fa-fw fa-user\"></i>Welcome <span class=\"error\"> ". $row['nume_utilizator']." </span></a>
           <a href=\"AuctionsAdd.php\"><i class=\"fa fa-fw fa-search\"></i>Add Auction</a>
           <a href=\"AuctionsDelete.php\"><i class=\"fa fa-fw fa-search\"></i>Delete Auction</a>
           <a href=\"AuctionsUpdate.php\"><i class=\"fa fa-fw fa-search\"></i>Update Auction</a> 
           <a href=\"Logout.php\"><i class=\"fa fa-fw fa-home\"></i>Logout</a>";
           ?>