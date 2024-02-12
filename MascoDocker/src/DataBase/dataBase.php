
<?php
/*ANOTACION PARA EL FUTURO*/
/*Creates functions for select(params: table, fields, where, order, limit), insert(params: table, fields, values), update(params: table, fields, values, where), delete(params: table, where)*/
/*SINGLETON PATTERN USED*/
class dataBase
{
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
    private function __construct()
    {
        $this->config = parse_ini_file('config.ini', true);
        $this->tipo = $this->config['bbdd']['tipo'];
        $this->database = $this->config['bbdd']['database'];
        $this->hostname = $this->config['bbdd']['hostname'];
        $this->username = $this->config['mascoroot']['username'];
        $this->password = $this->config['mascoroot']['password'];
    }

    /**
     * Function to get the instance of the class(if not exists, it creates it
     * @return dataBase
     */

    public static function getInstance()
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new dataBase();//Shouldnt we set in here the variables from the config.ini?
        }
        return $instance;
    }

    /**
     * Function to connect to the database
     * @return PDO
     */

    public function connectToDatabase()
    {
        try {
            $dsn = "$this->tipo:dbname=$this->database;host=$this->hostname";
            $this->dbh = new PDO($dsn, $this->username, $this->password);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->dbh;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function disconnectFromDatabase()
    {
        unset($this->dbh);
        $dbh = null;
    }

    /**
     * Function that executes queries generally, it does have a generic use, so it can be used for any query and avoids SQL injection by using prepared statements
     * params: $query: the query to be executed 
     * $params: the parameters(if necessary) to be bound to the query
     */

    public function executeQuery($query, $params = null)
    {
        if ($params == null) { // In case theres no parameters it uses the query method
            try {
                $stmt = $this->dbh->query($query);
                $result = $stmt;
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            } finally {
                unset($stmt);
                unset($result);
            }
        } else { // In case there are parameters it uses the prepare method in order to avoid SQL injection
            try {
                $stmt = $this->dbh->prepare($query);
                foreach ($params as $key => $value) {
                    $stmt->bindParam($key + 1, $value);
                }
                $stmt->execute();
                return $stmt;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            } finally {
                unset($stmt);
            }
        }
    }
    public function prepareStatement($stmnt){
        try {
            $stmt = $this->dbh->prepare($stmnt);
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        
    }
}
?>