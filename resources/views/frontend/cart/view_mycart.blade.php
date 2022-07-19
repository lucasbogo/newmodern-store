@extends('frontend.main_master')
@section('content')

@section('title')
    @if (session()->get('language') == 'portuguese')
        Meu Carrinho
    @else
        My Cart
    @endif
@endsection



<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>
                    @if (session()->get('language') == 'portuguese')
                        Meu Carrinho
                    @else
                        My Cart
                    @endif
                </li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="my-wishlist-page">
            <div class="row ">
                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-romove item">
                                            @if (session()->get('language') == 'portuguese')
                                                Imagem
                                            @else
                                                Image
                                            @endif
                                        </th>
                                        <th class="cart-description item">
                                            @if (session()->get('language') == 'portuguese')
                                                Produto
                                            @else
                                                Product
                                            @endif
                                        </th>
                                        <th class="cart-product-name item">
                                            @if (session()->get('language') == 'portuguese')
                                                Cor
                                            @else
                                                Color
                                            @endif
                                        </th>
                                        <th class="cart-edit item">
                                            @if (session()->get('language') == 'portuguese')
                                                Tamanho
                                            @else
                                                Size
                                            @endif
                                        </th>
                                        <th class="cart-qty item">
                                            @if (session()->get('language') == 'portuguese')
                                                Quantidade
                                            @else
                                                Quantity
                                            @endif
                                        </th>
                                        <th class="cart-sub-total item">Subtotal</th>
                                        <th class="cart-total last-item">
                                            @if (session()->get('language') == 'portuguese')
                                                Remover
                                            @else
                                                Remove
                                            @endif
                                        </th>
                                    </tr>
                                </thead>

                                <!-- Chamei, pelo Id, o Ajax wishlist codificado na main_master -->
                                <tbody id="mycart">


                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- ======================== CAMPO CALCULAR VALOR FRETE (FUTURO) ========================  -->
                    <div class="col-md-4 col-sm-12 estimate-ship-tax">
                    </div>



                    <!-- ======================== ADICIONAR CUPOM/VOUCHERS (FUTURO) ========================  -->
                    <div class="col-md-4 col-sm-12 estimate-ship-tax">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="estimate-title">
                                            @if (session()->get('language') == 'portuguese')
                                                Código de Desconto
                                            @else
                                                Discount Code
                                            @endif
                                        </span>
                                        <p>
                                            @if (session()->get('language') == 'portuguese')
                                                Insira o código do seu voucher
                                            @else
                                                Enter your coupon code
                                            @endif
                                        </p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control unicase-form-control text-input"
                                                placeholder="Voucher" id="coupon_name">
                                        </div>
                                        <div class="clearfix pull-right">
                                            <button type="submit" class="btn-upper btn btn-primary" onclick="applyCoupn()">
                                                @if (session()->get('language') == 'portuguese')
                                                    APLICAR
                                                    CUPOM
                                                @else
                                                    APPLY
                                                    COUPON
                                                @endif
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- ======================== CAMPO SUBTOTAL/TOTAL ========================  -->
                    <div class="col-md-4 col-sm-12 cart-shopping-total">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="cart-sub-total">
                                            Subtotal<span class="inner-left-md">$600.00</span>
                                        </div>
                                        <div class="cart-grand-total">
                                            Total<span class="inner-left-md">$600.00</span>
                                        </div>
                                    </th>
                                </tr>
                            </thead><!-- /thead -->
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="cart-checkout-btn pull-right">
                                            <button type="submit" class="btn btn-primary checkout-btn">
                                                @if (session()->get('language') == 'portuguese')
                                                    FAZER O
                                                    CHECKOUT
                                                @else
                                                    PROCEED TO
                                                    CHEKOUT
                                                @endif
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>


        @include('frontend.body.brands')

    </div>
</div>






@endsection
