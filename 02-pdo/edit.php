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
    <title>Edit Pets</title>
    <link rel="stylesheet" href="/01-UI/css/master.css">
</head>
<body class="container">
    <main>
        <header class="nav level-1">
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
        <section class="edit">
            <h1>Edit Pets</h1>
            <form action="" class="form_add" method="post" enctype="multipart/form-data"  aria-required="">
                    <input type="hidden" name="id" value="<?=$pet['id']?>"> 
                    <img src="<?php echo URLIMGS . "/" . $pet['photo']?>" alt="" id="upload" width="300px">
                    <input type="file" name="photo" id="photo" accept="image/*">
                    <input type="text" name="name" placeholder="Name"  value="<?=$pet['name']?>">
                    <input type="phone" name="type" placeholder="Type" value="<?=$pet['type']?>" required>
                    <input type="text" name="age" placeholder="Age" value="<?=$pet['age']?> Years old" >
                    <input type="text" name="weight" placeholder="Weight" value="<?=$pet['weight']?> Lbs">
                    <input type="text" name="breed" placeholder="Breed" value="<?=$pet['breed']?>">
                    <input type="text" name="city" placeholder="City" value="<?=$pet['city']?>">
    

                    <button type="submit">UPDATE</button>


            </form>
            <?php
                if($_POST){
                    if (!empty($_FILES['photo']['name'])){
                        $photo =  time() . "." . pathinfo($_FILES ['photo']['name'], PATHINFO_EXTENSION);
                        $data = [
                            'id'     => $_POST['id'],
                            'photo'  => $photo,
                            'name'   => $_POST['name'],
                            'type'   => $_POST['type'],
                            'age'    => $_POST['age'],
                            'weight' => $_POST['weight'],
                            'breed'  => $_POST['breed'],
                            'city'   => $_POST['city']
                        ];
                    } else {
                        $data = [
                            'id'     => $_POST['id'],
                            'name'   => $_POST['name'],
                            'type'   => $_POST['type'],
                            'age'    => $_POST['age'],
                            'weight' => $_POST['weight'],
                            'breed'  => $_POST['breed'],
                            'city'   => $_POST['city']
                        ];
                    }


                    echo count($data);

                    //echo var_dump($data);

                    if (updatePet($conx, $data)) {
                        if (!empty($_FILES['photo']['name'])){
                            move_uploaded_file($_FILES['photo']['tmp_name'], "../01-UI/images/" . $photo);
                        }
                        header("Location: index.php");
                        exit(); // Always exit after a header redirect
                    }
                }
?>

                    
        </section>
            
    </main>
    
    <script src="/01-UI/js/jquery-3.7.1.min.js"></script>
    <script src="/01-UI/js/sweetalert2.js"></script>
    <script>
        $(document).ready(function () {
            $('#upload').click(function (e) {
                e.preventDefault();
                $('#photo').click();
            });
    
            $('#photo').change(function (e) {
                e.preventDefault();
                let reader = new FileReader();
                reader.onload = function (event) {
                    $('#upload').attr('src', event.target.result); // Utilizar event.target.result en lugar de readAsBinaryString
                };
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
    
    
</body>
</html>