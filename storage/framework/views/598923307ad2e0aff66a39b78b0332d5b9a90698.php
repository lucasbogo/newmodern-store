<!-- Extender main_master localizado em views/frontend (fragmentação frontend) -->

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class="active">Reset Password</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->

    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <div class="col-md-6 col-sm-6 sign-in">
                    <h4 class="">Recover Password</h4>
                    <p class="">Forgot your Password? No problem!</p>

                    <!-- UPDATE DE SENHA-->
                    <form method="POST" action="<?php echo e(route('password.update')); ?>">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="token" value="<?php echo e($request->route('token')); ?>">

                        <div class="form-group">
                            <label class="info-title" for="exampleInputpassword1">Email Address <span>*</span></label>
                            <input type="email" id="email" name="email"
                                class="form-control unicase-form-control text-input">
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="exampleInputpassword1">Password <span>*</span></label>
                            <input type="password" id="password" name="password"
                                class="form-control unicase-form-control text-input">
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="exampleInputpassword1">Confirm Password <span>*</span></label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control unicase-form-control text-input">
                        </div>

                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset
                            Password</button>
                    </form>
                </div>


            </div><!-- /.row -->
        </div><!-- FINAL RECUPERAÇÃO SENHA VIA EMAIL-->

        <!-- INCLUSÃO DAS LOGOMARCAS -->
        <?php echo $__env->make('frontend.body.brands', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.main_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lucas/newmodern-store/resources/views/auth/reset-password.blade.php ENDPATH**/ ?>