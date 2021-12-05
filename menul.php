           <?php 
                include "connect.php";
                $conn = conectare_mysql1();
                session_start();
                $id=$_SESSION['id_util'];
                $sql = "SELECT * FROM `utilizatori` WHERE `id_utilizator`=$id";
                $rez = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($rez);
           
           
           echo "<a href=\"#\"><i class=\"fa fa-fw fa-user\"></i>Welcome <span class=\"error\"> ". $row['nume_utilizator']." </span></a>
           <a href=\"Homel.php\"><i class=\"fa fa-fw fa-home\"></i>Home</a>
           <a href=\"utilizator.php\"><i class=\"fa fa-fw fa-search\"></i>Active Auctions</a>
           <a href=\"Aboutl.php\"><i class=\"fa fa-fw fa-envelope\"></i>Contact</a> 
           <a href=\"Logout.php\"><i class=\"fa fa-fw fa-home\"></i>Logout</a>";
           ?>