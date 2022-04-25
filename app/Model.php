<?php
abstract class Model{
    // DB INFORMATIONS
    private $host = "";
    private $db_name = "";
    private $username = "";
    private $password = "";
    private $port = '';

    // Properties for customizing queries
    public $table;


    public function getConnection(){
        // Delete the previous connection
        $this->_connexion = null;

        // Try to connect to the DB
        try{
            $this->_connexion = new PDO("mysql:host=" . $this->host .';port=' . $this->port. ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->_connexion->exec("set names utf8");
            $this->_connexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }catch(PDOException $exception){
            echo "Connexion error : " . $exception->getMessage();
        }
    }

    public function getOne($id){
        $sql = 'SELECT * FROM '.$this->table.' WHERE id='.$id ;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();
    }

    public function getAll(){
        $sql = 'SELECT * FROM '.$this->table . ' ORDER BY id ASC';
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

}
