<?php 
// classe inscription
   class Patient
{
    //propriete

    private $_prenom;
    private $_nom;
    private $_heureRdv;
    private $_dateRdv;
    private $_email;
    private $_pwd;
    private $_DBConnect;
    private $_tel;


    // methode

    // constructeur qui reçoit objet PDO ou MYSQLI
    public function __construct($connectOBJ) 
    {
        $this->_DBConnect = $connectOBJ->DBConnect;  //mysqli
        
    }

    public function inscription(array $data)
    {
       // test d'affichage de mon tableau $data
       //print_r($data);

       // exemple utilisation fonction php
       /*  $this->_nom = trim($data["nom"]);  // supprime les espaces debut et fin de chaine
        $this->_nom = strtoupper($this->_nom);  // la chaine en majuscule

        $this->_nom = htmlentities($this->_nom);
        $this->_nom = strip_tags($this->_nom);    // supprimer les balises html et php

        // couper ma chaine de caractère trop longue
        $this->_nom = substr($this->_nom, 0, 102);
        */

        $this->_nom = trim(strtoupper(htmlentities(strip_tags(substr($data["nom"], 0, 100)))));
       /* echo "chaine apres securisation"."<br />";
        print_r($this->_nom)."<br />"; */
        if($this->_nom === "")
        {
            //echo "ATTENTION, chaine invalide"."<br />"; 
            // $this->_nom = "";
        }

        $this->_prenom              = trim(ucfirst(htmlentities(strip_tags(substr($data["prenom"], 0, 100)))));
        $this->_heureRdv           = trim(ucwords(htmlentities(strip_tags(substr($data["heureRdv"], 0, 05)))));
        $this->_dateRdv            = trim(ucwords(htmlentities(strip_tags(substr($data["dateRdv"], 0, 10)))));
        $this->_email               = trim(strtolower(htmlentities(strip_tags(substr($data["email"], 0, 100)))));
        $this->_pwd            = trim(htmlentities(strip_tags($data["pwd"])));
        $this->_tel            = trim(htmlentities(strip_tags($data["numTel"])));
        
        // verifier mot passe chaine caractere compris entre 8 et 12
        if( strlen($this->_pwd) < 8  ){
            // erreur
           /* try {
                throw new Exception("<p>Le mot de passe n'est pas correct...</p>");
            } catch(Exception $e) {
                echo $e->getMessage();
            }*/

            } else {
            // ok mais
        if( strlen($this->_pwd) > 12)
            {
                // erreur

            } else {
                // securisation mot de passe
                $this->_pwd = password_hash($this->_pwd, PASSWORD_DEFAULT);
                //echo $this->_pwd;




                //CONTROLE SI L'heure sélectionnée existe dans la table qms_heures
                //pour éviter d'avoir plus d'une personne à la même heure de RDV
                //si oui on supprime l'heure au niveau de la table qms_heures (heure prise)
                //on procède à l 'envoi d'un message et l'envoi d'un ticket
                //sinon le personne recommence sa saisie d'inscription et on l'invite 
                //à choisir une autre heure
                
                //$reqH = "SELECT heureRdv FROM qms_heures";
                //$resH = $this->_DBConnect->query($reqH);
                
                /*foreach($resH as $value){

                    if ($this->_heureRdv=$value){
                        
                        //envoiMail
                        //envoiMail($data);
                        //envoiTicket
                        //envoiTicket($data);
                        //suppression de cette heure dans la table
                        echo $value;
                        $reqSupprHeure="DELETE FROM qms_heures WHERE heureRdv='".$this->_heureRdv."'";
                        $this->_DBConnect->query($reqSupprHeure);
                        echo 'RDV pris';
                        
                        exit;

                    }else{
                        //Heure déjà prise
                        //veuillez recommencer
                        $localpath = $_SERVER["DOCUMENT_ROOT"];

                        include $localpath."/QMS/inscription.php";

                    }
                }*/

                

                // insertion en base de donnee
                /**
                 *  INSERT INTO nomtable (liste des champs) VALUES (liste des valeurs) 
                 *  INSERT INTO cp_clients ('civ') VALUES (0)
                 */

                
                //print_r($this->_DBConnect);
                /*
                    27-05-2020 11:04   // sens francophone
                    2020-05-27 11:04   // universelle

                    format Y-m-d H:i:s
                */
                /*
                    choisir son fuseau horaire America/Guadeloupe
                */
                date_default_timezone_set('America/Guadeloupe');
                $dates = date("Y-m-d H:i:s");
                

                // preparation requete d'insertion
                $requete = "INSERT INTO qms_patient (nom, prenom, numTel, email, pwd, dateRdv, heureRdv ) 
                VALUES ('".$this->_nom."', '".$this->_prenom."', '". $this->_tel ."', '".$this->_email."', '".$this->_pwd."', '".$dates."', '".$this->_heureRdv."')";
                
                // lancement de la requete d'insertion
                $this->_DBConnect->query($requete);

                // recuperation dernier idPatient au moment de l'insertion
                $idPatient = $this->_DBConnect->insert_id;

                if( $idPatient != "")
                {

                 //   header('Location: confirme.php');
                //    exit();

                //envoi Email
                //$patient->envoiMail($data);

                echo 'envoi Ticket numérique';
                $patient->envoiTicket($data);

                $localpath = $_SERVER["DOCUMENT_ROOT"];

                include $localpath."/QMS/ticket.php";


                }else{

                } //

                    
            }  // end else strlen

              



        } // end else strlen 8

        


    }  // end function inscription


