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
    $verifErr = verif_login($nameErr, $name, $emailErr, $email, $passwErr, $passw); // verificare date intrare
    if ($verifErr == "OK") { // verificare existenta in baza de date
        $conn = conectare_mysql();
        $name = curata($name);
        $email = curata($email);
        $passw = curata($passw);
        $passw_md5 = md5($passw);
        $sql = "SELECT * FROM `utilizatori` where `nume_utilizator`='$name' and `email`='$email' and `parola`='$passw_md5' and `tip`=0";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0)
            $foundErr = "User not found,wrong e-mail or password";
        if (mysqli_num_rows($result) == 1) {
            $foundErr = "Am gasit";
            $row = mysqli_fetch_assoc($result);
            $id_util = $row['id_utilizator'];
            session_start();
            $_SESSION['logat'] = 'yessir';
            $_SESSION['id_util']=$row['id_utilizator'];
            $_SESSION['username']=$row['nume_utilizator'];
            $_SESSION['tip'] = $row['tip'];
            session_write_close();
                header('Location: utilizator.php?utilizator=' . $name . '&id_utilizator=' . $id_util);
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
            <h2 style="text-align:center; color:white;">Login</h2>
            <h3 style="text-align:center;color:white;">If you don't have an account <a style="text-decoration: none; color:blue;" href="SignUp.php">sign up here</a></h3><br>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label>Username:</label> <input type="text" name="name" value="<?php echo $name; ?>">
                <span class="error">* <?php echo $nameErr; ?></span>
                <br>
                <label>Email:</label> <input type="text" name="email" value="<?php echo $email; ?>">
                <span class="error">* <?php echo $emailErr; ?></span>
                <br>
                <label>Password</label> <input type="password" size="10" name="passw" value="">
                <span class="error">* <?php echo $passwErr ?></span>
                <br> <input id="input" type="submit" name="submit" value="Send">
            </form>
            <p style="text-align:center;color:white;margin-top:10px;"> or </p>
            <div id=final style="margin-top:25px">
                <p> Login as <a href="LoginAdmin.php">admin</a></p>
            </div>
            <?php echo "<p style=\"text-align:center;color:white;margin-top:25px;\">".$foundErr."</p>"?>

        </div>


    </div>


    <div id=footer>
        <p>Copyright &copy; All rights reserved 2021</p>

    </div>



</body>