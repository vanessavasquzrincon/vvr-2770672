<?php
require "config/app.php";
require "config/database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?php echo URLCSS . "/master.css" ?>">
</head>
<body>
    <main>
        <header>
            <img src="/01-UI/images/logo.png" alt="Logo">
        </header>
        <section class="register">
            <menu>
                <a href="index.php">Login</a>
                <a href="javascript:;">Register</a>
            </menu>
            
            
                
                    
         
        </section>
        <section class="create">
                    <form action=""  enctype="multipart/form-data" method="post">
                    <img src="/01-UI/images/ico-users.svg" alt="" id="upload" width="200px">
                    <input type="file" name="photo" id="photo" accept="image/*"  required>
                    <input type="number" name="document" placeholder="Document" required>
                    <input type="text" name="fullname" placeholder="Full Name" required>
                    <input type="text" name="phone" placeholder="Phone Number" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
            

                <button type="submit">Register</button>
            </form>

            <?php
                if ($_POST){
                    $photo =  time() . "." . pathinfo($_FILES ['photo']['name'], PATHINFO_EXTENSION);
                    $password =  password_hash($_POST['password'], PASSWORD_DEFAULT);
                    
                    $data = [
                        'document' => $_POST['document'],
                        'fullname'  => $_POST['fullname'],
                        'photo'  => $photo,
                        'phone'   => $_POST['phone'],
                        'email' => $_POST['email'],
                        'password' => $password,
                    
                    ];
                    //echo var_dump($data);

                    

                    if (addUser($conx, $data)) {
                        move_uploaded_file($_FILES['photo']
                        ['tmp_name'], "../01-UI/images/" . $photo);
                        header("Location: index.php");

                
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
