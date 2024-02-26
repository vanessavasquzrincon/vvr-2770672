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
            <a href="add.php" class="add">
                <img src="/01-UI/images/ico-add.svg" width="30px" alt="">
                Add Pets
            </a>
         
        </section>
        <table>
            <tbody>
                            <?php  foreach($pets as $pet):?>

            
                            <tr>
                                <td><img src="<?php echo URLIMGS . "/" . $pet['photo'] ?>" alt=""></td>
                                <td>
                                    <span><?php echo $pet['name'] ?></span>
                                    <span><?php echo $pet['type'] ?></span>
                                </td> 
                                <td>
                                    <a href="show.php?id=<?=$pet['id']?>" class="show"><img src="<?php echo URLIMGS . "/ico-view.svg" ?>" alt="show"></a>
                                    <a href="edit.php?id=<?=$pet['id']?>" class="edit"><img src= "<?php echo URLIMGS . "/ico-edit.svg" ?>" alt="Edit"></a>
                                    <a href="javascript:;" class="delete" data-id="<?=$pet['id']?>"><img src="<?php echo URLIMGS . "/ico-delete.svg" ?>" alt="Delete"></a>
                                </td>
                            </tr>
                    

                <?php  endforeach?>

                
                
            </tbody>
        </table>
    </main>
    <script src="<?php echo URLJS . "/sweetalert2.js" ?>"> </script>
    <script src= "<?php echo URLJS . "/jquery-3.7.1.min.js" ?>"> </script>
    <script>
        $(document).ready(function () {
            

                <?php if(isset($_SESSION['msg'])): ?>
                  Swal.fire({
                    title: "Congratulations!",
                    text: "<?php echo $_SESSION['msg'] ?>",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 5000
                    })
                    <?php unset($_SESSION['msg'])?>
                <?php endif ?>

                $('body').on('click', '.delete', function () {

                    $id = $(this).attr('data-id')
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


