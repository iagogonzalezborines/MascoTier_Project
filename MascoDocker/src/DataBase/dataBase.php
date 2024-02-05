
<?php
/*SINGLETON PATTERN USED*/
class dataBase {
    private $dbh;
    private $config;
    private $tipo;
    private $hostname;
    private $username;
    private $password;
    private $database;

    /**
     * Private constructor to follow the singleton pattern
     */
    private function __construct() {
        $this->config = parse_ini_file('config.ini', true);
        $this->tipo = $this->config['archivo_datos']['tipo'];
        $this->hostname = $this->config['archivo_datos']['hostname'];
        $this->username = $this->config['archivo_datos']['username'];
        $this->password = $this->config['archivo_datos']['password'];
        $this->database = $this->config['archivo_datos']['database'];
    }

    /**
     * Function to get the instance of the class(if not exists, it creates it
     * @return dataBase
     */

    public static function getInstance(){
        static $instance = null;
        if($instance === null){
            $instance = new dataBase();
        }
        return $instance;
    }

    public function connectToDatabase(){
        try{
            $dsn = "$this->tipo:dbname=$this->database;host=$this->hostname";
            $this->dbh = new PDO($dsn, $this->username, $this->password);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->dbh;
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function disconnectFromDatabase(){
        unset($this->dbh);
    }

    public function executeQuery($query, $params = null){

        if($params == null){
            try{
            
                $stmt = $this->dbh->prepare($query);
                $stmt->execute();    
                $result = $stmt;
                return $result;
            } catch (PDOException $e){
                echo $e->getMessage();
                return false;
            }
            finally{
                unset($stmt);
                unset($result);
            }
        }
        try{
            $stmt = $this->dbh->prepare($query);
            foreach($params as $key => $value){
                $stmt->bindParam($key+1, $value);
            }
            $stmt->execute();
            return $stmt;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
        finally{
            unset($stmt);
            
        }
   
    }
}



?>