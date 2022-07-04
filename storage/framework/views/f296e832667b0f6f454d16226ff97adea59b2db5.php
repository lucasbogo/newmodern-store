<?php $__env->startSection('content'); ?>
    <!-- Query Builder -->
    <?php
    $user = DB::table('users')
        ->where('id', Auth::user()->id)
        ->first();
    ?><!-- /query builder -->


    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2"><br><br>
                    <img class="card-img-top" style="border-radius: 50%"
                        src="<?php echo e(!empty($user->profile_photo_path)
                            ? url('upload/user_images/' . $user->profile_photo_path)
                            : url('upload/no-image.png')); ?>"
                        style=" width: 100px; height: 100px;"><br><br>
                    <!-- bootstrap class list-group e list-group-flush -->
                    <ul class="list-group list-group-flush">
                        <!-- botão primário pequeno -->
                        <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="<?php echo e(route('user.profile')); ?>" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="<?php echo e(route('change.password')); ?>" class="btn btn-primary btn-sm btn-block">Change
                            Password</a>
                        <a href="<?php echo e(route('user.logout')); ?>" class="btn btn-danger btn-sm btn-block">Logout</a>

                    </ul>


                </div><!-- /col -->

                <div class="col-md-2">


                </div><!-- /col -->

                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Mudar Senha</span><strong>
                            </strong></h3>

                        <div class="card-body">
                            <form method="post" action="<?php echo e(route('user.password.update')); ?>">
                                <?php echo csrf_field(); ?>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputemail1">Current Password
                                        <span>*</span></label>
                                    <input type="password" id="current_password" name="oldpassword"
                                        class="form-control unicase-form-control text-input">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputemail1">New Password <span>*</span></label>
                                    <input type="password" id="password" name="password"
                                        class="form-control unicase-form-control text-input">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputemail1">Password Confirmation
                                        <span>*</span></label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control unicase-form-control text-input">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Update</button>

                                </div><!-- /div button -->
                            </form><!-- end form method post -->

                        </div><!-- /div class "card-body" -->
                    </div><!-- /div class="card" -->


                </div><!-- /col -->

            </div><!-- /row -->
        </div><!-- /container -->
    </div><!-- /content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.main_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lucas/newmodern-store/resources/views/frontend/profile/change_password.blade.php ENDPATH**/ ?>