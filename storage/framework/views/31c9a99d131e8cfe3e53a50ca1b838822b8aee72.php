<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="NewModern Team" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <link rel="icon" href="<?php echo e(asset('backend/images/favicon-32x32.png')); ?>">
    <title>NewModern</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/bootstrap.min.css')); ?>">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/blue.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/owl.carousel.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/owl.transitions.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/rateit.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/bootstrap-select.min.css')); ?>">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/font-awesome.css')); ?>">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
        rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Toaster Stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">


</head>

<body class="cnt-home">



    <!-- ============================================== HEADER ============================================== -->

    <?php echo $__env->make('frontend.body.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Chamar o HEADER. Assim todas as páginas terão mesmo conteúdo HEADER |**FRAGMENTAÇÃO** -->

    <!-- ============================================== HEADER : END ============================================== -->

    <!-- yield('content') é onde fica o conteúdo (que muda de página p/ pagina) -->

    <?php echo $__env->yieldContent('content'); ?>

    <!-- ============================================================= FOOTER ============================================================= -->

    <?php echo $__env->make('frontend.body.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Chamar o FOOTER. Assim todas as páginas terão mesmo conteúdo footer | **FRAGMENTAÇÃO** -->

    <!-- ============================================================= FOOTER : END============================================================= -->



    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="<?php echo e(asset('frontend/assets/js/jquery-1.11.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/echo.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/jquery.easing-1.3.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/bootstrap-slider.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/jquery.rateit.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend/assets/js/lightbox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/bootstrap-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/scripts.js')); ?>"></script>

    <!-- Script para mostrar as mensagens toaster para o admin. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        <?php if(Session::has('message')): ?>
            var type = "<?php echo e(Session::get('alert-type', 'info')); ?>"
            switch (type) {

                case 'info':
                    toastr.info(" <?php echo e(Session::get('message')); ?> ");
                    break;

                case 'success':
                    toastr.success(" <?php echo e(Session::get('message')); ?> ");
                    break;

                case 'warning':
                    toastr.warning(" <?php echo e(Session::get('message')); ?> ");
                    break;

                case 'error':
                    toastr.error(" <?php echo e(Session::get('message')); ?> ");
                    break;

            }
        <?php endif; ?>
    </script>
</body>

</html>
<?php /**PATH /home/lucas/newmodern-store/resources/views/frontend/main_master.blade.php ENDPATH**/ ?>