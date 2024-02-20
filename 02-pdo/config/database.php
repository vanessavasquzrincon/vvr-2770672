<?php

// connection
    try{
        $conx = new PDO("mysql:host=".HOST.";dbname=".DBNAME."",USER, PASS);

        //if($conx){
           // echo "<h4> conection</h4>";
        //}
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
}


//get all records

function getAllPets($conx){
    try{
        $sql = "SELECT * FROM pets";
        $stm = $conx->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