    public function connexion(array $data)
    {

    
        $this->_email     = trim(strtolower(htmlentities(strip_tags(substr($data["email"], 0, 100)))));
        $this->_pwd       = trim(htmlentities(strip_tags($data["pwd"])));

        // verification existance client et verification mot de passe
       

        $requete = "SELECT * FROM qms_patient WHERE email = '".$this->_email."'";
        $resultat = $this->_DBConnect->query($requete);

        if($resultat->num_rows == 1);
        {
           // tableau associatif 
           $row = $resultat->fetch_assoc();
           
           // verifier le mot de passe  // session et redirection
           if (password_verify($this->_pwd, $row["pwd"])) {
              // echo 'Le mot de passe est valide !';
               $_SESSION["email"]=$row["email"];

               // L214 pour fab//BARU=protocole+url+fichier
               $path = "https://".$_SERVER["HTTP_HOST"]."/QMS/patient/index.php";
               header("Location: $path");
               exit;


           } else {
               echo 'Le mot de passe est invalide.';
           }


        }  // end condition num_rows



    }  // end function connexion

    public function newPass(array $data)
    {
        /*
            - verifier que l'adresse email existe
            - generer un nouveau mot de passe et mettre à jour dans la table cp_users
            - envoyer un email avec le nouveau mot de passe EN CLAIR
        */
        $this->_email  = trim(strtolower(htmlentities(strip_tags(substr($data["email"], 0, 100)))));

        $requete = "SELECT * FROM qms_patient WHERE email = '".$this->_email."'";
        $resultat = $this->_DBConnect->query($requete);

        if( $resultat->num_rows == 1 ){

            // tableau associatif 
            $row = $resultat->fetch_assoc();

            $idPatient= $row['IDPatient'];

            $reqC ="SELECT nom, prenom FROM qms_patient WHERE IDPatient ='".$idPatient."' ";
            $resultatC = $this->_DBConnect->query($reqC);

            $rowC = $resultatC->fetch_assoc();

            $this->_nom=$rowC['nom'];
            $this->_prenom=$rowC['prenom'];







            $userEmail = $row['email'];

            // generateur mot de passe
            $chaine = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789#&@!_";

            /**
             * melanger les caracteres de ma variable $chaine et 
             * stock dans ma variable $chaine le melange
             */
            $chaine = str_shuffle($chaine);

            // coupe une chaine de 8 caracteres
            $newPassword = substr($chaine, 0, 8);

            

            // envoi message
            // Le message
            $rn = "\r\n";
            $message = "Bonjour ".$this->_nom." ".$this->_prenom." ,$rn vous avez demandez un nouveau mot de passe $rn. Voici votre nouveau mot de passe : $rn";
            $message .= $newPassword.$rn;
            $message .="Je vous remercie .".$rn;


            $headers = 'From: patient@shabb.yj.fr.planethoster.world' . "\r\n" .
            'Reply-To: patient@shabb.yj.fr.planethoster.world ' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();


            // Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()
            $message = wordwrap($message, 70, "\r\n");

            $sujet = "NOUVEAU MOT DE PASSE.";

            // Envoi du mail
            //mail('caffeinated@example.com', 'Mon Sujet', $message);

            $idUser = $row["IDPatient"];

            $this->_pwd = password_hash($newPassword, PASSWORD_DEFAULT);

            date_default_timezone_set('America/Guadeloupe');
            $dates = date("Y-m-d H:i:s");

            if( mail($row['email'], $sujet, $message) == true  ){

                // mise a jour table qms_patient pour id correspondant
                $reqUpdate  = "UPDATE qms_patient SET pwd ='".$this->_pwd."', dateRdv = '".$dates."' 
                WHERE  = '".$idUser."'";

                $resultat = $this->_DBConnect->query($reqUpdate);

                echo "Email envoyé et mise à jour effectuée.";

            } else {
                // erreur d'envoi
                echo "Message non envoyé.";
            }

            




        } else {
            
            // redirection vers la page inscription

            // variable = protocole+url+uri+fichier
            //$path = "https://".$_SERVER["HTTP_HOST"]."/carte/inscription.php"; 
            //$path = "https://".$_SERVER["HTTP_HOST"]."/QMS/inscription.php";
            //header('Location: '.$path);

            $localpath = $_SERVER["DOCUMENT_ROOT"];

            include $localpath."/QMS/inscription.php";
            exit;
            

        }  // end if num_rows



    } // end function newPass


