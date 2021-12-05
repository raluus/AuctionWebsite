<?php
function verif_login(&$nameErr,&$name,&$emailErr,&$email,&$passwErr,&$passw){
 $amVerificat=""; 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Must enter an username";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z 1-9]*$/",$name)) {
      $nameErr = "Only letters,numbers and spaces allowed";
    }
  }
   if (empty($_POST["passw"])) {
    $passwErr = "Must enter a password";
  } else {
    $passw = test_input($_POST["passw"]);
    }
 if (empty($_POST["email"])) {
    $emailErr = "Must enter an email";
  } else {
    $email = test_input($_POST["email"]);
 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($nameErr)&&empty($emailErr)&&empty($passwErr))
	 $amVerificat = "OK"; 
 }
 return $amVerificat;
}
function verif_login_admin(&$nameErr,&$name,&$passwErr,&$passw){
 $amVerificat=""; 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Must enter an username";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z 1-9]*$/",$name)) {
      $nameErr = "Only letter,numbers and spaces allowed";
    }
  }
   if (empty($_POST["passw"])) {
    $passwErr = "Must enter a password";
  } else {
    $passw = test_input($_POST["passw"]);
    }
  if (empty($nameErr)&&empty($emailErr)&&empty($passwErr))
	 $amVerificat = "OK"; 
 }
 return $amVerificat;
}

?> 
