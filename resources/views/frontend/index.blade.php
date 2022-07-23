@extends('frontend.main_master')
@section('content')

@section('title')
    NewModern | Home
@endsection
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                <!-- ======= MENU VERTICAL CATEGORIAS =========== -->

                @include('frontend.fragments.vertical_menu')

                <!-- ===== MENU VERTICAL CATEGORIAL FINAL ======== -->

                <!-- ============================================== HOT DEALS FRAGMENT ============================================== -->

                @include('frontend.fragments.hot_deals')

                <!-- ============================================== /HOT DEALS FRAGMENT ============================================== -->

                <!-- ============================================== SPECIAL OFFER COMEÇA AQUI ============================================== -->



                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">
                        <!-- Lógica internacionalização simples tradução da tag new -->
                        @if (session()->get('language') == 'portuguese')
                            Oferta Especial
                        @else
                            Special Offer
                        @endif
                    </h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">


                            <div class="item">

                                <div class="products special-product">

                                    @foreach ($specialoffers as $product)
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a
                                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                                    <img src="{{ asset($product->product_thumbnail) }}"
                                                                        alt="">
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a
                                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                                    <!-- Lógica internacionalização mostrar nome produto -->
                                                                    @if (session()->get('language') == 'portuguese')
                                                                        {{ $product->product_name_pt }}
                                                                    @else
                                                                        {{ $product->product_name_en }}
                                                                    @endif
                                                                </a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    <!-- Lógica: se não houver desconto, aparecer o valor normal (product_selling_price)...-->
                                                                    @if ($product->product_discount_price == null)
                                                                        <div class="product-price"> <span
                                                                                class="price">
                                                                                {{ $product->product_selling_price }}
                                                                            </span>
                                                                        </div>
                                                                    @else
                                                                        <div class="product-price"> <span
                                                                                class="price">
                                                                                {{ $product->product_discount_price }}
                                                                            </span><span class="price-before-discount">
                                                                                {{ $product->product_selling_price }}
                                                                            </span>
                                                                        </div>
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================== SPECIAL OFFER TERMINA AQUI ================================================== -->



                <!-- ====================== PRODUCT TAGS COMEÇA AQUI ARRUMAR BUG E IMPELMENTAR FUTURAMENTE ================================ -->

                {{-- @include('frontend.fragments.product_tags') --}}

                <!-- ============================================== PRODUCT TAGS TERMINA AQUI ============================================== -->



                <!-- ============================================== SPECIAL DEALS COMEÇA AQUI ============================================== -->

                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">
                        <!-- Lógica internacionalização simples tradução da tag new -->
                        @if (session()->get('language') == 'portuguese')
                            Oferta Unica
                        @else
                            Special Deals
                        @endif
                    </h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                            <div class="item">
                                <div class="products special-product">

                                    @foreach ($specialdeals as $product)
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a
                                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                                    <img src="{{ asset($product->product_thumbnail) }}"
                                                                        alt=""> </a> </div>


                                                        </div>

                                                    </div>

                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a
                                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                                    <!-- Lógica internacionalização mostrar nome produto -->
                                                                    @if (session()->get('language') == 'portuguese')
                                                                        {{ $product->product_name_pt }}
                                                                    @else
                                                                        {{ $product->product_name_en }}
                                                                    @endif
                                                                </a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    <!-- Lógica: se não houver desconto, aparecer o valor normal (product_selling_price)...-->
                                                                    @if ($product->product_discount_price == null)
                                                                        <div class="product-price"> <span
                                                                                class="price">
                                                                                {{ $product->product_selling_price }}
                                                                            </span>
                                                                        </div>
                                                                        <!-- /.product_selling_price without discount -->
                                                                    @else
                                                                        <!-- caso contrário, mostrar valor com o desconto -->
                                                                        <div class="product-price"> <span
                                                                                class="price">
                                                                                {{ $product->product_discount_price }}
                                                                            </span><span class="price-before-discount">
                                                                                {{ $product->product_selling_price }}
                                                                            </span>
                                                                        </div>
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================== SPECIAL TERMINA AQUI ============================================== -->


                <!-- ============================================== NEWSLETTER COMEÇA AQUI============================================== -->
                <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
                    <h3 class="section-title">Newsletters</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <p>Sign Up for Our Newsletter!</p>
                        <form>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    placeholder="Subscribe to our newsletter">
                            </div>
                            <button class="btn btn-primary">Subscribe</button>
                        </form>
                    </div>
                </div>

                <!-- ============================================== NEWSLETTER TERMINA AQUI ============================================== -->


                <!-- =============================================== AVALIAÇÕES LOJA FRAGMENTAÇÃO ========================================= -->

                @include('frontend.fragments.store_reviews')

                <!-- =============================================== AVALIAÇÕES LOJA /FRAGMENTAÇÃO ========================================= -->




                <div class="home-banner"> <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}"
                        alt="Image"> </div>
            </div>




            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">

                <!-- ========================================== SLIDERS ========================================= -->

                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

                        @foreach ($sliders as $slider)
                            <div class="item" style="background-image: url({{ asset($slider->slider_image) }});">
                                <div class="container-fluid">
                                    <div class="caption bg-color vertical-center text-left">

                                        <div class="big-text fadeInDown-1"> {{ $slider->slider_title }} </div>
                                        <div class="excerpt fadeInDown-2 hidden-xs">
                                            <span>{{ $slider->slider_description }} </span>
                                        </div>
                                        <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product"
                                                class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop
                                                Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach



                    </div>
                </div>

                <!-- ========================================= SLIDERS END ========================================= -->

                <!-- ============================================== INFO BOXES ============================================== -->
                <div class="info-boxes wow fadeInUp">
                    <div class="info-boxes-inner">
                        <div class="row">
                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">money back</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">30 Days Money Back Guarantee</h6>
                                </div>
                            </div>


                            <div class="hidden-md col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">free shipping</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Shipping on orders over $99</h6>
                                </div>
                            </div>


                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">Special Sale</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Extra $5 off on all items </h6>
                                </div>
                            </div>

                        </div>

                    </div>


                </div>

                <!-- =================================== INFO BOXES : END ========================================= -->


                <!-- =========================== SCROLL TABS NOVOS PRODUTOS - HOME ============================== -->

                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">

                            <!-- Lógica internacionalização simples tradução -->
                            @if (session()->get('language') == 'portuguese')
                                Novos Produtos
                            @else
                                New Products
                            @endif
                        </h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">

                            <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">
                                    <!-- Lógica internacionalização simples tradução -->
                                    @if (session()->get('language') == 'portuguese')
                                        Todos
                                    @else
                                        All
                                    @endif
                                </a></li>

                            <!-- loop condicional para 'baixar' os dados categoria na index.home -->
                            @foreach ($categories as $category)
                                <li><a data-transition-type="backSlide" href="#category{{ $category->id }}"
                                        data-toggle="tab">
                                        <!-- Lógica internacionalização mostrar nome categoria -->
                                        @if (session()->get('language') == 'portuguese')
                                            {{ $category->category_name_pt }}
                                        @else
                                            {{ $category->category_name_en }}
                                        @endif
                                    </a>
                                </li>
                            @endforeach


                        </ul>
                    </div>

                    <div class="tab-content outer-top-xs">

                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                                    <!-- loop condicional para 'baixar' os dados categoria na index.home -->
                                    @foreach ($products as $product)
                                        <div class="item item-carousel">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <!-- url para acessar detalhes do produto ao clickar na imagem produto -->
                                                            <a
                                                                href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                                <!-- mostrar miniatura produto dinamicamente em 'novos produtos' -->
                                                                <img src="{{ asset($product->product_thumbnail) }}"
                                                                    alt="">
                                                            </a>
                                                        </div>


                                                        <!-- Lógica porcentagem -->
                                                        @php
                                                            $discount = $product->product_selling_price - $product->product_discount_price;
                                                            $percentage = ($discount / $product->product_selling_price) * 100;
                                                        @endphp

                                                        <div>
                                                            <!-- Lógica: se não houver desconto, aparecer a a tag new...-->
                                                            @if ($product->product_discount_price == null)
                                                                <div class="tag new"><span>
                                                                        <!-- Lógica internacionalização simples tradução da tag new -->
                                                                        @if (session()->get('language') == 'portuguese')
                                                                            NOVO
                                                                        @else
                                                                            NEW
                                                                        @endif
                                                                    </span></div>
                                                            @else
                                                                <!-- caso contrário, mostrar a porcentagem de desconto -->
                                                                <div class="tag hot">
                                                                    <span>{{ round($percentage) }} %</span>
                                                                </div>
                                                            @endif
                                                        </div>



                                                    </div>


                                                    <!-- =============== DETALHES DO PRODUTO COMEÇA AQUI" =================== -->

                                                    <div class="product-info text-left">
                                                        <!-- url: ao clickar em um produto específico, redirencianar para a página detalahe do produto -->
                                                        <h3 class="name"><a
                                                                href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                                <!-- Lógica internacionalização mostrar nome produto -->
                                                                @if (session()->get('language') == 'portuguese')
                                                                    {{ $product->product_name_pt }}
                                                                @else
                                                                    {{ $product->product_name_en }}
                                                                @endif
                                                            </a>
                                                        </h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="description"></div>

                                                        <!--== LÓGICA P/ MOSTRAR VALOR PRODUTO DINAMICAMENTE ==-->

                                                        <!-- Lógica: se não houver desconto, aparecer o valor normal (product_selling_price)...-->
                                                        @if ($product->product_discount_price == null)
                                                            <div class="product-price"> <span class="price">
                                                                    {{ $product->product_selling_price }}
                                                                </span>
                                                            </div>
                                                        @else
                                                            <!-- caso contrário, mostrar valor com o desconto -->
                                                            <div class="product-price"> <span class="price">
                                                                    {{ $product->product_discount_price }}
                                                                </span><span class="price-before-discount">
                                                                    {{ $product->product_selling_price }}
                                                                </span>
                                                            </div>
                                                        @endif

                                                    </div>

                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">


                                                                    <!-- Modal Bootstrap Button -->
                                                                    <button class="btn btn-primary icon"
                                                                        type="button" title="Add Cart"
                                                                        data-toggle="modal"
                                                                        data-target="#exampleModal"
                                                                        id="{{ $product->id }}"
                                                                        onclick="productView(this.id)"> <i
                                                                            class="fa fa-shopping-cart"></i>
                                                                    </button>

                                                                    <button class="btn btn-primary cart-btn"
                                                                        type="button">
                                                                        <!-- Lógica internacionalização simples tradução da tag new -->
                                                                        @if (session()->get('language') == 'portuguese')
                                                                            Adicionar
                                                                        @else
                                                                            Add to Cart
                                                                        @endif
                                                                    </button>
                                                                </li>
                                                                <!-- ========== /BOTÃO ADICIONAR AO CARRINHO ======= -->

                                                                <!-- ========== BOTÃO WISHLIST ======= -->


                                                                <!-- Wishlist Button -->
                                                                <button class="btn btn-primary icon" type="button"
                                                                    title="Wishlist" id="{{ $product->id }}"
                                                                    onclick="addToWishList(this.id)"> <i
                                                                        class="fa fa-heart"></i>
                                                                </button>


                                                                <!-- ========== /BOTÃO WISHLIST ======== -->



                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!--======================================== /.nav-tabs PRIMEIRO ============================================ -->


                        @foreach ($categories as $category)
                            <div class="tab-pane" id="category{{ $category->id }}">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme"
                                        data-item="4">

                                        <!-- buscar os produtos por suas respectivas categorias -->
                                        @php
                                            $categorised_product = App\Models\Product::where('category_id', $category->id)
                                                ->orderBy('id', 'DESC')
                                                ->get();
                                        @endphp


                                        <!-- loop condicional para 'baixar' os dados produto por categoria na index.home -->
                                        @forelse ($categorised_product as $product)
                                            <div class="item item-carousel">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <!-- url para redirecionar para pagina detalhes produto ao clickar na imagem -->
                                                                <a
                                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                                    <!-- mostrar miniatura produto dinamicamente em 'novos produtos' -->
                                                                    <img src="{{ asset($product->product_thumbnail) }}"
                                                                        alt="">
                                                                </a>
                                                            </div>

                                                            <!-- Lógica porcentagem -->
                                                            @php
                                                                $discount = $product->product_selling_price - $product->product_discount_price;
                                                                $percentage = ($discount / $product->product_selling_price) * 100;
                                                            @endphp

                                                            <div>
                                                                <!-- Lógica: se não houver desconto, aparecer a a tag new...-->
                                                                @if ($product->product_discount_price == null)
                                                                    <div class="tag new"><span>
                                                                            <!-- Lógica internacionalização simples tradução da tag new -->
                                                                            @if (session()->get('language') == 'portuguese')
                                                                                NOVO
                                                                            @else
                                                                                NEW
                                                                            @endif
                                                                        </span></div>
                                                                @else
                                                                    <!-- caso contrário, mostrar a porcentagem de desconto -->
                                                                    <div class="tag hot">
                                                                        <span>{{ round($percentage) }} %</span>
                                                                    </div>
                                                                @endif
                                                            </div>



                                                        </div>


                                                        <div class="product-info text-left">
                                                            <h3 class="name">
                                                                <!-- url para redirecionar para pagina detalhes produto ao clickar no nome produto -->
                                                                <a
                                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                                    <!-- Lógica internacionalização mostrar nome produto -->
                                                                    @if (session()->get('language') == 'portuguese')
                                                                        {{ $product->product_name_pt }}
                                                                    @else
                                                                        {{ $product->product_name_en }}
                                                                    @endif
                                                                </a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="description"></div>

                                                            <!--== LÓGICA P/ MOSTRAR VALOR PRODUTO DINAMICAMENTE ==-->

                                                            <!-- Lógica: se não houver desconto, aparecer o valor normal (product_selling_price)...-->
                                                            @if ($product->product_discount_price == null)
                                                                <div class="product-price"> <span class="price">
                                                                        {{ $product->product_selling_price }}
                                                                    </span>
                                                                </div>
                                                            @else
                                                                <!-- caso contrário, mostrar valor com o desconto -->
                                                                <div class="product-price"> <span class="price">
                                                                        {{ $product->product_discount_price }}
                                                                    </span><span class="price-before-discount">
                                                                        {{ $product->product_selling_price }}
                                                                    </span>
                                                                </div>
                                                            @endif

                                                        </div>

                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">

                                                                        <!-- Modal Bootstrap Button -->
                                                                        <button class="btn btn-primary icon"
                                                                            type="button" title="Add Cart"
                                                                            data-toggle="modal"
                                                                            data-target="#exampleModal"
                                                                            id="{{ $product->id }}"
                                                                            onclick="productView(this.id)"> <i
                                                                                class="fa fa-shopping-cart"></i>
                                                                        </button>

                                                                        <button class="btn btn-primary cart-btn"
                                                                            type="button">
                                                                            <!-- Lógica internacionalização simples tradução da tag new -->
                                                                            @if (session()->get('language') == 'portuguese')
                                                                                Adicionar
                                                                            @else
                                                                                Add to Cart
                                                                            @endif
                                                                        </button>
                                                                    </li>
                                                                    <!-- ========== /BOTÃO ADICIONAR AO CARRINHO ======= -->

                                                                    <!-- ========== BOTÃO WISHLIST ======= -->


                                                                    <!-- Wishlist Button -->
                                                                    <button class="btn btn-primary icon"
                                                                        type="button" title="Wishlist"
                                                                        id="{{ $product->id }}"
                                                                        onclick="addToWishList(this.id)"> <i
                                                                            class="fa fa-heart"></i>
                                                                    </button>


                                                                    <!-- ========== /BOTÃO WISHLIST ======== -->

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @empty
                                            <h5 class="text-danger">
                                                <!-- Lógica internacionalização mostrar mensagem de falta de produto ao selecionar uma categoria sem produtos -->
                                                @if (session()->get('language') == 'portuguese')
                                                    Categoria sem Produtos
                                                @else
                                                    Category without Products
                                                @endif
                                            </h5>
                                        @endforelse



                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- ============================================== SCROLL TABS : END ============================================== -->
                <!-- ============================================== BANNER ENTRE CATEGORIAS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-7 col-sm-7">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive"
                                        src="{{ asset('frontend/assets/images/banners/home-banner1.jpg') }}"
                                        alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5 col-sm-5">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive"
                                        src="{{ asset('frontend/assets/images/banners/home-banner2.jpg') }}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- ============================================== BANNER ENTRE CATEGORIAS : FINAL ============================================== -->



                <!-- ============================================== FEATURED / DESTAQUE COMEÇA AQUI ===================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">
                        <!-- Lógica internacionalização simples tradução da tag new -->
                        @if (session()->get('language') == 'portuguese')
                            Produtos em Destaque
                        @else
                            Featured Products
                        @endif
                    </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                        @foreach ($featured as $product)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <!-- url para redirecionar para pagina detalhes produto ao clickar na imagem -->
                                                <a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                    <!-- mostrar miniatura produto dinamicamente em 'novos produtos' -->
                                                    <img src="{{ asset($product->product_thumbnail) }}"
                                                        alt="">
                                                </a>
                                            </div>


                                            <!-- Lógica porcentagem -->
                                            @php
                                                $discount = $product->product_selling_price - $product->product_discount_price;
                                                $percentage = ($discount / $product->product_selling_price) * 100;
                                            @endphp

                                            <div>
                                                <!-- Lógica: se não houver desconto, aparecer a a tag new...-->
                                                @if ($product->product_discount_price == null)
                                                    <div class="tag new"><span>
                                                            <!-- Lógica internacionalização simples tradução da tag new -->
                                                            @if (session()->get('language') == 'portuguese')
                                                                NOVO
                                                            @else
                                                                NEW
                                                            @endif
                                                        </span></div>
                                                @else
                                                    <!-- caso contrário, mostrar a porcentagem de desconto -->
                                                    <div class="tag hot">
                                                        <span>{{ round($percentage) }} %</span>
                                                    </div>
                                                @endif
                                            </div>



                                        </div>


                                        <div class="product-info text-left">
                                            <h3 class="name">
                                                <!-- url para redirecionar para pagina detalhes produto ao clickar no nome produto -->
                                                <a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                    <!-- Lógica internacionalização mostrar nome produto -->
                                                    @if (session()->get('language') == 'portuguese')
                                                        {{ $product->product_name_pt }}
                                                    @else
                                                        {{ $product->product_name_en }}
                                                    @endif
                                                </a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            <!--== LÓGICA P/ MOSTRAR VALOR PRODUTO DINAMICAMENTE ==-->

                                            <!-- Lógica: se não houver desconto, aparecer o valor normal (product_selling_price)...-->
                                            @if ($product->product_discount_price == null)
                                                <div class="product-price"> <span class="price">
                                                        {{ $product->product_selling_price }}
                                                    </span>
                                                </div>
                                            @else
                                                <!-- caso contrário, mostrar valor com o desconto -->
                                                <div class="product-price"> <span class="price">
                                                        {{ $product->product_discount_price }}
                                                    </span><span class="price-before-discount">
                                                        {{ $product->product_selling_price }}
                                                    </span>
                                                </div>
                                            @endif

                                        </div>

                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <!-- ========== BOTÃO ADICIONAR AO CARRINHO ======= -->
                                                    <li class="add-cart-button btn-group">

                                                        <!-- Modal Bootstrap Button -->
                                                        <button class="btn btn-primary icon" type="button"
                                                            title="Add Cart" data-toggle="modal"
                                                            data-target="#exampleModal" id="{{ $product->id }}"
                                                            onclick="productView(this.id)"> <i
                                                                class="fa fa-shopping-cart"></i>
                                                        </button>

                                                        <button class="btn btn-primary cart-btn" type="button">
                                                            <!-- Lógica internacionalização simples tradução da tag new -->
                                                            @if (session()->get('language') == 'portuguese')
                                                                Adicionar
                                                            @else
                                                                Add to Cart
                                                            @endif
                                                        </button>
                                                    </li>
                                                    <!-- ========== /BOTÃO ADICIONAR AO CARRINHO ======= -->

                                                    <!-- ========== BOTÃO WISHLIST ======= -->


                                                    <!-- Wishlist Button -->
                                                    <button class="btn btn-primary icon" type="button"
                                                        title="Wishlist" id="{{ $product->id }}"
                                                        onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i>
                                                    </button>


                                                    <!-- ========== /BOTÃO WISHLIST ======== -->


                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>


                <!-- ================================ FEATURED PRODUCTS TERMINA AQUI =========================================== -->



                <!-- ============================================== BANNER ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive"
                                        src="{{ asset('frontend/assets/images/banners/home-banner.jpg') }}"
                                        alt=""> </div>
                                <div class="strip strip-text">
                                    <div class="strip-inner">
                                        <h2 class="text-right">New Mens Fashion<br>
                                            <span class="shopping-needs">Save up to 40% off</span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="new-label">
                                    <div class="text">NEW</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================== BANNER FINAL =================================================== -->



                <!-- ================================ SKIP CATEGORY 0 PRODUCTS COMEÇA AQUI =========================================== -->

                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">
                        @if (session()->get('language') == 'portuguese')
                            {{ $skip_category_0->category_name_pt }}
                        @else
                            {{ $skip_category_0->category_name_en }}
                        @endif
                    </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                        @foreach ($skip_product_0 as $product)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <!-- url para redirecionar para pagina detalhes produto ao clickar na imagem -->
                                                <a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                    <!-- mostrar miniatura produto dinamicamente em 'novos produtos' -->
                                                    <img src="{{ asset($product->product_thumbnail) }}"
                                                        alt="">
                                                </a>
                                            </div>


                                            <!-- Lógica porcentagem -->
                                            @php
                                                $discount = $product->product_selling_price - $product->product_discount_price;
                                                $percentage = ($discount / $product->product_selling_price) * 100;
                                            @endphp

                                            <div>
                                                <!-- Lógica: se não houver desconto, aparecer a a tag new...-->
                                                @if ($product->product_discount_price == null)
                                                    <div class="tag new"><span>
                                                            <!-- Lógica internacionalização simples tradução da tag new -->
                                                            @if (session()->get('language') == 'portuguese')
                                                                NOVO
                                                            @else
                                                                NEW
                                                            @endif
                                                        </span></div>
                                                @else
                                                    <!-- caso contrário, mostrar a porcentagem de desconto -->
                                                    <div class="tag hot">
                                                        <span>{{ round($percentage) }} %</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="product-info text-left">
                                            <h3 class="name">
                                                <!-- url para redirecionar para pagina detalhes produto ao clickar no nome produto -->
                                                <a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                    <!-- Lógica internacionalização mostrar nome produto -->
                                                    @if (session()->get('language') == 'portuguese')
                                                        {{ $product->product_name_pt }}
                                                    @else
                                                        {{ $product->product_name_en }}
                                                    @endif
                                                </a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            <!--== LÓGICA P/ MOSTRAR VALOR PRODUTO DINAMICAMENTE ==-->

                                            <!-- Lógica: se não houver desconto, aparecer o valor normal (product_selling_price)...-->
                                            @if ($product->product_discount_price == null)
                                                <div class="product-price"> <span class="price">
                                                        {{ $product->product_selling_price }}
                                                    </span>
                                                </div>
                                            @else
                                                <!-- caso contrário, mostrar valor com o desconto -->
                                                <div class="product-price"> <span class="price">
                                                        {{ $product->product_discount_price }}
                                                    </span><span class="price-before-discount">
                                                        {{ $product->product_selling_price }}
                                                    </span>
                                                </div>
                                            @endif

                                        </div>

                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">

                                                        <!-- Modal Bootstrap Button -->
                                                        <button class="btn btn-primary icon" type="button"
                                                            title="Add Cart" data-toggle="modal"
                                                            data-target="#exampleModal" id="{{ $product->id }}"
                                                            onclick="productView(this.id)"> <i
                                                                class="fa fa-shopping-cart"></i>
                                                        </button>

                                                        <button class="btn btn-primary cart-btn" type="button">
                                                            <!-- Lógica internacionalização simples tradução da tag new -->
                                                            @if (session()->get('language') == 'portuguese')
                                                                Adicionar
                                                            @else
                                                                Add to Cart
                                                            @endif
                                                        </button>
                                                    </li>
                                                    <!-- ========== /BOTÃO ADICIONAR AO CARRINHO ======= -->

                                                    <!-- ========== BOTÃO WISHLIST ======= -->

                                                    <!-- Wishlist Button -->
                                                    <button class="btn btn-primary icon" type="button"
                                                        title="Wishlist" id="{{ $product->id }}"
                                                        onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i>
                                                    </button>

                                                    <!-- ========== /BOTÃO WISHLIST ======== -->

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>

                <!-- ================================ SKIP CATEGORY 0 PRODUCTS TERMINA AQUI =========================================== -->

                <!-- ================================ SKIP CATEGORY 1 PRODUCTS COMEÇA AQUI =========================================== -->

                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">
                        @if (session()->get('language') == 'portuguese')
                            {{ $skip_category_1->category_name_pt }}
                        @else
                            {{ $skip_category_1->category_name_en }}
                        @endif
                    </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                        @foreach ($skip_product_1 as $product)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <!-- url para redirecionar para pagina detalhes produto ao clickar na imagem -->
                                                <a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                    <!-- mostrar miniatura produto dinamicamente em 'novos produtos' -->
                                                    <img src="{{ asset($product->product_thumbnail) }}"
                                                        alt="">
                                                </a>
                                            </div>


                                            <!-- Lógica porcentagem -->
                                            @php
                                                $discount = $product->product_selling_price - $product->product_discount_price;
                                                $percentage = ($discount / $product->product_selling_price) * 100;
                                            @endphp

                                            <div>
                                                <!-- Lógica: se não houver desconto, aparecer a a tag new...-->
                                                @if ($product->product_discount_price == null)
                                                    <div class="tag new"><span>
                                                            <!-- Lógica internacionalização simples tradução da tag new -->
                                                            @if (session()->get('language') == 'portuguese')
                                                                NOVO
                                                            @else
                                                                NEW
                                                            @endif
                                                        </span></div>
                                                @else
                                                    <!-- caso contrário, mostrar a porcentagem de desconto -->
                                                    <div class="tag hot">
                                                        <span>{{ round($percentage) }} %</span>
                                                    </div>
                                                @endif
                                            </div>



                                        </div>


                                        <div class="product-info text-left">
                                            <h3 class="name">
                                                <!-- url para redirecionar para pagina detalhes produto ao clickar no nome produto -->
                                                <a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                    <!-- Lógica internacionalização mostrar nome produto -->
                                                    @if (session()->get('language') == 'portuguese')
                                                        {{ $product->product_name_pt }}
                                                    @else
                                                        {{ $product->product_name_en }}
                                                    @endif
                                                </a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            <!--== LÓGICA P/ MOSTRAR VALOR PRODUTO DINAMICAMENTE ==-->

                                            <!-- Lógica: se não houver desconto, aparecer o valor normal (product_selling_price)...-->
                                            @if ($product->product_discount_price == null)
                                                <div class="product-price"> <span class="price">
                                                        {{ $product->product_selling_price }}
                                                    </span>
                                                </div>
                                            @else
                                                <!-- caso contrário, mostrar valor com o desconto -->
                                                <div class="product-price"> <span class="price">
                                                        {{ $product->product_discount_price }}
                                                    </span><span class="price-before-discount">
                                                        {{ $product->product_selling_price }}
                                                    </span>
                                                </div>
                                            @endif

                                        </div>

                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">


                                                        <!-- Modal Bootstrap Button -->
                                                        <button class="btn btn-primary icon" type="button"
                                                            title="Add Cart" data-toggle="modal"
                                                            data-target="#exampleModal" id="{{ $product->id }}"
                                                            onclick="productView(this.id)"> <i
                                                                class="fa fa-shopping-cart"></i>
                                                        </button>

                                                        <button class="btn btn-primary cart-btn" type="button">
                                                            <!-- Lógica internacionalização simples tradução da tag new -->
                                                            @if (session()->get('language') == 'portuguese')
                                                                Adicionar
                                                            @else
                                                                Add to Cart
                                                            @endif
                                                        </button>
                                                    </li>
                                                    <!-- ========== /BOTÃO ADICIONAR AO CARRINHO ======= -->

                                                    <!-- ========== BOTÃO WISHLIST ======= -->


                                                    <!-- Wishlist Button -->
                                                    <button class="btn btn-primary icon" type="button"
                                                        title="Wishlist" id="{{ $product->id }}"
                                                        onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i>
                                                    </button>


                                                    <!-- ========== /BOTÃO WISHLIST ======== -->

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </section>

                <!-- ================================ SKIP CATEGORY 1 PRODUCTS TERMINA AQUI =========================================== -->

                <!-- ================================ SKIP BRAND 1 PRODUCTS COMEÇA AQUI =========================================== -->

                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">
                        @if (session()->get('language') == 'portuguese')
                            {{ $skip_brand_1->brand_name_pt }}
                        @else
                            {{ $skip_brand_1->brand_name_en }}
                        @endif
                    </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                        @foreach ($skip_brand_product_1 as $product)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <!-- url para redirecionar para pagina detalhes produto ao clickar na imagem -->
                                                <a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                    <!-- mostrar miniatura produto dinamicamente em 'novos produtos' -->
                                                    <img src="{{ asset($product->product_thumbnail) }}"
                                                        alt="">
                                                </a>
                                            </div>


                                            <!-- Lógica porcentagem -->
                                            @php
                                                $discount = $product->product_selling_price - $product->product_discount_price;
                                                $percentage = ($discount / $product->product_selling_price) * 100;
                                            @endphp

                                            <div>
                                                <!-- Lógica: se não houver desconto, aparecer a a tag new...-->
                                                @if ($product->product_discount_price == null)
                                                    <div class="tag new"><span>
                                                            <!-- Lógica internacionalização simples tradução da tag new -->
                                                            @if (session()->get('language') == 'portuguese')
                                                                NOVO
                                                            @else
                                                                NEW
                                                            @endif
                                                        </span></div>
                                                @else
                                                    <!-- caso contrário, mostrar a porcentagem de desconto -->
                                                    <div class="tag hot">
                                                        <span>{{ round($percentage) }} %</span>
                                                    </div>
                                                @endif
                                            </div>



                                        </div>


                                        <div class="product-info text-left">
                                            <h3 class="name">
                                                <!-- url para redirecionar para pagina detalhes produto ao clickar no nome produto -->
                                                <a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                    <!-- Lógica internacionalização mostrar nome produto -->
                                                    @if (session()->get('language') == 'portuguese')
                                                        {{ $product->product_name_pt }}
                                                    @else
                                                        {{ $product->product_name_en }}
                                                    @endif
                                                </a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            <!--== LÓGICA P/ MOSTRAR VALOR PRODUTO DINAMICAMENTE ==-->

                                            <!-- Lógica: se não houver desconto, aparecer o valor normal (product_selling_price)...-->
                                            @if ($product->product_discount_price == null)
                                                <div class="product-price"> <span class="price">
                                                        {{ $product->product_selling_price }}
                                                    </span>
                                                </div>
                                            @else
                                                <!-- caso contrário, mostrar valor com o desconto -->
                                                <div class="product-price"> <span class="price">
                                                        {{ $product->product_discount_price }}
                                                    </span><span class="price-before-discount">
                                                        {{ $product->product_selling_price }}
                                                    </span>
                                                </div>
                                            @endif

                                        </div>

                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">


                                                        <!-- Modal Bootstrap Button -->
                                                        <button class="btn btn-primary icon" type="button"
                                                            title="Add Cart" data-toggle="modal"
                                                            data-target="#exampleModal" id="{{ $product->id }}"
                                                            onclick="productView(this.id)"> <i
                                                                class="fa fa-shopping-cart"></i>
                                                        </button>

                                                        <button class="btn btn-primary cart-btn" type="button">
                                                            <!-- Lógica internacionalização simples tradução da tag new -->
                                                            @if (session()->get('language') == 'portuguese')
                                                                Adicionar
                                                            @else
                                                                Add to Cart
                                                            @endif
                                                        </button>
                                                    </li>
                                                    <!-- ========== /BOTÃO ADICIONAR AO CARRINHO ======= -->

                                                    <!-- ========== BOTÃO WISHLIST ======= -->


                                                    <!-- Wishlist Button -->
                                                    <button class="btn btn-primary icon" type="button"
                                                        title="Wishlist" id="{{ $product->id }}"
                                                        onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i>
                                                    </button>


                                                    <!-- ========== /BOTÃO WISHLIST ======== -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </section>

                <!-- ================================ SKIP BRAND 1 PRODUCTS TERMINA AQUI =========================================== -->



                <!-- ============================================== BLOG SLIDER ============================================== -->
                <section class="section latest-blog outer-bottom-vs wow fadeInUp">
                    <h3 class="section-title">latest form blog</h3>
                    <div class="blog-slider-container outer-top-xs">
                        <div class="owl-carousel blog-slider custom-carousel">
                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"> <a href="blog.html"><img
                                                    src="{{ asset('frontend/assets/images/blog-post/post1.jpg') }}"
                                                    alt=""></a>
                                        </div>
                                    </div>


                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">Voluptatem accusantium doloremque
                                                laudantium</a></h3>
                                        <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                                        <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et
                                            dolore magnam aliquam quaerat voluptatem.</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a>
                                    </div>


                                </div>

                            </div>


                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"> <a href="blog.html"><img
                                                    src="assets/images/blog-post/post2.jpg" alt=""></a>
                                        </div>
                                    </div>


                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                                pariatur</a></h3>
                                        <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                        <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et
                                            dolore magnam aliquam quaerat voluptatem.</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a>
                                    </div>


                                </div>
                            </div>




                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"> <a href="blog.html"><img
                                                    src="assets/images/blog-post/post1.jpg" alt=""></a>
                                        </div>
                                    </div>


                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                                pariatur</a></h3>
                                        <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                        <p class="text">Sed ut perspiciatis unde omnis iste natus error sit
                                            voluptatem accusantium</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a>
                                    </div>


                                </div>
                            </div>


                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"> <a href="blog.html"><img
                                                    src="assets/images/blog-post/post2.jpg" alt=""></a>
                                        </div>
                                    </div>


                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                                pariatur</a></h3>
                                        <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                        <p class="text">Sed ut perspiciatis unde omnis iste natus error sit
                                            voluptatem accusantium</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a>
                                    </div>


                                </div>

                            </div>


                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"> <a href="blog.html"><img
                                                    src="assets/images/blog-post/post1.jpg" alt=""></a>
                                        </div>
                                    </div>


                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                                pariatur</a></h3>
                                        <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                        <p class="text">Sed ut perspiciatis unde omnis iste natus error sit
                                            voluptatem accusantium</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ============================================== BLOG SLIDER : END ============================================== -->
            </div>

            <!-- ============================================== CONTENT : END ============================================== -->
        </div>

        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')

        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>

</div>

@endsection
