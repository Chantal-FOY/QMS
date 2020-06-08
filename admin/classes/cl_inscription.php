<?php 
// classe inscription   pour les praticiens 
class Praticien
{
    //propriete

    private $_prenom;
    private $_nom;
    private $_organisme;
    private $_email;
    private $_pwd;
    

    private $_DBConnect;


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

       

        $this->_nom                 = trim(strtoupper(htmlentities(strip_tags(substr($data["nom"], 0, 100)))));
        $this->_prenom              = trim(ucfirst(htmlentities(strip_tags(substr($data["prenom"], 0, 100)))));
        $this->_organisme           = trim(ucwords(htmlentities(strip_tags(substr($data["organisme"], 0, 100)))));
        $this->_email               = trim(strtolower(htmlentities(strip_tags(substr($data["email"], 0, 70)))));
        $this->_pwd                 = trim($data["pwd"]);
        //$this->_profil              = trim($data["profil"]);

        
        // verifier mot passe chaine caractere compris entre 8 et 12
        if( strlen($this->_pwd) < 8  ){
            // erreur
           try {
                throw new Exception("<p>Le mot de passe n'est pas correct...</p>");
                echo $this->_pwd;
            } catch(Exception $e) {
                echo $e->getMessage();
            }

        } else {
            // ok mais
            if( strlen($this->_pwd) > 12)
            {
                try {
                    throw new Exception("<p>Le mot de passe n'est pas correct...</p>");
                } catch(Exception $e) {
                    echo $e->getMessage();
                }

            } else {
                // securisation mot de passe
                //$this->_pwd = password_hash($this->_pwd, PASSWORD_DEFAULT);
                //echo 'TRACES '+"<br>";
                //echo $this->_password;

                
                //print_r($this->_DBConnect);
                /*
                    27-04-2020 11:04   // sens francophone
                    2020-04-27 11:04   // universelle

                    format Y-m-d H:i:s
                */
                /*
                    choisir son fuseau horaire America/Guadeloupe
                */
                date_default_timezone_set('America/Guadeloupe');
                //$dates = date("Y-m-d H:i:s");
                $dates = date("Y-m-d");

                // preparation requete d'insertion
                $requete = "INSERT INTO qms_organisme(nom, prenom, organisme, email, mdp) 
                VALUES ('".$this->_nom."', '".$this->_prenom."', '".$this->_organisme."','".$this->_email."', '".$this_pwd."')";
                
                // lancement de la requete d'insertion
                $this->_DBConnect->query($requete);

                // recuperation dernier idOrganisme au moment de l'insertion
                $idConnect = $this->_DBConnect->insert_id;
            

                if( $idConnect == 0)
                {
                    // requete insert sur table qms_organisme
                    $reqU = "INSERT INTO qms_organisme (IDOrganisme, nom, prenom,organisme, email, pwd)
                    VALUES ('".$idOrganisme."','".$this->_nom."','".$this->_prenom."','".$this->_organisme."','".$this->_email."','".$this->_pwd."')"; 
  

                     $resultat = $this->_DBConnect->query($reqU);

                     if( $resultat == 1)
                     {
                        $localpath = $_SERVER["DOCUMENT_ROOT"];

                        include $localpath."/QMS/admin/validation.php";

                        //header("Location : https://butterfly.yj.fr/QMS/admin/validation.php"); 
                        /*Redirection du navigateur*/
                        exit;

                     } else {
                        // erreur
                        echo "Erreur inscription.";
                        
                     }

                } else {
                    echo "Erreur insertion praticiens!!!";
                }
                
                


            }  // end else strlen 12

            



        } // end else strlen 8

        


    }  // end function inscription



    public function connexion(array $data)
    {

        $this->_email               = trim(strtolower(htmlentities(strip_tags(substr($data["email"], 0, 102)))));
        //$this->_pwd                 = trim(htmlentities(strip_tags($data["pwd"])));
        $this->_pwd                 = trim($data["pwd"]);
        //$this->_profil              = trim($data["profil"]); 

        // verification existance praticien et verification mot de passe
        /**
         *  SELECT nomcolonne, nomcolonne FROM nomtable WHERE nomcolonne=nomvariable
         *  SELECT cpEmail, cpPassword FROM cp_users WHERE cpEmail='mambrosio@simplon.co'
         *  ou
         *  SELECT * FROM cp_users WHERE cpEmail='mambrosio@simplon.co'
         */

        $requete = "SELECT * FROM qms_organisme WHERE email = '".$this->_email."'";
        $resultat = $this->_DBConnect->query($requete);


        /*echo '*';
        echo $this->_pwd;
        echo '*';
        echo $row["pwd"];
        echo '*';
        echo $data["pwd"];
        echo '*';
        echo $this->query($requete);
        echo '*';*/
        //echo $resultat->num_rows;

        // tableau associatif 
        $row = $resultat->fetch_assoc();
        
        if(($resultat->num_rows == '1')&&($this->_pwd= $row["pwd"]))
        {
           
           // tableau associatif 
           //$row = $resultat->fetch_assoc();
           //echo password_verify($this->_pwd, $row["pwd"]);

           // verifier le mot de passe  // session et redirection
           //if (password_verify($this->_pwd, $row["pwd"])) {
            //if ($this->_pwd= $row["pwd"]) {
               //echo 'Le mot de passe est valide !';
        

               $_SESSION["email"]=$row["email"];

               //sleep(5);


               //variable=protocole+url+fichier
               //à la connexion valide ->redirection vers les tableaux
               //$path = "https://".$_SERVER["HTTP_HOST"]."/QMS/tableaux.php";
               //header('Location:'.$path);

                //header( "refresh:3;url=tableaux.php" );
                //echo 'Vous serez rediriger dans 3 secondes. Sinon, cliquez <a href="tableaux.php">ici</a>.'; 
           $localpath = $_SERVER["DOCUMENT_ROOT"];

           include $localpath."/QMS/admin/tableaux.php";
               //$localpath=$_SERVER["DOCUMENT-ROOT"];
               //include $localpath."QMS/admin/tableaux.php";

               /*header("Status: 301 Moved Permanently", false, 301);
               $host  = $_SERVER['HTTP_HOST'];
               $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
               $extra = 'tableaux.php';
               $path="https://$host$uri/$extra";
               header("Location: $path");
               exit;*/

               //header('Location:https://'.$_SERVER["HTTP_HOST"].'/QMS/tableaux.php');
               //header('Location: tableaux.php');

               //var_dump($data);

               //exit;


           } else{
               echo 'Le mot de passe est invalide.';
           }


        //}  // end condition num_rows



    }  // end function connexion

    public function newPass(array $data)
    {
        /*
            - verifier que l'adresse email existe
            - generer un nouveau mot de passe et mettre à jour dans la table cp_users
            - envoyer un email avec le nouveau mot de passe EN CLAIR
        */
        $this->_email               = trim(strtolower(htmlentities(strip_tags(substr($data["email"], 0, 102)))));

        $requete = "SELECT * FROM qms_organisme WHERE email = '".$this->_email."'";
        $resultat = $this->_DBConnect->query($requete);

        if( $resultat->num_rows == 1 ){

            // tableau associatif 
            $row = $resultat->fetch_assoc();

            $idConnect= $row['IDOrganisme'];

            $reqC ="SELECT nom, prenom FROM qms_organisme WHERE IDOrganisme ='".$idConnect."' ";
            $resultatC = $this->_DBConnect->query($reqC);

            $rowC = $resultatC->fetch_assoc();

            $this->_nom=$rowC['nom'];
            $this->_prenom=$rowC['prenom'];







            $userEmail = $row['email'];

            // generateur mot de passe
            //$chaine = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789#&@!_";

            /**
             * melanger les caracteres de ma variable $chaine et 
             * stock dans ma variable $chaine le melange
             */
            //$chaine = str_shuffle($chaine);

            // coupe une chaine de 12 caracteres
            $newPassword = substr($chaine, 0, 12);

            

            // envoi message
            // Le message
            $rn = "\r\n";
            $message = "Bonjour ".$this->_nom." ".$this->_prenom." ,$rn vous avez demandez un nouveau mot de passe $rn. Voici votre nouveau mot de passe : $rn";
            $message .= $newPassword.$rn;
            $message .="Je vous remercie .".$rn;


            $headers = 'From: client@butterfly.yj.fr ' . "\r\n" .
            'Reply-To: client@butterfly.yj.fr ' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();


            // Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()
            $message = wordwrap($message, 70, "\r\n");

            $sujet = "NOUVEAU MOT DE PASSE.";

            // Envoi du mail
            //mail('caffeinated@example.com', 'Mon Sujet', $message);

            $idUser = $row["IDOrganisme"];

            //$this->_pwd = password_hash($newPassword, PASSWORD_DEFAULT);

            date_default_timezone_set('America/Guadeloupe');
            $dates = date("Y-m-d H:i:s");

            if( mail($row['email'], $sujet, $message) == true  ){

                // mise a jour table connectes pour id correspondant
                $reqUpdate = "UPDATE qms_organisme SET password='".$this->_pwd."', dateUpdate = '".$dates."' 
                WHERE IDOrganisme = '".$idUser."'";

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

            include $localpath."/QMS/admin/inscription.php";
            exit;
            

        }  // end if num_rows



    } // end function newPass


    public function envoiTicket(array $data)
    //$data les données du patient
        {
        /*
            _vérifier que le dernier ticket existe
            _génère le nouveau code du ticket
            _mettre le nouveau patient dans la table passages
            _calcul estimation de la durée d’attente
            _envoyer un ticket
           */
    
    
    $req = "SELECT numPassage, numPosition, dateUpdate FROM qms_passages  ORDER BY numPassage";
    $res = $this→_DBConnect→query($req);

    echo 'ETAPE1';
    
    date_default_timezone_set('America/Guadeloupe');
    $dateSystem = date("Y-m-d H:i:s");
    
    ///  CF $duree=$dateSystem-$res[dateUpdate] ;
    
    
    
    // récupération du dernier ticket et de la dernière position
    if( $res->num_rows >= 1 ){

        echo 'ETAPE2';
        $nb=count($res);
    
        $dureeMoyenne=$duree/$nb;
    
            for($i=0;$i<$nb;$i++){
                if (i==$nb-1){
                $codeTicket=$res[$i-1];
                $codePosition=$res[$i];
    
                if($codeTicket=="999"){
                    $codeTicket="000";
                }
    
                $newCodeTicket=$codeTicket+1;
                $newCodePosition=$codePosition+1;
                
                       }
            }
    }else{
        $newCodeTicket="001";
        $newCodePosition="1";
        echo 'ETAPE3';
    
    }
    
    $requete="INSERT INTO qms_passages (qms.IDPatient, numPassage, numPosition, dateUpdate)
    VALUES ('".$IDPatient."','".$newCodeTIcket."','". $newCodePosition ."','".$dates."')";
    
    $resultat = $this→_DBConnect→query($requete);
    
    $requete2="SELECT * FROM qms_patient, qms_passages WHERE qms_passages.IDPatient=qms_patient.IDPatient";
    
    $resultat2=$this→_DBConnect→query($requete);
    
    
    
    
    
    //il nous faut  le nom de l’organisme -ses coordonnées
    //numéro ticket -numéro position -durée d’attente estimée
    
    //$newCodeTicket - $newCodePosition - $dureeMoyenne
    
    $requeteOrganisme="SELECT * FROM organisme";
    $resOrganisme=$this→_DBConnect→query($requeteOrganisme);
    
    
    //A INTEGRER DANS L’INTERFACE DU TICKET
    echo 'ENVOI TICKET';
    }

} // end class