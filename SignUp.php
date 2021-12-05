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
  $usernameErr = $prenumeErr = $verifErr = $existErr = $emailErr =  "";
  $passw = $passwErr = "";
  $name = $nameErr = "";
  $email = $username = $prenume = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['name'])) {
      $nameErr = "Last name is mandatory";
    } else {
      $name = test_input($_POST['name']);
      if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameErr = "Only letters and spaces allowed";
      }
    }

    if (empty($_POST['prenume'])) {
      $prenumeErr = " First name is mandatory";
    } else {
      $prenume = test_input($_POST['prenume']);
      if (!preg_match("/^[a-zA-Z ]*$/", $prenume)) {
        $prenumeErr = "Only letters and spaces allowed";
      }
    }

    if (empty($_POST['username'])) {
      $usernameErr = "You must set an username";
    } else {
      $username = test_input($_POST['username']);
      if (!preg_match("/^[a-zA-Z 1-9]*$/", $username)) {
        $usernameErr = "Only letters,numbers and spaces allowed";
      }
    }

    if (empty($_POST['passw'])) {
      $passwErr = "Password is mandatory";
    } else {
      $passw = test_input($_POST['passw']);
      if (strlen($passw) < 4) {
        $passwErr = "The password must have at least 4 characters ";
      } elseif (!preg_match("/^[a-zA-Z1-9]*$/", $passw)) {
        $passwErr = "Only letters and numbers are allowed";
      }
    }
    if (empty($_POST['email'])) {
      $emailErr = "E-mail is mandatory";
    } else {
      $email = test_input($_POST['email']);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Format email Invalid";
      }
    }
  }
  if (!(empty($name) ||  empty($prenume) || empty($username) || empty($passw) || empty($email)) && (empty($nameErr) && empty($emailErr) && empty($passwErr) && empty($prenumeErr) && empty($usernameErr))) {
    $verifErr = "OK";
  }

  if ($verifErr == "OK") { 
    $conn = conectare_mysql();
    $name = curata($name);
    $email = curata($email);
    $passw = curata($passw);
    $prenume = curata($prenume);
    $username = curata($username);
    $sql = "SELECT * FROM `utilizatori` where `nume_utilizator`='$username' and `email`='$email' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
      $passw_md5 = md5($passw);

      $sql_insert = "INSERT INTO `utilizatori`(`nume`, `prenume`, `parola`, `nume_utilizator`, `email`,`tip`) VALUES ('$name','$prenume','$passw_md5','$username','$email',0)";
      $insert = mysqli_query($conn, $sql_insert);
    }
    if (mysqli_num_rows($result) >= 1) {
      $existErr = "The current user already exists";
    }
  }
  ?>

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
    <div id="right-column">
      <h2 style="color:white;">Sign up</h2>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div id=account-info>
          <label>Username: </label><input type="text" name="username" value="">
          <span class="error">* <?php echo $usernameErr ?></span> <label> : Only letters and numbers allowed</label>
          <br>
          <label>E-mail Adress:</label> <input type="text" name="email" value="">
          <span class="error">* <?php echo $emailErr ?></span> <label> : Must Enter a valid E-mail</label>
          <br>
          <label>Password:</label> <input type="password" size="10" name="passw" value="">
          <span class="error">* <?php echo $passwErr ?></span> <label> : Password must be only letters and numbers - between 4-10 characters></label>
          <br>
        </div>
        <div id=personal-info>
          <h2 style="color:white"> Personal Info</h2>
          <label>Last name:</label> <input type="text" size="10" name="name" value=" ">
          <span class="error">* <?php echo $nameErr ?></span> <label> : Only letters and spaces allowed</label>
          <br>

          <label> First name</label> <input type="text" size="10" name="prenume" value=" ">
          <span class="error">* <?php echo $prenumeErr ?></span> <label> : Only letters and spaces allowed</label>
          <br>
        </div>
        <input id="input" type="submit" name="submit" value="Send">
      </form>
    </div>
  </div>
  <div id=final>
    <?php
    if ($existErr != "") {
      echo '<h3 class="error">' . $existErr . "</h3>";}
      if (empty($nameErr) && empty($emailErr) && empty($existErr) && empty($usernameErr) && empty($prenumeErr)) {
        echo '<h3>If you already have an account <a href="Login.php"> login here. </a></h3>';
      }
    
    ?>
  </div>




  <div id=footer>
    <p>Copyright &copy; All rights reserved 2021</p>

  </div>



</body>