<?php

    require "config/app.php";
    require "config/database.php";

    $pets =  getAllPets($conx);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module Pets</title>
    <link rel="stylesheet" href="<?php echo URLCSS. "/master.css"?>">
</head>
<body class="container">
    <main>
        <header class="nav level-0">
            <a href="/01-UI/dashboard.html">
                <img src="<?php echo URLIMGS . "/ico-back.png" ?>" alt="Back">
            </a>
            <img src="/01-UI/images/logo.png" alt="Logo">
            <a href=""> 
                
            </a>
            <a href="" class="mburguer">
                <img src="<?php echo URLIMGS . "/mburguer.svg" ?>" alt="">
            </a>
                
        </header>
        <section class="dashboard">
            <h1>MODULE PETS</h1>
            <a href="add.html" class="add">
                <img src="/01-UI/images/ico-add.svg" width="30px" alt="">
                Add Pets
            </a>
         
        </section>
        <table>
            <tbody>
                            <?php  foreach($pets as $pet):?>

            
                            <tr>
                                <td><img src="/01-UI/images/p3.png" alt=""></td>
                                <td>
                                    <span><?php echo $pet['name'] ?></span>
                                    <span><?php echo $pet['kind'] ?></span>
                                </td> 
                                <td>
                                    <a href="/01-UI/html/pets/show.html" class="show"><img src="<?php echo URLIMGS . "/ico-view.svg" ?>" alt="show"></a>
                                    <a href="/01-UI/html/pets/edit.html" class="edit"><img src= "<?php echo URLIMGS . "/ico-edit.svg" ?>" alt="Edit"></a>
                                    <a href="javascript:;" class="delete"><img src="<?php echo URLIMGS . "/ico-delete.svg" ?>" alt="Delete"></a>
                                </td>
                            </tr>
                    

                <?php  endforeach?>

                
                
            </tbody>
        </table>
    </main>
    <script src="/01-UI/js/sweetalert2.js"></script>
    <script src="/01-UI/js/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $('body').on('click', '.delete', function () {
                Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3C096C",
                cancelButtonColor: "#3C096C",
                confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success",
                    confirmButtonColor: "#3C096C"
                    });
                }
                });
                
            });
           
        });
    </script>

    
</body>
</html>


