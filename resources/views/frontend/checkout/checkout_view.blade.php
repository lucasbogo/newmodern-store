@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
    @if (session()->get('language') == 'portuguese')
        NewModern | Checkout
    @else
        NewModern | Checkout
    @endif
@endsection


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>
                    @if (session()->get('language') == 'portuguese')
                        Checkout
                    @else
                        Checkout
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>


<!--=================== CHECKOUT MAIN CONTENT =================== -->
<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel-group checkout-steps" id="accordion">

                        <div class="panel panel-default checkout-step-01">


                            <!--===================== CABEÇALHO DO PAINEL(ESTÉTICA OPCIONAL) ===================== -->
                            {{-- <div class="panel-heading">
                                <h4 class="unicase-checkout-title">
                                    <a data-toggle="collapse" class="" data-parent="#accordion"
                                        href="#collapseOne">
                                        <span>1</span>
                                        @if (session()->get('language') == 'portuguese')
                                            Método de Checkout
                                        @else
                                            Checkout Method
                                        @endif
                                    </a>
                                </h4>
                            </div> --}}
                            <!--===================== /CABEÇALHO DO PAINEL (ESTÉTICA OPCIONAL) ===================== -->

                            <div id="collapseOne" class="panel-collapse collapse in">


                                <div class="panel-body">
                                    <div class="row">


                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <h4 class="checkout-subtitle"><b>
                                                    @if (session()->get('language') == 'portuguese')
                                                        SEUS DADOS DE ENTREGA
                                                    @else
                                                        YOUR SHIPPING DATA
                                                    @endif

                                            </h4><br>

                                            <form class="register-form" role="form">
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">
                                                        @if (session()->get('language') == 'portuguese')
                                                            Nome Completo
                                                        @else
                                                            Full Name
                                                        @endif
                                                        <span>*</span>
                                                    </label>
                                                    <input type="text" name="shipping_name"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" placeholder="" 
                                                        value="{{ Auth::user()->name }}" required="">
                                                </div>

                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">
                                                        @if (session()->get('language') == 'portuguese')
                                                            Email
                                                        @else
                                                            Email Address
                                                        @endif
                                                        <span>*</span>
                                                    </label>
                                                    <input type="email" name="shipping_email"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" placeholder=""
                                                        value="{{ Auth::user()->email }}" required="">
                                                </div>

                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">
                                                        @if (session()->get('language') == 'portuguese')
                                                            Telefone
                                                        @else
                                                            Phone
                                                        @endif
                                                        <span>*</span>
                                                    </label>
                                                    <input type="text" name="shipping_phone"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" placeholder=""
                                                        value="{{ Auth::user()->phone }}" required="">
                                                </div>

                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">
                                                        @if (session()->get('language') == 'portuguese')
                                                            CEP
                                                        @else
                                                            Postal Code
                                                        @endif
                                                        <span>*</span>
                                                    </label>
                                                    <input type="text" name="postal_code"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" placeholder="xxxx-xx" required="">

                                                </div>

                                            </form>

                                        </div>



                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <h4 class="checkout-subtitle">Already registered?</h4>
                                            <p class="text title-tag-line">Please log in below:</p>
                                            <form class="register-form" role="form">
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Email Address
                                                        <span>*</span>
                                                    </label>
                                                    <input type="email"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" placeholder="">
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputPassword1">Password
                                                        <span>*</span>
                                                    </label>
                                                    <input type="password"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputPassword1" placeholder="">
                                                    <a href="#" class="forgot-password">Forgot your Password?</a>
                                                </div>

                                                <button type="submit"
                                                    class="btn-upper btn btn-primary checkout-page-button">Login
                                                </button>
                                            </form>

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--=================== CHECKOUT SIDEBAR (PROGRESSO) =================== -->
                <div class="col-md-4">
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        @if (session()->get('language') == 'portuguese')
                                            Produto(s)
                                        @else
                                            Product(s)
                                        @endif
                                    </h4>
                                </div>
                                <div class="">





                                    <ul class="nav nav-checkout-progress list-unstyled">
                                        <!-- ==== BLOCO FOR EACH: chamar itens carrinho (página dinâmica) ==== -->
                                        @foreach ($carts as $item)
                                            <li>
                                                <strong>
                                                    @if (session()->get('language') == 'portuguese')
                                                        <!--=== TEXTO PTBR: IMAGEM  (ESTÉTICA OPCIONAL) ===-->
                                                    @else
                                                        <!--=== TEXTO EN: IMAGE  (ESTÉTICA OPCIONAL) ===-->
                                                    @endif
                                                </strong>
                                                <img src="{{ asset($item->options->image) }}"
                                                    style="width:50px; height:50px;">
                                            </li>
                                            <br>
                                            <li>
                                                <strong>
                                                    @if (session()->get('language') == 'portuguese')
                                                        Valor produto:
                                                    @else
                                                        Price:
                                                    @endif
                                                </strong>
                                                R$ {{ $item->price }}
                                            </li>
                                            <li>
                                                <strong>
                                                    @if (session()->get('language') == 'portuguese')
                                                        Quantidade:
                                                    @else
                                                        Quantity:
                                                    @endif
                                                </strong>
                                                {{ $item->qty }}
                                            </li>

                                            <li>
                                                <strong>
                                                    @if (session()->get('language') == 'portuguese')
                                                        Cor:
                                                    @else
                                                        Color:
                                                    @endif
                                                </strong>
                                                {{ $item->options->color }}
                                            </li>
                                            <li>
                                                <strong>
                                                    @if (session()->get('language') == 'portuguese')
                                                        Tamanho:
                                                    @else
                                                        Size:
                                                    @endif
                                                </strong>
                                                {{ $item->options->size }}

                                            </li>
                                            <hr>
                                        @endforeach
                                        <hr>

                                        <li>
                                            {{-- CONDIÇÃO (FUTURO): se cupom foi tilizado,autenticar pela sessão e mostrar a lógica valor final
                                                caso contrário, seguir checkout normalmente --}}
                                            @if (Session::has('coupon'))
                                                <strong>
                                                    @if (session()->get('language') == 'portuguese')
                                                        Subtotal:
                                                    @else
                                                        Subtotal:
                                                    @endif
                                                </strong>
                                                {{ $cartTotal }}
                                                <hr>

                                                <strong>
                                                    @if (session()->get('language') == 'portuguese')
                                                        Cupom Utilizado:
                                                    @else
                                                        Coupom Applied:
                                                    @endif
                                                </strong>
                                                <!-- === PEGAR NOME CUPOM UTILIZADO NA SESSÃO === -->
                                                {{ session()->get('coupon')['coupon_name'] }}


                                                <strong>
                                                    @if (session()->get('language') == 'portuguese')
                                                        Desconto:
                                                    @else
                                                        Discount:
                                                    @endif
                                                </strong>
                                                <!-- === PEGAR A PERCENTAGEM DO CUPOM === -->
                                                {{ session()->get('coupon')['discount_amount'] }}

                                                <strong>
                                                    @if (session()->get('language') == 'portuguese')
                                                        Total com Desconto:
                                                    @else
                                                        Total Amount:
                                                    @endif
                                                </strong>
                                                <!-- === PEGAR A PERCENTAGEM DO CUPOM === -->
                                                {{ session()->get('coupon')['total_amount'] }}
                                                <hr>
                                            @else
                                                <strong>
                                                    @if (session()->get('language') == 'portuguese')
                                                        Total:
                                                    @else
                                                        Total:
                                                    @endif
                                                </strong>
                                                {{ $cartTotal }}

                                                <!-- OPCIONAL: MOSTRAR TOTAL. APÓS SUBTOTAL (SÓ DESCOMENTAR) -->
                                                {{-- <strong>
                                                    @if (session()->get('language') == 'portuguese')
                                                        Total:
                                                    @else
                                                        Total:
                                                    @endif
                                                </strong>
                                                {{ $cartTotal }} --}}
                                                <hr>
                                            @endif

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('frontend.body.brands')
    </div>

@endsection