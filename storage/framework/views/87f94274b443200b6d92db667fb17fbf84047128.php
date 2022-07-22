<!-- Extender main_master localizado em views/frontend (fragmentação frontend) -->

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                <li class="active">
                    <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                    <?php if(session()->get('language') == 'portuguese'): ?>
                        Entrar
                    <?php else: ?>
                        Login
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
    < <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->
                <div class="col-md-6 col-sm-6 sign-in">
                    <h4 class="">
                        <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                        <?php if(session()->get('language') == 'portuguese'): ?>
                            Entrar
                        <?php else: ?>
                            Sign-in
                        <?php endif; ?>
                    </h4>
                    <p class="">
                        <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                        <?php if(session()->get('language') == 'portuguese'): ?>
                            Olá, Bem vindo à sua conta.
                        <?php else: ?>
                            Hello, Welcome to your account
                        <?php endif; ?>
                    </p>

                    <!-- LOGIN VIA REDES SOCIAIS
                            <div class="social-sign-in outer-top-xs">
                            <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                            <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
                            </div>
                            -->

                    <!-- IMPORTANTE: formulario de LOGIN usuario-->

                    <!--isset($guard) pega o 'guard' admin + /login (admin/login)
                                        caso contrário, pega o login comum | serve como Multi Auth admin - user -->

                    <form method="POST" action="<?php echo e(isset($guard) ? url($guard . '/login') : route('login')); ?>">
                        <?php echo csrf_field(); ?>

                        <!--Alterar name, type e id  para funcionar com BD-->
                        <div class="form-group">
                            <label class="info-title" for="exampleInputemail1">
                                <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                <?php if(session()->get('language') == 'portuguese'): ?>
                                    Endereço Email
                                <?php else: ?>
                                    Email Address
                                <?php endif; ?>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="email" id="email" name="email"
                                class="form-control unicase-form-control text-input">
                        </div>

                        <!--Alterar name, type e id  para funcionar com BD-->
                        <div class="form-group">
                            <label class="info-title" for="exampleInputpassword1">
                                <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                <?php if(session()->get('language') == 'portuguese'): ?>
                                    Senha
                                <?php else: ?>
                                    Password
                                <?php endif; ?>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="password" id="password" name="password"
                                class="form-control unicase-form-control text-input">
                        </div>
                        <div class="radio outer-xs">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                <?php if(session()->get('language') == 'portuguese'): ?>
                                    Lembre-me!
                                <?php else: ?>
                                    Remember me!
                                <?php endif; ?>
                            </label>
                            <!-- Rota definida para recuperação de senha. foi utilizada a rota default do Laravel -->
                            <a href="<?php echo e(route('password.request')); ?>" class="forgot-password pull-right">
                                <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                <?php if(session()->get('language') == 'portuguese'): ?>
                                    Esqueceu sua Senha?
                                <?php else: ?>
                                    Forgot you Password?
                                <?php endif; ?>
                            </a>
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">
                            <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                            <?php if(session()->get('language') == 'portuguese'): ?>
                                Entrar
                            <?php else: ?>
                                Login
                            <?php endif; ?>
                        </button>
                    </form>
                </div>
                <!-- Sign-in -->

                <!-- create a new account -->
                <div class="col-md-6 col-sm-6 create-new-account">
                    <h4 class="checkout-subtitle">
                        <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                        <?php if(session()->get('language') == 'portuguese'): ?>
                            Criar Nova Conta
                        <?php else: ?>
                            Create New Account
                        <?php endif; ?>
                    </h4>
                    <p class="text title-tag-line">
                        <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                        <?php if(session()->get('language') == 'portuguese'): ?>
                            Crie sua conta nova.
                        <?php else: ?>
                            Create your new account.
                        <?php endif; ?>
                    </p>


                    <!-- IMPORTANTE: formulario de REGISTRO usuario-->
                    <form method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo csrf_field(); ?>

                        <!-- NOME -->
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">
                                <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                <?php if(session()->get('language') == 'portuguese'): ?>
                                    Nome
                                <?php else: ?>
                                    Name
                                <?php endif; ?>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="name" name="name"
                                class="form-control unicase-form-control text-input">

                            <!-- mensagem erro PREENCHIMENTO OBRIGATÓRIO. Deixar RED -->
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div>

                        <!-- EMAIL -->
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail2">
                                <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                <?php if(session()->get('language') == 'portuguese'): ?>
                                    Endereço Email
                                <?php else: ?>
                                    Email Address
                                <?php endif; ?>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="email" id="email" name="email"
                                class="form-control unicase-form-control text-input">

                            <!-- toaster, mensagem PREENCHIMENTO OBRIGATÓRIO. Deixar RED -->
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div>

                        <!-- TELEFONE -->
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">
                                <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                <?php if(session()->get('language') == 'portuguese'): ?>
                                    Telefone
                                <?php else: ?>
                                    Phone Number
                                <?php endif; ?>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="phone" name="phone"
                                class="form-control unicase-form-control text-input">

                            <!-- toaster, mensagem erro PREENCHIMENTO OBRIGATÓRIO -->
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                            <!-- SENHA -->
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">
                                    <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                        Senha
                                    <?php else: ?>
                                        Password
                                    <?php endif; ?>
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" id="password" name="password"
                                    class="form-control unicase-form-control text-input">

                                <!-- toaster, mensagem erro PREENCHIMENTO OBRIGATÓRIO -->
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>


                            <!-- CONFIRMAÇÃO DE SENHA -->
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">
                                    <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                        Confirmar Senha
                                    <?php else: ?>
                                        Confirm Password
                                    <?php endif; ?>
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control unicase-form-control text-input" id="exampleInputEmail1">

                                <!-- toaster, mensagem erro PREENCHIMENTO OBRIGATÓRIO. Deixar RED -->
                                <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">
                                <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                <?php if(session()->get('language') == 'portuguese'): ?>
                                    Registrar
                                <?php else: ?>
                                    Sign Up
                                <?php endif; ?>
                            </button>

                    </form>
                </div>
            </div>
        </div>
        </div>

        <!-- INCLUSÃO DAS LOGOMARCAS -->
        <?php echo $__env->make('frontend.body.brands', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.main_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lucas/newmodern-store/resources/views/auth/login.blade.php ENDPATH**/ ?>