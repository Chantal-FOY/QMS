<?php
ini_set('display_errors', true); // afficher les erreurs php


require "classes/cl_inscription.php";
require "admin/classes/cl_inscription.php";


// creation d'object connectI
require "classes/cl_mysqli.php";
$db = new ConnectI(); // $db contient object MYSQLI

// test instanciation de la classe patient ----> cree mon objet patient
$patient = new Patient($db);



// comment afficher tous les elements de la variables superglobale $_POST avec une bouble foreach
foreach($_POST as $value){
    //echo $value. "<br />";
}

// Avec la boucle  for ?
$nrb = count ($_POST);

for ($i=0; $i < $nbr; $i++) {
    # code ....
    //echo $i. "<br />";
}

//print_r($_POST["frmName"]);

$nomFormulaire = $_POST["frmName"];

// boucle avec condition 
switch ($nomFormulaire) {
    case 'INSC':
    // traitements formulaire inscription


        $patient->inscription($_POST);

    //print_r($patient);
        $patient->envoiTicket($_POST);



    break ;

    case 'CONN':

        $patient->connexion($_POST);
        break ;

    /*case 'PASS':
        //nouveau mot de passe
        $patient->newPass($_POST);

        break ;*/



    default:
    #code
    break ;


}