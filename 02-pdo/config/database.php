<?php

// connection
    try{
        $conx = new PDO("mysql:host=".HOST.";dbname=".DBNAME."",USER, PASS);

        
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



//add pet

function addPet($conx, $data){
    try {
        $sql = "INSERT INTO pets (photo, name, type, age, weight, breed, city)
                VALUES (:photo, :name, :type, :age, :weight, :breed, :city)";
        $smt = $conx->prepare($sql);

        if ($smt->execute($data)){
            $_SESSION['msg'] = 'The  ' . $data['name'] . ' pet was added successfully'; 
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
