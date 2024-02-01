<?php
 
function executeQuery($dbh, $query){
    try{
        $stmt = $dbh->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

?>