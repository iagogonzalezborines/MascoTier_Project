<?php 

function connectToDatabase(){
    $config = parse_ini_file('config.ini', true);
    $tipo = $config['archivo_datos']['tipo'];
    $hostname = $config['archivo_datos']['hostname'];
    $username = $config['archivo_datos']['username'];
    $password = $config['archivo_datos']['password'];
    $database = $config['archivo_datos']['database'];

    try{
        $dsn = "$tipo:dbname=$database;host=$hostname";
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

function disconnectFromDatabase($dbh){
  close = $dbh->close();
  dsetroy($dbh);
  $dbh = null;
}



?>
