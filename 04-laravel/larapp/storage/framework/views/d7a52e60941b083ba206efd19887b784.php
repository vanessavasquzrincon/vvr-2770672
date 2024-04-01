<?php $__env->startSection('title', 'Forgot password Page - PetsApp'); ?>

<?php $__env->startSection('content'); ?>
<header class="nav level-2">
    <a href="<?php echo e(url('login')); ?>">
        <img src="<?php echo e(asset('images/ico-back.svg')); ?>" alt="Back">
    </a>
    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo">
    <a href="javascript:;" class="mburger">
        <img src="<?php echo e(asset('images/mburger.svg')); ?>" alt="Menu Burger">
    </a>
</header>
<section class="create">
    <h1>Forgot Password</h1>
    <form method="POST" action="<?php echo e(route('password.email')); ?>">
        <?php echo csrf_field(); ?>
        
        <input type="email" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>">
        <button type="submit">Password Reset</button>
    </form>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php if(count($errors->all()) > 0): ?>
    <?php $error = '' ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $error .= '<li>' . $message . '</li>' ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <script>
    $(document).ready(function () {
        Swal.fire({
            position: "top-end",
            title: "Ops!",
            html: `<?php echo $error ?>`,
            icon: "error",
            showConfirmButton: false,
            timer: 5000
        })
    })
    </script>
<?php endif; ?>
<?php if(session('status')): ?>
        <script>
        $(document).ready(function () {
            Swal.fire({
                position: "top-end",
                title: "Great job!",
                text: "<?php echo e(session('status')); ?>",
                icon: "success",
                showConfirmButton: false,
                timer: 5000
            })
        })
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\vanessa\vvr-2770672\04-laravel\larapp\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>