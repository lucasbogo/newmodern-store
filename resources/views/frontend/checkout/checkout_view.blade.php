@extends('frontend.main_master')
@section('content')

    <!-- JQuery CDN p/ trabalhar com JS Ajax (mostrar estado e Cidade dinamicamente no select field) -->
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
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title">
                                    <a data-toggle="collapse" class="" data-parent="#accordion"
                                        href="#collapseOne">
                                        <span><i class="fa fa-ship"></i></span>
                                        @if (session()->get('language') == 'portuguese')
                                            Informações de Envio
                                        @else
                                            Shipping Information
                                        @endif
                                    </a>
                                </h4>
                            </div>
                            <hr>

                            <!--===================== DADOS CLIENTE ===================== -->
                            <div id="collapseOne" class="panel-collapse collapse in">


                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <h4 class="checkout-subtitle"><b>
                                                    @if (session()->get('language') == 'portuguese')
                                                        SEUS DADOS
                                                    @else
                                                        YOUR SHIPPING DATA
                                                    @endif

                                            </h4><br>

                                            <form class="register-form" action="{{ route('checkout.store') }}"
                                                method="POST">
                                                @csrf

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
                                        </div>

                                        <!--===================== LÓGICA CORREIO ===================== -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <h4 class="checkout-subtitle"><b>ENDEREÇO</b></h4>



                                            <div class="form-group">
                                                <h5><b>
                                                        {{-- @if (session()->get('language') == 'portuguese')
                                                            Selecionar Estado
                                                        @else
                                                            Select State
                                                        @endif --}}
                                                        {{-- </b> <span class="text-danger">*</span> --}}
                                                </h5>
                                                <div class="controls">
                                                    <select name="shipping_division_id" class="form-control"
                                                        required="">
                                                        <option value="" selected="" disabled="">
                                                            @if (session()->get('language') == 'portuguese')
                                                                Estado
                                                            @else
                                                                State
                                                            @endif
                                                        </option>
                                                        @foreach ($divisions as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->shipping_division_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('shipping_division_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <h5><b>
                                                        {{-- @if (session()->get('language') == 'portuguese')
                                                            Selecionar Cidade
                                                        @else
                                                            Select City
                                                        @endif --}}
                                                        {{-- </b> <span class="text-danger">*</span> --}}
                                                </h5>
                                                <div class="controls">
                                                    <select name="shipping_district_id" class="form-control"
                                                        required="">
                                                        <option value="" selected="" disabled="">
                                                            @if (session()->get('language') == 'portuguese')
                                                                Cidade
                                                            @else
                                                                City
                                                            @endif
                                                        </option>

                                                    </select>
                                                    @error('shipping_district_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">
                                                    @if (session()->get('language') == 'portuguese')
                                                        Rua
                                                    @else
                                                        Street Name
                                                    @endif
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" name="shipping_street"
                                                    class="form-control unicase-form-control text-input"
                                                    id="exampleInputEmail1" placeholder="" required="">
                                            </div>

                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">
                                                    @if (session()->get('language') == 'portuguese')
                                                        Numero
                                                    @else
                                                        House Number
                                                    @endif
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" name="shipping_number"
                                                    class="form-control unicase-form-control text-input"
                                                    id="exampleInputEmail1" placeholder="" required="">
                                            </div>

                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">
                                                    @if (session()->get('language') == 'portuguese')
                                                        Bairro
                                                    @else
                                                        District
                                                    @endif
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" name="shipping_hood"
                                                    class="form-control unicase-form-control text-input"
                                                    id="exampleInputEmail1" placeholder="" required="">
                                            </div>



                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">
                                                    @if (session()->get('language') == 'portuguese')
                                                        CEP
                                                    @else
                                                        Postal Code
                                                    @endif
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" name="postal_code"
                                                    class="form-control unicase-form-control text-input"
                                                    id="exampleInputEmail1" placeholder="" required="">

                                            </div>

                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">
                                                    @if (session()->get('language') == 'portuguese')
                                                        Observações
                                                    @else
                                                        Observations
                                                    @endif
                                                    <span class="text-info">(Opcional)</span>
                                                </label>
                                                <textarea class="form-control" cols="30" rows="5" placeholder="..." name="notes"></textarea>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default checkout-step-02">
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title">
                                    <a data-toggle="collapse" class="collapsed" data-parent="#accordion"
                                        href="#collapseTwo">
                                        <span><i class="fa fa-credit-card"></i></span>
                                        @if (session()->get('language') == 'portuguese')
                                            Método de Pagamento
                                        @else
                                            Payment Method
                                        @endif
                                    </a>
                                </h4>
                            </div>
                            <hr>

                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Explicar condições, tempo de entrega, condições de retorno,
                                    Tipos de pagamento, etc...
                                    Inserir Imagens de cartões...
                                    Tentar deixar essa parte mais atraente

                                </div>
                                <br>

                                <div class="row">
                                    <!--=================== PAGAMENTO STRIPE (CC) =================== -->
                                    <div class="col-md-10">
                                        <input type="radio" name="payment_method" value="stripe">
                                        <label for="">
                                            @if (session()->get('language') == 'portuguese')
                                                Stripe teste
                                            @else
                                                Stripe testing
                                            @endif
                                        </label>
                                        {{-- <img src="{{ asset('frontend/assets/images/payments/4.png') }}">
                                        <img src="{{ asset('frontend/assets/images/payments/3.png') }}">
                                       <img src="{{ asset('frontend/assets/images/payments/2.png') }}"> --}}
                                    </div>
                                    <br>

                                    <!--=================== PAGAMENTO CARTÃO =================== -->
                                    <div class="col-md-10">
                                        <input type="radio" name="payment_method" value="card">
                                        <label for="">
                                            @if (session()->get('language') == 'portuguese')
                                                Cartão
                                            @else
                                                Card
                                            @endif
                                        </label>
                                    </div>

                                    <!--=================== PAGAMENTO PAYPAL =================== -->
                                    {{-- <div class="col-md-10">
                                        <input type="radio" name="payment_method" value="paypal">
                                        <label for="">
                                            PayPal
                                        </label>

                                      <img src="{{ asset('frontend/assets/images/payments/1.png') }}"> 
                                    </div> --}}

                                    <!--=================== PAGAMENTO PAYPAL =================== -->
                                    <div class="col-md-10">
                                        <input type="radio" name="payment_method" value="card">
                                        <label for="">
                                            @if (session()->get('language') == 'portuguese')
                                                Espécie
                                            @else
                                                Cash
                                            @endif
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <br>

                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">
                                @if (session()->get('language') == 'portuguese')
                                    Enviar
                                @else
                                    Submit
                                @endif
                            </button>
                            </form>
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
                                                        Subtotal:
                                                    @else
                                                        Subtotal:
                                                    @endif
                                                </strong>
                                                {{ $cartTotal }}
                                                <br>

                                                <!-- OPCIONAL: MOSTRAR TOTAL. APÓS SUBTOTAL (SÓ DESCOMENTAR) -->
                                                <strong>
                                                    @if (session()->get('language') == 'portuguese')
                                                        Total:
                                                    @else
                                                        Total:
                                                    @endif
                                                </strong>
                                                {{ $cartTotal }}
                                            @endif

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--=================== CHECKOUT SIDEBAR ESTÉTICA(PAGAMENTO) =================== -->
                {{-- <div class="col-md-8">
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        @if (session()->get('language') == 'portuguese')
                                            Método de Pagamento
                                        @else
                                            Payment Method
                                        @endif
                                    </h4>
                                </div>


                                <div class="row">
                                    <!--=================== PAGAMENTO STRIPE (CC) =================== -->
                                    <div class="col-md-6">
                                        <label for="">
                                            @if (session()->get('language') == 'portuguese')
                                                Cartão de Crédito
                                            @else
                                                Credit Card
                                            @endif
                                        </label>
                                        <input type="radio" name="payment_method" value="stripe">

                                        <img src="{{ asset('frontend/assets/images/payments/4.png') }}">
                                        <img src="{{ asset('frontend/assets/images/payments/3.png') }}">
                                        <img src="{{ asset('frontend/assets/images/payments/2.png') }}">
                                    </div>
                                    <br>
                                    <br>
                                    <br>

                                    <!--=================== PAGAMENTO CARTÃO =================== -->
                                    {{-- <div class="col-md-6">
                                        <label for="">
                                            @if (session()->get('language') == 'portuguese')
                                                Cartão
                                            @else
                                                Card
                                            @endif
                                        </label>
                                        <input type="radio" name="payment_method" value="card">
                                    </div> --}}

                {{-- <!--=================== PAGAMENTO DINHEIRO =================== -->
                                        <div class="col-md-6">
                                            <label for="">
                                                @if (session()->get('language') == 'portuguese')
                                                    Espécie
                                                @else
                                                    Cash
                                                @endif
                                            </label>
                                            <input type="radio" name="payment_method" value="card">
                                        </div> --}}

                <!--=================== PAGAMENTO DINHEIRO =================== -->
                {{-- <div class="col-md-6">
                                        <label for="">
                                            PayPal
                                        </label>
                                        <input type="radio" name="payment_method" value="paypal">
                                        <img src="{{ asset('frontend/assets/images/payments/1.png') }}">
                                    </div>
                                    <br>

                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">
                                        @if (session()->get('language') == 'portuguese')
                                            Enviar
                                        @else
                                            Submit
                                        @endif
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}


            </div>
        </div>

        @include('frontend.body.brands')
    </div>
</div>

{{-- Código JS Ajax para Estado e Cidade dinamicamente eu simplesmente 
    copiei a mesma lógica do categoria produtos --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="shipping_division_id"]').on('change', function() {
            var shipping_division_id = $(this).val();
            if (shipping_division_id) {
                $.ajax({
                    url: "{{ url('/district-get/ajax') }}/" + shipping_division_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="shipping_district_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="shipping_district_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .shipping_district_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });

    });
</script>

@endsection
