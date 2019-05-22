<?php

################################################################
// csmgaussin 2019
################################################################
// Fichier de configuration a la base landingpage (local)
// Données pour la base sql (local)
// Connexion
// Affichage si erreur
################################################################

$db_server ="127.0.0.1";
$db_user ="root";
$db_pass ="manon";
$sqldb ="landingpage" ;

################################################################
// Connexion au serveur MySQL.
################################################################
$db = new mysqli($db_server, $db_user, $db_pass, $sqldb);
// Check connection
if ($db->connect_errno) {
    echo "Connected unsuccessfully";

    // Quelque chose que vous ne devriez pas faire sur un site public,
    // mais cette exemple vous montrera quand même comment afficher des
    // informations lié à l'erreur MySQL -- vous voulez peut être enregistrer ceci
    echo "Error: Échec d'établir une connexion MySQL, voici pourquoi : \n";
    echo "Error: " . $db->connect_errno . "\n";
    echo "Error: " . $db->connect_errno . "\n";
    die("Connection failed: " . $db->connect_errno);


}
//echo "Connected db successfully :-)";
################################################################
// Resultats
################################################################

//echo "Connected successfully";


// Selection de la base
//mysqli_select_db($sqldb, $db);

################################################################
// Fin fichier de configuration a la base
################################################################

  //  mysqli_close($db);

?>
