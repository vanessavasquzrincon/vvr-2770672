<?php

    // - - - - - - - - - - - - - - - - - - - - 
    // Connection
    try {
        $conx = new PDO("mysql:host=".HOST.";dbname=".DBNAME."", USER, PASS);

        // if ($conx) {
        //     echo "<h4>Connection DB Success ✅ </h4>";
        // }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // - - - - - - - - - - - - - - - - - - - - 
    // login user
    function loginUser($conx, $email, $pass) {
        try {
            $sql = "SELECT * FROM users
                    WHERE email = :email LIMIT 1";
            $stm = $conx->prepare($sql);
            $stm->execute(['email' => $email]);

            if ($stm->rowCount() > 0) {
                $user = $stm->fetch();
                if (password_verify($pass, $user['PASSWORD'])) {
                    $_SESSION['uid'] = $user['id'];
                    return true;
                }else{
                    $_SESSION['error'] = "Email or Password incorrect, please try again";
                    return false;
                }
            }else{
                $_SESSION['error'] = "Email or Password incorrect, please try again";
                return false;
            }
            

            //return $stm->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

?>

