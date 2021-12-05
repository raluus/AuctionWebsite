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
  <?php
  include 'functii_conexiune.php';
  $HorsenameErr = $sellernameErr = $sellerprenumeErr = $sellerCityErr = $sellerCountryErr =  "";
  $breedErr = $ageErr = $tipErr = $startdateErr = $enddateErr = $priceErr = "";
  $Horsename = $breed = $sellername = $sellerprenume = $sellercity = $sellercountry = $horseage = $horsetip = "";
  $price = $startdate = $enddate = $verifErr = "";
  $poza = $pozaErr = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['poza'])) {
      $pozaErr = "You must add a picture!";
    } else {
      $poza = $_POST['poza'];
    }

    if (empty($_POST['username'])) {
      $HorsenameErr = "You must add a name!";
    } else {
      $Horsename = $_POST['username'];
      if (!preg_match("/^[a-zA-Z ]*$/", $Horsename)) {
        $HorsenameErr = "Only letters and spaces allowed";
      }
    }

    if (empty($_POST['rasa'])) {
      $breedErr = "You must add a breed!";
    } else {
      $breed = $_POST['rasa'];
      if (!preg_match("/^[a-zA-Z ]*$/", $breed)) {
        $breedErr = "Only letters and spaces allowed";
      }
    }

    if (empty($_POST['varsta'])) {
      $ageErr = "You must add the age!";
    } else {
      $horseage = $_POST['varsta'];
      if (!preg_match("/^[1-9]*$/", $horseage)) {
        $ageErr = "Only numbers allowed";
      }
    }

    if (empty($_POST['tip'])) {
      $tipErr = "You must add the type";
    } else {
      $horsetip = $_POST['tip'];
      if (!preg_match("/^[1-9]*$/", $horsetip)) {
        $tipErr = "You can add only 1 or 2";
      }
    }

    if (empty($_POST['data_inceperii'])) {
      $startdateErr = "You must set a start date!";
    } else {
      $startdate = $_POST['data_inceperii'];
    }

    if (empty($_POST['timp_alocat'])) {
      $enddateErr = "You must set the end date!";
    } else {
      $enddate = $_POST['timp_alocat'];
    }

    if (empty($_POST['pret_curent'])) {
      $priceErr = "You must add the price";
    } else {
      $price = $_POST['pret_curent'];
    }


    if (empty($_POST['nume'])) {
      $sellernameErr = "You must add a name!";
    } else {
      $sellername = $_POST['nume'];
      if (!preg_match("/^[a-zA-Z ]*$/", $sellername)) {
        $sellernameErr = "Only letters and spaces allowed";
      }
    }

    if (empty($_POST['prenume'])) {
      $sellerprenumeErr = "You must add a name!";
    } else {
      $sellerprenume = $_POST['prenume'];
      if (!preg_match("/^[a-zA-Z ]*$/", $sellerprenume)) {
        $sellerprenumeErr = "Only letters and spaces allowed";
      }
    }

    if (empty($_POST['oras'])) {
      $sellerCityErr = "You must add a city!";
    } else {
      $sellercity = $_POST['oras'];
      if (!preg_match("/^[a-zA-Z ]*$/", $sellercity)) {
        $sellerCityErr = "Only letters and spaces allowed";
      }
    }

    if (empty($_POST['tara'])) {
      $sellerCountryErr = "You must add a country!";
    } else {
      $sellercountry = $_POST['tara'];
      if (!preg_match("/^[a-zA-Z ]*$/", $sellercountry)) {
        $sellerCountryErr = "Only letters and spaces allowed";
      }
    }
  }

  if (!(empty($Horsename) || empty($poza) ||  empty($breed) || empty($horseage) || empty($horsetip) || empty($startdate) || empty($enddate) || empty($price) || empty($sellername) || empty($sellerprenume) || empty($sellercity) || empty($sellercountry)) && (empty($pozaErr) && empty($HorsenameErr) && empty($breedErr) && empty($ageErr) && empty($tipErr) && empty($startdateErr) && empty($enddateErr) && empty($priceErr) && empty($sellernameErr) && empty($sellerprenumeErr) && empty($sellerCityErr) && empty($sellerCountryErr))) {
    $verifErr = "OK";
   
  }
  


  if ($verifErr == "OK") { // verificare existenta in baza de date
    $conn = conectare_mysql();

    $sql_insert = "INSERT INTO `cai`(`name`, `tip`, `rasa`, `varsta`,`poza`) VALUES ('$Horsename','$horsetip','$breed','$horseage','$poza')";
    $insert = mysqli_query($conn, $sql_insert);
    $sql_insert = "INSERT INTO `licitatie`(`data_inceperii`, `timp_alocat`, `pret_curent`,`id_util`) VALUES ('$startdate','$enddate','$price',0)";
    $insert = mysqli_query($conn, $sql_insert);
    $sql_insert = "INSERT INTO `vanzator`(`nume`, `prenume`, `oras`,`tara`) VALUES ('$sellername','$sellerprenume','$sellercity','$sellercountry')";
    $insert = mysqli_query($conn, $sql_insert);
  }
  ?>
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
        <h2 style="color:white;text-align:center;margin-bottom:10px;">Add your auction: </h2>


        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div id=horse-info>
            <label>Horse name: </label><input type="text" name="username" value="">
            <span class="error">* <?php echo $HorsenameErr ?></span>
            <br>

            <label>Breed:</label> <input type="text" name="rasa" value="">
            <span class="error">* <?php echo $breedErr ?></span>
            <br>

            <label>Age:</label> <input type="text" name="varsta" value="">
            <span class="error">* <?php echo $ageErr ?></span>
            <br>

            <label>Pony-1 Thoroughbred-2:</label> <input type="text" name="tip" value="">
            <span class="error">* <?php echo $tipErr ?></span>
            <br>

            <label>Start Date:</label> <input type="date" name="data_inceperii" value="">
            <span class="error">* <?php echo $startdateErr ?></span>
            <br>

            <label>End Date:</label> <input type="date" name="timp_alocat" value="">
            <span class="error">* <?php echo $enddateErr ?></span>
            <br>

            <label>Start Price:</label> <input type="text" name="pret_curent" value="">
            <span class="error">* <?php echo $priceErr ?></span>
            <br>

            <label>Add Image:</label> <input type="file" name="poza" accept="image/*">
            <span class="error">* <?php echo $pozaErr ?></span>
            <br>
            <br>

          </div>
          <div id=seller-info>
            <h2 style="color:white;text-align:center;margin-bottom: 10px;"> Seller's Personal Info</h2>
            <label>Lastname:</label> <input type="text" name="nume" value="">
            <span class="error">* <?php echo $sellernameErr ?></span>
            <br>

            <label>Firstname</label> <input type="text" name="prenume" value="">
            <span class="error">* <?php echo $sellerprenumeErr ?></span>
            <br>

            <label>City:</label> <input type="text" name="oras" value="">
            <span class="error">* <?php echo $sellerCityErr ?></span>
            <br>

            <label>Country:</label> <input type="text" name="tara" value="">
            <span class="error">* <?php echo $sellerCountryErr ?></span>
            <br>
          </div>

          <input id="input" type="submit" name="submit" value="Send">
      </div>
      </form>


    </div>

  </div>

</body>