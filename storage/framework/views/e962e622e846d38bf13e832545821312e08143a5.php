<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo e(asset('backend/images/favicon-new.ico')); ?>">

    <title>NewModern Admin - Entrar </title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/vendors_css.css')); ?>">

    <!-- Style-->
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/skin_color.css')); ?>">

</head>

<body class="hold-transition theme-primary bg-gradient-primary">

    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">

            <div class="col-12">
                <div class="row justify-content-center no-gutters">
                    <div class="col-lg-4 col-md-5 col-12">
                        <div class="content-top-agile p-10">
                            <!-- logo for regular state and mobile devices -->
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="<?php echo e(asset('backend/images/logo/logo.png')); ?>" width="200px" heigh="200px"
                                    alt="">
                            </div>
                            <h2 class="text-white">NewModern Admin</h2>
                            <p class="text-white-50">Entre para começar sua sessão.</p>
                        </div>
                        <div class="p-30 rounded30 box-shadowed b-2 b-dashed">

                            <!--Form updated-->
                            <form method="POST"
                                action="<?php echo e(isset($guard) ? url($guard . '/login') : route('login')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent text-white"><i
                                                    class="ti-user"></i></span>
                                        </div>
                                        <input type="email" id="email" name="email"
                                            class="form-control pl-15 bg-transparent text-white plc-white"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text  bg-transparent text-white"><i
                                                    class="ti-lock"></i></span>
                                        </div>
                                        <input type="password" id="password" name="password"
                                            class="form-control pl-15 bg-transparent text-white plc-white"
                                            placeholder="Senha">
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="checkbox text-white">
                                            <input type="checkbox" id="basic_checkbox_1">
                                            <label for="basic_checkbox_1">Lembre-me</label>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-6">
                                        <div class="fog-pwd text-right">
                                            <a href="<?php echo e(route('password.request')); ?>" class="text-white hover-info"><i
                                                    class="ion ion-locked"></i> Esqueceu a Senha?</a><br>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <br>
                                    <br>
                                    <br>

                                    <div class="col-12 text-center">
                                        <br>
                                        <br>
                                        <br>
                                        <button type="submit" class="btn btn-info btn-rounded mt-10">ENTRAR</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                            <br>
                            <br>


                            

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Vendor JS -->
    <script src="<?php echo e(asset('backend/js/vendors.min.js')); ?>"></script>
    <script src="<?php echo e(asset('../assets/icons/feather-icons/feather.min.js')); ?>"></script>

</body>

</html>
<?php /**PATH /home/lucas/newmodern-store/resources/views/auth/admin_login.blade.php ENDPATH**/ ?>