<?php $__env->startSection('admin'); ?>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Utilizei o a recuperação de senha default do JETSTREAM localizado
                                     em views/profile/update-passwors-form.blade.php -->

    <div class="content-wrapper" style="min-height: 326px;">
        <div class="container-full">

            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Edit Password</h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">

                                <!--IMPORTANTE: Validar dados | Subir dados p/ BD |Rota POST  p/ admin.profile.store em /routes/web.php-->
                                <form method="post" action="<?php echo e(route('update.change.password')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <!-- crsf = SEGURANÇA: impede ataques CROSS SITE REQUEST FORGERY -->


                                    <div class="row">
                                        <div class="col-12">

                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <h5>Current Password<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="password" id="current_password" name="oldpassword"
                                                                class="form-control" required="" value="">

                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <h5>New Password<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="password" id="password" name="password"
                                                                class="form-control" required="" value="">

                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <h5>Confirm Password<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="password" id="password_confirmation"
                                                                name="password_confirmation" class="form-control" required=""
                                                                value="">

                                                        </div>
                                                    </div>

                                                </div><!-- end col md 6 -->


                                            </div><!-- end row -->

                                            <div class="row">
                                                <div class="col-md-6">

                                                    <!-- Submit Button -->
                                                    <div class="text-xs-right">
                                                        <input type="submit"
                                                            class="btn btn-rounded btn-primary mb-5"value="Update">
                                                    </div>
                                                </div>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lucas/newmodern-store/resources/views/admin/admin_change_password.blade.php ENDPATH**/ ?>