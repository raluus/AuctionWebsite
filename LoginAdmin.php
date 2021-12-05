<!DOCTYPE html>

<html lang=en>

<head>
    <meta charset="utf-8">
    <link rel="icon" href="horse.ico">
    <link rel="stylesheet" href="tempstyle2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Online Auctions </title>
</head>

<body>
  
    <?php
    include 'functii_conexiune.php';
  
    $nameErr = $emailErr = $verifErr = $foundErr = "";
    $name = $email = "";
    $passw = $passwErr = "";

    include 'verificare_login.php';
    $verifErr = verif_login_admin($nameErr, $name, $passwErr, $passw); 
    if ($verifErr == "OK") {

       

        $conn = conectare_mysql();
       
        $name = curata($name);
        $passw = curata($passw);



        $sql = "SELECT * FROM `utilizatori` where `nume_utilizator`='$name' and `parola`='$passw' and `tip`=1";
        $rez = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($rez);
        if (mysqli_num_rows($rez) == 0)
            $foundErr = "Admin not found!";
        if (mysqli_num_rows($rez) == 1) {
            session_start();
            $_SESSION['logat'] = 'yessir';
            $_SESSION['tip'] = $row['tip'];
            $_SESSION['id_util'] = $row['id_utilizator'];
            $_SESSION['username'] = $row['nume_utilizator'];
            session_write_close();
            $foundErr = "Okay!";
            header('Location: AuctionsAdd.php?utilizator=Administrator');
        }
    }
    ?>
    <div id=wrapper>

        <div id=header>



            <h1>International Online Horse Auctions</h1>



        </div>
        <div id=mymenu>
            <?php include "menu.php"; ?>
        </div>
    </div>
    <div id=container>
        <div id=right-column>
            <h2 style="color:white">Admin Login</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label>Username:</label> <input type="text" name="name" value="<?php echo $name; ?>">
                <span class="error">* <?php echo $nameErr; ?></span>
                <br>
                <label> Parola:</label> <input type="password" size="10" name="passw" value="">
                <span class="error">* <?php echo $passwErr ?></span>
                <br> <input id="input" type="submit" name="submit" value="Send">
            </form>
            <?php
            if ($foundErr != "") {
                echo '<h3 class="error">' . $foundErr . "</h3>";
            }
            ?>
        </div>
    </div>
    <div id=footer>
        <p>Copyright &copy; All rights reserved 2021</p>
    </div>
</body>