<?php 
// classe demande
class Patient
{
    //propriete

    private $_prenomP;
    private $_nomP;
    private $_numTel;
    private $_emailP;
    private $_dateRDV;
    private $_heureRDV;
    //private $_Statut; pour une version à venir ACCORDE ou REFUSE

    private $_DBConnect;


    // methode

    // constructeur qui reçoit objet PDO ou MYSQLI
    public function __construct($connectOBJ) 
    {
        $this->_DBConnect = $connectOBJ->DBConnect;  //mysqli
        
    }

    public function demande(array $data)
    {

        $this->_nomP             = trim(strtoupper(htmlentities(strip_tags(substr($data["nomPatient"], 0, 100)))));
        $this->_prenomP          = trim(ucfirst(htmlentities(strip_tags(substr($data["prenomPatient"], 0, 100)))));
        $this->_numTel           = trim(ucwords(htmlentities(strip_tags(substr($data["numTel"], 0, 10)))));
        $this->_emailP           = trim(strtolower(htmlentities(strip_tags(substr($data["email"], 0, 70)))));
        $this->_dateRDV          = trim(strtolower(htmlentities(strip_tags(substr($data["dateRDV"], 0, 8)))));
        $this->_heureRDV         = trim(strtolower(htmlentities(strip_tags(substr($data["heureRDV"], 0, 5)))));
        //$this->_statut           = trim(htmlentities(strip_tags($data["statut"])));

        
      
                date_default_timezone_set('America/Guadeloupe');
                $dates = date("Y-m-d");
                $heure = time("H:i:s");

                // preparation requete d'insertion
                $requete = "INSERT INTO qms_patient (nom, prenom, numTel, email, dateRDV, heureRDV) 
                VALUES ('".$this->_nomP."', '".$this->_prenomP."', '".$this->_numTel."','".$this->_emailP."','".$this->_dateRDV."','".$this->_heureRDV."')";
                

                echo $requete;
                echo "<br>";

                // lancement de la requete d'insertion
                $this->_DBConnect->query($requete);

                // recuperation dernier idPatient au moment de l'insertion
                $idPatient = $this->_DBConnect->insert_id;


                
                if( $idPatient != "")
                {
                    // requete insert sur table qms_patient
                    $req = "INSERT INTO qms_patient(nom, prenom, numTel,emailP, dateRDV, heureRDV)
                    VALUES ('".$this->_nomP."', '".$this->_prenomP."', '".$this->_numTel."','".$this->_emailP."', 
                    '".$this->_dateRDV."', '".$this->_heureRDV."')";

                     $resultat = $this->_DBConnect->query($req);


                     if( $resultat == 1)
                     {

                        header("Location : https://butterfly.yj.fr/QMS/validation.php");
                        exit;

                     } else {
                        // erreur
                        echo "Erreur demande.";
                        
                     }

                } else {
                    echo "Erreur insertion rendez-vous du dernier patient!!!";
                }


    }  // end function demande


} // end class