<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/app.css')); ?>">
        <title>Login</title>
    </head>
    
    <body>
        <div class="login-page">
        <div class="form">
            <?php if(session('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo e(session('error')); ?>

            </div>
            <?php endif; ?>
        <form class="login-form" action="<?php echo e(url('login')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="text" placeholder="username" name="username" value="<?php echo e(old('username')); ?>">
            <input type="password" placeholder="password" name="password">
            <button type="submit">Login</button>
            <p class="message">Not registered? <a href="<?php echo e(url('register')); ?>">Create an account</a></p>
        </form>
        </div>
        </div>
        <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
    </body>
</html><?php /**PATH C:\xampp\htdocs\test2\resources\views/auth/login.blade.php ENDPATH**/ ?>