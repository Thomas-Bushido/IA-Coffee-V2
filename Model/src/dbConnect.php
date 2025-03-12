<?php
abstract class Model {
    private $host;
    private $db_name;
    private $username;
    private $password;

    protected $_connexion;
    public $id;

    public function __construct() {
        // Charger la configuration depuis config.php
        $config = require __DIR__ . '/../../config.php';

        $this->host = $config['host'];
        $this->db_name = $config['db_name'];
        $this->username = $config['username'];
        $this->password = $config['password'];

        $this->dbConnect();
    }

    private function dbConnect() {
        $this->_connexion = null;

        try {
            $this->_connexion = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->db_name, 
                $this->username, 
                $this->password
            );
            $this->_connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->_connexion->exec('SET NAMES utf8');
        } catch (PDOException $exception) {
            die('❌ Erreur de connexion : ' . $exception->getMessage());
        }
    }
}



	