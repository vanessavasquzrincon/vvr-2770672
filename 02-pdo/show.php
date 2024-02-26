<?php

    require "config/app.php";
    require "config/database.php";

    $pet= getPet($conx, $_GET['id']);

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Pets</title>
    <link rel="stylesheet" href="/01-UI/css/master.css">
</head>
<body class="container">
    <main>
        <header class="nahtmlv level-1">
            <a href="index.php">
                <img src="/01-UI/images/icon-back.png" alt="Back">
            </a>
            <img src="/01-UI/images/logo.png" alt="Logo">
            <a href=""> 
                
            </a>
            <a href="" class="mburguer">
                <img src="/01-UI/images/mburguer.svg" alt="">
            </a>
                
        </header>
        <section class="show">
            <h1>Show Pets</h1>
            <img src="<?php echo URLIMGS . "/" . $pet['photo']?>" alt="" width="250px" class="show-img">
            <div class="info">
                <p><?=$pet['name']?></p>
                <p><?=$pet['type']?></p>
                <p><?=$pet['age']?> Years Old </p>
                <p><?=$pet['weight']?> Lbs</p>
                <p><?=$pet['breed']?></p>
                <p><?=$pet['city']?></p>
            </div>
            
                    
        </section>
            
    </main>
    
    <script src="/01-UI/js/jquery-3.7.1.min.js"></script>
    <script src="/01-UI/js/sweetalert2.js"></script>
   
    
    
</body>
</html>