<!-- Extender main_master localizado em views/frontend (fragmentação frontend) -->
@extends('frontend.main_master')
@section('content')
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class="active">Login</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->


    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->
                <div class="col-md-6 col-sm-6 sign-in">
                    <h4 class="">Sign in</h4>
                    <p class="">Hello, Welcome to your account.</p>

                    <!-- LOGIN VIA REDES SOCIAIS
                                            <div class="social-sign-in outer-top-xs">
                                                <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                                                <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
                                            </div>
                                            -->

                    <!-- IMPORTANTE: formulario de LOGIN usuario-->

                    <!--isset($guard) pega o 'guard' admin + /login (admin/login)
                                                                                        caso contrário, pega o login comum | serve como Multi Auth admin - user-->
                    <form method="POST" action="{{ isset($guard) ? url($guard . '/login') : route('login') }}">
                        @csrf

                        <!--Alterar name, type e id  para funcionar com BD-->
                        <div class="form-group">
                            <label class="info-title" for="exampleInputemail1">Email Address <span>*</span></label>
                            <input type="email" id="email" name="email"
                                class="form-control unicase-form-control text-input">
                        </div>

                        <!--Alterar name, type e id  para funcionar com BD-->
                        <div class="form-group">
                            <label class="info-title" for="exampleInputpassword1">Password <span>*</span></label>
                            <input type="password" id="password" name="password"
                                class="form-control unicase-form-control text-input">
                        </div>
                        <div class="radio outer-xs">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Remember me!
                            </label>
                            <!-- Rota definida para recuperação de senha. foi utilizada a rota default do Laravel -->
                            <a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your
                                Password?</a>
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                    </form>
                </div>
                <!-- Sign-in -->

                <!-- create a new account -->
                <div class="col-md-6 col-sm-6 create-new-account">
                    <h4 class="checkout-subtitle">Create a new account</h4>
                    <p class="text title-tag-line">Create your new account.</p>


                    <!-- IMPORTANTE: formulario de REGISTRO usuario-->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- NOME -->
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                            <input type="text" id="name" name="name"
                                class="form-control unicase-form-control text-input">

                            <!-- mensagem erro PREENCHIMENTO OBRIGATÓRIO. Deixar RED -->
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <!-- EMAIL -->
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                            <input type="email" id="email" name="email"
                                class="form-control unicase-form-control text-input">

                            <!-- toaster, mensagem PREENCHIMENTO OBRIGATÓRIO. Deixar RED -->
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <!-- TELEFONE -->
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
                            <input type="text" id="phone" name="phone"
                                class="form-control unicase-form-control text-input">

                            <!-- toaster, mensagem erro PREENCHIMENTO OBRIGATÓRIO. Deixar RED -->
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- SENHA -->
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
                            <input type="password" id="password" name="password"
                                class="form-control unicase-form-control text-input">

                            <!-- toaster, mensagem erro PREENCHIMENTO OBRIGATÓRIO. Deixar RED -->
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <!-- CONFIRMAÇÃO DE SENHA -->
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control unicase-form-control text-input" id="exampleInputEmail1">

                            <!-- toaster, mensagem erro PREENCHIMENTO OBRIGATÓRIO. Deixar RED -->
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
                    </form>

                </div>
            </div>


            <!--FINAL create a new account -->
        </div><!-- /.row -->
    </div><!-- FINAL sigin-in-->

    <!-- INCLUSÃO DAS LOGOMARCAS -->
    @include('frontend.body.brands')
@endsection
