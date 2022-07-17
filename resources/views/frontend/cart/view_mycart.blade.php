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
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
        </div>
        <br>


        @include('frontend.body.brands')

    </div>
</div>






@endsection
