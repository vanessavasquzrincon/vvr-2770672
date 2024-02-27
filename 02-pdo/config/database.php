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


//get record

function getPet($conx, $id){
    try{
        $sql = "SELECT * FROM pets WHERE id = :id";
        $stm = $conx->prepare($sql);
        $stm->execute(['id' => $id]);
        return $stm->fetch();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

//update pet

function updatePet($conx, $data){
    try {
        if(count($data) == 7){
            $sql = "UPDATE pets SET name=:name, type=:type, age=:age, weight=:weight, breed=:breed, city=:city WHERE id = :id";
        } else {
            $sql = "UPDATE pets SET name=:name, photo=:photo, type=:type, age=:age, weight=:weight, breed=:breed, city=:city WHERE id = :id";
        }
        
        $smt = $conx->prepare($sql);

        if ($smt->execute($data)){
            $_SESSION['msg'] = 'The ' . $data['name'] . ' pet was updated successfully'; 
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// - - - - - - - - - - - - - - - - - - - - 
    // delete Record
    function deletePet($conx, $id) {
        try {
            $sql = "DELETE FROM pets WHERE id = :id";
            $stm = $conx->prepare($sql);
            if($stm->execute(['id' => $id])) {
                $_SESSION['msg'] = 'The pet was deleted successfully.' ;
                return true;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }