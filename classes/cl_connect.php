<?php
/**
 * classer pour connexion à notre base de données distante
 * le serveur
 * username
 * password
 * database name
 * 
 */

 class connect
 {
     //propriétés
    public $host;
    public $user;
    public $pass;
    public $db;

    //methodes

    public function _construct()
    {
        //informations de la base de données
        $this->host = "localhost";
        $this->user ="buttaubc_chantal";
        $this->pass ="Bfly357T";
        $this->db   ="buttaubc_SIMPLONG";

        //
        Connect::instance_db($this->host, $this->user, $this->pass, $this->db);

    }

    public function _instance_db($host, $user, $pass, $db)
    {
        //creation instance PDO // PHP DATA OBJECT
        /**
         * -dsn = Data Source Name (mysql : host=localhost;dbname=mabasededonnees)
         * username = nom utilisateur crée pou rlaconnexion base de données
         * passwd = mot de passe de notre utilisateur
         */
        try{
            // creation de pdo avec passage de paramètres
            $this->pdo =new PDO('mysql:host='.$host.";dbname=".$db, $user, $pass);
            return $this->pdo;
            //print_r($this->pdo);

        }catch (PDOException $evenement){
            //\Throwable $th
            //throw $th;
            //lever une exception = attraper une erreur et afficher l'erreur
            echo "ERREUR DE CONNEXION".$evenement->getMessage(),$evenement->getCode();
        }

    }

    public function db_connexion()
    {
        //renvoi le nom de la base de donnees
        return $this->db;
    }


 }
//creation objet Connect //exemple temporaire
//$connexion = new Connect();


