<html>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="<?php echo e(asset('assets/css/app.css')); ?>">
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $__env->yieldContent('title'); ?></title>
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div id="wrapper" class="">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="<?php echo e(url('/')); ?>">
                Project Test
            </a>
        </li>
        <li>
          <a href="<?php echo e(url('/')); ?>">Dashboard</a>
        </li>
        <li>
          <a href="<?php echo e('/apartement'); ?>">Apartement</a>
        </li>
        <li>
          <a href="#">Setting</a>
        </li>
        <li>
          <a href="#">Profile</a>
        </li>
      </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <?php echo $__env->yieldContent('content'); ?>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- jQuery -->
  <script src="https://stacksnippets.net/js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="https://stacksnippets.net/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
      
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});
  </script>

  <!-- Menu Toggle Script -->
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;

</body>

</html><?php /**PATH C:\xampp\htdocs\test2\resources\views/layout/_app.blade.php ENDPATH**/ ?>