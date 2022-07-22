@extends('frontend.main_master')
@section('content')

@section('title')
    @if (session()->get('language') == 'portuguese')
        NewModern | Meu Carrinho
    @else
        NewModern | My Cart
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
        </div>
    </div>
</div>

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

                    <!-- ======================== CAMPO CALCULAR VALOR FRETE (IMPLEMENTAR FUTURAMENTE) ========================  -->
                    <div class="col-md-4 col-sm-12 estimate-ship-tax">
                        {{-- <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="estimate-title">Estimate shipping and tax</span>
                                        <p>Enter your destination to get shipping and tax.</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="info-title control-label">Country <span>*</span></label>
                                            <select class="form-control unicase-form-control selectpicker">
                                                <option>--Select options--</option>
                                                <option>India</option>
                                                <option>SriLanka</option>
                                                <option>united kingdom</option>
                                                <option>saudi arabia</option>
                                                <option>united arab emirates</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title control-label">State/Province
                                                <span>*</span></label>
                                            <select class="form-control unicase-form-control selectpicker">
                                                <option>--Select options--</option>
                                                <option>TamilNadu</option>
                                                <option>Kerala</option>
                                                <option>Andhra Pradesh</option>
                                                <option>Karnataka</option>
                                                <option>Madhya Pradesh</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title control-label">Zip/Postal Code</label>
                                            <input type="text" class="form-control unicase-form-control text-input"
                                                placeholder="">
                                        </div>
                                        <div class="pull-right">
                                            <button type="submit" class="btn-upper btn btn-primary">GET A
                                                QOUTE</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table> --}}
                    </div>


                    <!-- ======================== ADICIONAR CUPOM/VOUCHERS (IMPLEMENTAR FUTURAMENTE) ========================  -->
                    <div class="col-md-4 col-sm-12 estimate-ship-tax">

                        {{-- CONDIÇÃO: após aplicar cupom, esconder o campo (mostrar vazio) p/ aplicar cupom, 
                            evitando que o cliente insira vários em uma compra --}}

                        {{-- @if (Session::has('coupon'))
                        @else
                            <table class="table" id="couponField">
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
                                                <input type="text"
                                                    class="form-control unicase-form-control text-input"
                                                    placeholder="Insira seu cupom" id="coupon_name">
                                            </div>
                                            <div class="clearfix pull-right">
                                                <button type="submit" class="btn-upper btn btn-primary"
                                                    onclick="applyCoupon()">
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
                        @endif --}}
                    </div>

                    <!-- ======================== CAMPO SUBTOTAL/TOTAL ========================  -->
                    <div class="col-md-4 col-sm-12 cart-shopping-total">
                        <table class="table">
                            <thead id="couponCalField">

                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="cart-checkout-btn pull-right">
                                            <a href="{{ route('checkout') }}" type="submit"
                                                class="btn btn-primary checkout-btn">
                                                @if (session()->get('language') == 'portuguese')
                                                    FAZER O
                                                    CHECKOUT
                                                @else
                                                    PROCEED TO
                                                    CHEKOUT
                                                @endif
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>










                </div>
            </div>



            <br>
            @include('frontend.body.brands')
        </div>


    @endsection
