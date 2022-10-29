<?php
    include 'ConnectionFactory/ConnectionFactoryPDO.php';

    class QueimadasModel {
        function __construct() {
            $this->conFactoryPDO = new ConnectionFactoryPDO();
        }   
  
        function createCache ($locale,$json) {
            $datetime = new DateTime();
            $dateFormated = $datetime->format('d/m/Y');

            $connection = $this->conFactoryPDO;
            $query = $connection->query("DELETE FROM JSONCache WHERE locale =:locale");
            $query->bindParam(':locale',$locale, PDO::PARAM_STR);
            $connection->execute($query);

            $query = $connection->query("INSERT INTO JSONCache (locale,jsonContent,dateInsertion) VALUES (:locale,:jsonContent,:dateInsertion)");
            $query->bindParam(':locale',$locale, PDO::PARAM_STR);
            $query->bindParam(':jsonContent',$json, PDO::PARAM_STR);
            $query->bindParam(':dateInsertion',$dateFormated, PDO::PARAM_STR);
            $connection->execute($query);
        }

        function hasDateCache ($date,$locale) {
            // Recomendado uso de prepare statement 
            $connection = $this->conFactoryPDO;
            $query = $connection->query("SELECT count(dateInsertion) as countValues FROM JSONCache WHERE locale = :locale AND dateInsertion=:dateInsertion");
            $query->bindParam(':dateInsertion',$date, PDO::PARAM_STR);
            $query->bindParam(':locale',$locale, PDO::PARAM_STR);
            return $connection->execute($query)->fetch(PDO::FETCH_ASSOC);
        }  

        function cache ($locale) {
            // Recomendado uso de prepare statement 
            $connection = $this->conFactoryPDO;
            $query = $connection->query("SELECT jsonContent countValues FROM JSONCache WHERE locale = :locale");
            $query->bindParam(':locale',$locale, PDO::PARAM_STR);
            return $connection->execute($query)->fetch(PDO::FETCH_ASSOC);
        }  

        function query ($queryInsert) {
            $connection = $this->conFactoryPDO;
            $query = $connection->query($queryInsert);
            $connection->execute($query);
        }
    }
?>