    /*public function envoiMail(array $data)
    {*/
	/* _vérifier que le mail existe
           _envoyer un mail
       */

       /*echo 'Dans envoiMail';
$this->_email  = trim(strtolower(htmlentities(strip_tags(substr($data["email"], 0, 70)))));

$requete = "SELECT IDpatient, nom, prenom, numTel, email FROM qms_patient WHERE email = '".$this->_email."'";
        $resultat = $this→_DBConnect→query($requete);


if( $resultat->num_rows == 1 ){

            // tableau associatif 
            $row = $resultat->fetch_assoc();

            $idPatient= $row['IDPatient'];

            $reqC ="SELECT nom, prenom FROM qms_patient WHERE IDPatient ='".$idPatient."' ";
            $resultatC = $this->_DBConnect->query($reqC);

            $rowC = $resultatC->fetch_assoc();

            $this->_nom=$rowC['nom'];
            $this->_prenom=$rowC['prenom'];

		    $userEmail = $row['email'];

 // envoi message
           
            $rn = "\r\n";
            $message = "Bonjour ".$this->_nom." ".$this->_prenom." ,$rn vous avez demandez un Rendez-vous médical $rn "; 
            $message = "Je vous remercie .".$rn;


            $headers = 'From: patient@shabb.yj.fr.planethoster.world' . "\r\n" .
            'Reply-To: patient@shabb.yj.fr.planethoster.world ' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();


            // Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()
            $message = wordwrap($message, 70, "\r\n");

            $sujet = "DEMANDE DE RENDEZ-VOUS.";

            //Envoi du mail
            if(mail($userEmail, $sujet, $message)==true){
		echo "Email envoyé ...";

		}else {
                // erreur d'envoi
                echo "Message non envoyé.";
            }


} else {
            
            // redirection vers la page inscription

            // variable = protocole+url+uri+fichier
            //$path = "https://".$_SERVER["HTTP_HOST"]."/carte/inscription.php"; 
            //$path = "https://".$_SERVER["HTTP_HOST"]."/QMS/inscription.php";
            //header('Location: '.$path);
            $localpath = $_SERVER["DOCUMENT_ROOT"];

            include $localpath."/QMS/inscription.php";

            exit;
            

        }  // end if num_rows



    } // end function envoiMail*/



    


} // end class