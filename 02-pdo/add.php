<?php

    require "config/app.php";
    require "config/database.php";

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pets</title>
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
        <section class="create">
            <h1>Add Pets</h1>
            <form action="" class="form_add" method="post" aria-required="" enctype="multipart/form-data">
                    <img src="/01-UI/images/ico-pets.svg" alt="" id="upload" width="200px">
                    <input type="file" name="photo" id="photo" accept="image/*">
                    <input type="text" name="name" placeholder="Name"  >
                    <input type="text" name="type" placeholder="Type" required>
                    <input type="text" name="age" placeholder="Age" >
                    <input type="text" name="weight" placeholder="Weight" >
                    <input type="text" name="breed" placeholder="Breed" >
                    <input type="text" name="city" placeholder="City" >

                    <button type="submit">ADD</button>


            </form>

            <?php
                if ($_POST){
                    $photo =  time() . "." . pathinfo($_FILES ['photo']['name'], PATHINFO_EXTENSION);
                    
                    $data = [
                        'photo' => $photo,
                        'name'  => $_POST['name'],
                        'type'  => $_POST['type'],
                        'age'   => $_POST['age'],
                        'weight' => $_POST['weight'],
                        'breed' => $_POST['breed'],
                        'city'  => $_POST['city']
                    ];
                    //echo var_dump($data);

                    

                    if (addPet($conx, $data)) {
                        move_uploaded_file($_FILES['photo']
                        ['tmp_name'], "../01-UI/images/" . $photo);

                    } else {
                    }
                }
            ?>
            
                    
        </section>
            
    </main>
    
    <script src="<?php echo URLJS . "/sweetalert2.js" ?>"></script>
    <script src="<?php echo URLJS . "/jquery-3.7.1.min.js" ?>"></script>
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