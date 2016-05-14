<?php

class database{
    private $dbh; // Database Handler
    private $stmt; //Statement Preparado

    public function __construct(){
        $path = realpath($_SERVER['DOCUMENT_ROOT'].'/../'); // Configracion fuera de webroot
        echo $path.'/config.ini';
        $config = parse_ini_file($path.'/config.ini'); // Configuracion

        // Database Source Name
        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'];
        $options = array(
            PDO::ATTR_PERSISTENT => true, 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try{
            $this->dbh = new PDO($dsn, $config['username'], $config['password'], $options);
        }catch(PDOException $e) {
           echo "Conexion Fallida: ". $e->getMessage();
        }
    }

    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null){ //$param = Placeholder, $value = actual value, $type = value type
        if (is_null($type)) {
          switch (true) {
            case is_int($value):
              $type = PDO::PARAM_INT;
              break;
            case is_bool($value):
              $type = PDO::PARAM_BOOL;
              break;
            case is_null($value):
              $type = PDO::PARAM_NULL;
              break;
            default:
              $type = PDO::PARAM_STR;
          }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute(){
        return $this->stmt->execute();
    }

    public function resultset(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount(){
        return $this->stmt->rowCount();
    }

    public function lastInsertId(){
        return $this->dbh->lastInsertId();
    }

}

?>
