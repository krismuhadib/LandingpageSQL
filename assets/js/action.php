<?php

################################################################
// csmgaussin 2019 - action.php
################################################################
// Fichier de traitement des datas et envoi dans la base de donnée
// - Traitement des erreurs
// - Renvoi du text d'erreur
// - Champs vides
// - Email non valide
// - Comparaison si email existant
################################################################

// Connexion a la base
include('connexion.php');

// Recuperation des datas par le POST
$name=$_POST["name"];
$email=$_POST["email"];
$errorMSG = "";
$error = 0;

// Verif data Name
if (empty($_POST["name"])) {
    $errorMSG = "Name is empty. ";
  } else {
    $name = $_POST["name"];
}

// Verif data Email
if (empty($_POST["email"])) {
  $errorMSG = "Email is empty. ";
  } else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $errorMSG .= "Invalid email. ";
  } else {
    $email = $_POST["email"];
}

// Message si les 2 champs sont vides
if (empty($_POST['name']) AND empty($_POST['email'])) {
  $errorMSG = "Name and Email empty. ";
}

// Verification si l'email n'existe pas
$select = mysqli_query($db, "SELECT `email` FROM `client` WHERE `email` = '".$_POST['email']."'") or exit(mysqli_error($db));
if(mysqli_num_rows($select)) {
    $errorMSG .= "This email is already being used.";
    //exit('This email is already being used');
}

// Trim et Sanitize les Datas

//$name = filter_var($name, FILTER_SANITIZE_STRING);
$clean_name = htmlentities(trim($name));

//var msg = $errorMSG;
// echo "le name est :";
// echo $name;
//
// echo "le email est :";
// echo $email;
if(empty($errorMSG)){

// Tout est ok, alors traitement SQL
$sql = "INSERT INTO client (name, email) VALUES ('$clean_name', '$email')";
  //j'effectue la requete, si ok, j'envoi 1
  if (mysqli_query($db, $sql)) {
    echo 1;
  }else{
    //echo "Error: " . $sql . "<br>" . mysqli_error($db);
    echo $result->error;
  };
}else{
  //echo $errorMSG;
  //echo '0';
  echo json_encode(['msg'=>$errorMSG]);
  return;
};


  /////////////////////////////////////////////////////////////////////////////////////
  // FERMETURE MYSQL
  /////////////////////////////////////////////////////////////////////////////////////
  mysqli_close($db);
?>
