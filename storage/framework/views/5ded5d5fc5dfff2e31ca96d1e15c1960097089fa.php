<?php $__env->startSection('content'); ?>


    <?php
    $user = DB::table('users')
        ->where('id', Auth::user()->id)
        ->first();
    ?>

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <br>
                    <img class="card-img-top" style="border-radius: 50%; width:100%"
                        src="<?php echo e(!empty($user->profile_photo_path)
                            ? url('upload/user_images/' . $user->profile_photo_path)
                            : url('upload/no-image.png')); ?>"
                        style=" width: 100px; height: 100px;">
                    <br>
                    <br>

                    <ul class="list-group list-group-flush">

                        <a href="<?php echo e(route('index')); ?>" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="<?php echo e(route('user.profile')); ?>" class="btn btn-primary btn-sm btn-block">
                            <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                            <?php if(session()->get('language') == 'portuguese'): ?>
                                Atualizar Perfil
                            <?php else: ?>
                                Profile Update
                            <?php endif; ?>
                        </a>

                        <a href="<?php echo e(route('change.password')); ?>" class="btn btn-primary btn-sm btn-block">
                            <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                            <?php if(session()->get('language') == 'portuguese'): ?>
                                Mudar Senha
                            <?php else: ?>
                                Change Password
                            <?php endif; ?>
                        </a>

                        <a href="<?php echo e(route('user.logout')); ?>" class="btn btn-danger btn-sm btn-block">
                            <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                            <?php if(session()->get('language') == 'portuguese'): ?>
                                Sair
                            <?php else: ?>
                                Logout
                            <?php endif; ?>
                        </a>

                    </ul>


                </div>

                <div class="col-md-2">

                    

                </div>

                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">
                                <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                <?php if(session()->get('language') == 'portuguese'): ?>
                                    Olá...
                                <?php else: ?>
                                    Hello...
                                <?php endif; ?>
                            </span><strong>
                                <?php echo e(Auth::user()->name); ?></strong>
                            <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                            <?php if(session()->get('language') == 'portuguese'): ?>
                                Bem Vindo à NewModern Ecommerce
                            <?php else: ?>
                                Welcome to NewModern Ecommerce
                            <?php endif; ?>
                        </h3>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.main_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lucas/newmodern-store/resources/views/dashboard.blade.php ENDPATH**/ ?>