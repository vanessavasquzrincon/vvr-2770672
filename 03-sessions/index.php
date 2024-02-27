

<?php
    require "config/app.php";
    require "config/database.php";

    if (isset($_SESSION['uid'])){
        header("location: dashboard.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Users</title>
    <link rel="stylesheet" href="<?php echo URLCSS . "/master.css" ?>">
</head>
<body class="container">
    <main>
        <header>
            <img src="/01-UI/images/Login.png" alt="Logo">
        </header>
        <section class="login">
            <menu>
                <a href="javascript:;">Login</a>
                <a href="register.php">Register</a>
            </menu>
            <form action="login.php" class="form_login" method="post">
            <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>

            </form>
          

        </section>
    </main>
    <script src="<?php echo URLJS . "/sweetalert2.js" ?>"></script>
    <script src="<?php echo URLJS . "/jquery-3.7.1.min.js" ?>"></script>
    <script>
        $(document).ready(function () {

            <?php if(isset($_SESSION['error'])): ?>
                Swal.fire({
                    position: "top-end",
                    title: "Error",
                    text: "<?php echo $_SESSION['error'] ?>",
                    icon: "error",
                    showConfirmButton: false,
                    timer: 5000
                })
                <?php unset($_SESSION['error']) ?>
            <?php endif ?>

            $('body').on('click', '.delete', function () {
                $id = $(this).attr('data-id')
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#1f7a8c",
                    cancelButtonColor: "#1f7a8c",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.replace('delete.php?id=' + $id)
                    }
                })
            })
        })
    </script>
</body>
</html>

