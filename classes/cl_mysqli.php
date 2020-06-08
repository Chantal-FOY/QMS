<?php 


class ConnectI 
{

    // proprietes - attributs
    public $host;
    public $user;
    public $pass;
    public $db;
    public $DBConnect;




    public function __construct()
    {
        /**
         * INDIQUER VOS INFORMATIONS DE CONNEXION
         */
        $this->host = "localhost";
        $this->user = "buttaubc_chantal";
        $this->pass = "Bfly357T";
        $this->db = "buttaubc_SIMPLONG";

        ConnectI::connexion($this->host, $this->db, $this->user, $this->pass);

    }


    public function connexion($host, $db, $userDB, $passDB)
    {

        $this->DBConnect = new mysqli($host, $userDB, $passDB, $db, 3306);
        print_r($this->_connectDB);
    }

}