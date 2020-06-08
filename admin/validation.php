
<?php
//ini_set('display_errors', true); // afficher les erreurs php


require "classes/cl_inscription.php";

//require "classes/cl_demande.php";


// creation d'object connectI
require "classes/cl_mysqli.php";
$db = new ConnectI(); // $db contient object MYSQLI

// test instanciation de la classe Praticien ----> cree mon objet praticien
$praticien = new Praticien($db);
//$patient=new Patient($db);



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
    // traitements formulaire inscription du praticien


        $praticien->inscription($_POST);
        header('Location:https://Butterfly.yj.fr/QMS/admin/connexion.php');
        //print_r($praticien);

    break ;

    case 'CONN':
        //connexion
        $praticien->connexion($_POST);
        header('Location:https://Butterfly.yj.fr/QMS/admin/tableaux.php');
        break ;
        
    /*case 'PASS':
        //nouveau mot de passe
        $praticien->newPass($_POST);

        break ;*/
    /*case 'DEMAND':
        //demande de RDV -nouveau patient
        $patient->demande($_POST);
        //print_r($patient);
        

        break;*/
            
        
    default:
    #code
    break ;


}