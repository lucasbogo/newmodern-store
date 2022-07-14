@extends('frontend.main_master')
@section('content')

    <!-- Mostrar nome produto no título dinamicamente -->
@section('title')
    {{ $product->product_name_pt }}
@endsection



<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li><a href="#">Clothing</a></li>
                <li class='active'>Floral Print Buttoned</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row single-product'>
            <div class='col-md-3 sidebar'>
                <div class="sidebar-module-container">
                    <div class="home-banner outer-top-n">
                        <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image">
                    </div>



                    <!-- ============================================== HOT DEALS FRAGMENT ============================================== -->

                    @include('frontend.fragments.hot_deals')

                    <!-- ============================================== HOT DEALS /FRAGMENT ============================================== -->

                    <!-- ============================================== NEWSLETTER ============================================== -->
                    <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
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
                        </div><!-- /.sidebar-widget-body -->
                    </div><!-- /.sidebar-widget -->
                    <!-- ============================================== NEWSLETTER: END ============================================== -->

                    <!-- ============================================== Testimonials============================================== -->
                    <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                        <div id="advertisement" class="advertisement">
                            <div class="item">
                                <div class="avatar"><img src="assets/images/testimonials/member1.png" alt="Image">
                                </div>
                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">John Doe <span>Abc Company</span> </div>
                                <!-- /.container-fluid -->
                            </div><!-- /.item -->

                            <div class="item">
                                <div class="avatar"><img src="assets/images/testimonials/member3.png" alt="Image">
                                </div>
                                <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port
                                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
                            </div><!-- /.item -->

                            <div class="item">
                                <div class="avatar"><img src="assets/images/testimonials/member2.png" alt="Image">
                                </div>
                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
                                <!-- /.container-fluid -->
                            </div><!-- /.item -->

                        </div><!-- /.owl-carousel -->
                    </div>

                    <!-- ============================================== Testimonials: END ============================================== -->




                    <!-- ============================================== IMAGENS PRODUTOS COMEÇA AQUI =================================== -->


                </div>
            </div><!-- /.sidebar -->
            <div class='col-md-9'>
                <div class="detail-block">
                    <div class="row  wow fadeInUp">

                        <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                            <div class="product-item-holder size-big single-product-gallery small-gallery">

                                <div id="owl-single-product">
                                    <!-- Pegar a relaação de produtos com imagens e mostrar aqui -->
                                    @foreach ($images as $image)
                                        <div class="single-product-gallery-item" id="slide{{ $image->id }}">
                                            <a data-lightbox="image-1" data-title="Gallery"
                                                href="{{ asset($image->photo_name) }}">
                                                <img class="img-responsive" alt=""
                                                    src="{{ asset($image->photo_name) }}"
                                                    data-echo="{{ asset($image->photo_name) }}" />
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->
                                    @endforeach



                                </div><!-- /.single-product-slider -->
                                <!-- ============================================== IMAGENS PRODUTOS TERMINA AQUI =================================== -->


                                <!-- ============================================== THUMBNAILS PRODUTOS COMEÇA AQUI =================================== -->



                                <div class="single-product-gallery-thumbs gallery-thumbs">

                                    <div id="owl-single-product-thumbnails">

                                        <!-- Pegar a relaação de produtos com imagens e mostrar aqui -->
                                        @foreach ($images as $image)
                                            <div class="item">
                                                <a class="horizontal-thumb active" data-target="#owl-single-product"
                                                    data-slide="1" href="#slide{{ $image->id }}">
                                                    <img class="img-responsive" width="85" alt=""
                                                        src="{{ asset($image->photo_name) }}"
                                                        data-echo="{{ asset($image->photo_name) }}" />
                                                </a>
                                            </div>
                                        @endforeach


                                    </div><!-- /#owl-single-product-thumbnails -->



                                </div><!-- /.gallery-thumbs -->


                            </div><!-- /.single-product-gallery -->
                        </div><!-- /.gallery-holder -->


                        <!-- ========================= THUMBNAILS PRODUTOS TERMINA AQUI ========================-->



                        <!-- ============================= DADOS PRODUTO AQUI ======================== -->

                        <div class='col-sm-6 col-md-7 product-info-block'>
                            <div class="product-info">
                                <!-- ================ NOME AQUI =================-->
                                <h1 class="name">
                                    <!-- Lógica internacionalização mostrar nome produto -->
                                    @if (session()->get('language') == 'portuguese')
                                        {{ $product->product_name_pt }}
                                    @else
                                        {{ $product->product_name_en }}
                                    @endif
                                </h1>

                                <!-- ================ AVALIAÇÃO AQUI =================-->
                                <div class="rating-reviews m-t-20">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="rating rateit-small"></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="reviews">
                                                <a href="#" class="lnk">(13 Reviews)</a>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.rating-reviews -->

                                <!-- ================ DISPONIBILIDADE AQUI =================-->
                                <div class="stock-container info-container m-t-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="stock-box">
                                                <span class="label">Availability :</span>
                                            </div>
                                        </div>

                                        <!-- ================ ESTOQUE AQUI =================-->
                                        <div class="col-sm-9">
                                            <div class="stock-box">
                                                <span class="value">In Stock</span>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.stock-container -->

                                <!-- ================ DESCRIÇÃO CURTA AQUI =================-->
                                <div class="description-container m-t-20">
                                    <!-- Lógica internacionalização mostrar nome produto -->
                                    @if (session()->get('language') == 'portuguese')
                                        {{ $product->product_short_description_pt }}
                                    @else
                                        {{ $product->product_short_description_en }}
                                    @endif
                                </div><!-- /.description-container -->

                                <!-- ================ PREÇO AQUI =================-->
                                <div class="price-container info-container m-t-20">
                                    <div class="row">


                                        <div class="col-sm-6">
                                            <div class="price-box">

                                                <!-- se o campo desconto descont estiver nulo, mostrar apenas a classe "price" -->
                                                @if ($product->product_discount_price == null)
                                                    <span class="price">R$
                                                        {{ $product->product_selling_price }}</span>
                                                @else
                                                    <!-- caso contrário, mostrar os campos strike e preço depois do desconto -->
                                                    <span class="price">R$
                                                        {{ $product->product_discount_price }}</span>
                                                    <span class="price-strike">R$
                                                        {{ $product->product_selling_price }}</span>
                                                @endif

                                            </div>
                                        </div>

                                        <!-- ================ BOTÃO WISHLIST AQUI =================-->
                                        <div class="col-sm-6">
                                            <div class="favorite-button m-t-10">
                                                <a class="btn btn-primary" data-toggle="tooltip"
                                                    data-placement="right" title="Wishlist" href="#">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                                <a class="btn btn-primary" data-toggle="tooltip"
                                                    data-placement="right" title="Add to Compare" href="#">
                                                    <i class="fa fa-signal"></i>
                                                </a>
                                                <a class="btn btn-primary" data-toggle="tooltip"
                                                    data-placement="right" title="E-mail" href="#">
                                                    <i class="fa fa-envelope"></i>
                                                </a>
                                            </div>
                                        </div>

                                    </div><!-- /.row -->
                                </div><!-- /.price-container -->

                                <!-- ================ COR AQUI =================-->
                                <div class="row">
                                    <div class="col-sm-6">
                                        {{-- BOOTSTRAP TIRADO DE shopping-cart.html Flipmart Template --}}

                                        <div class="form-group">
                                            <label class="info-title control-label">
                                                <!-- Lógica internacionalização simples tradução da tag new -->
                                                @if (session()->get('language') == 'portuguese')
                                                    Escolher Cor
                                                @else
                                                    Choose Color
                                                @endif <span>*</span>
                                            </label>
                                            <select class="form-control unicase-form-control selectpicker">
                                                <option selected="" disabled="">--
                                                    <!-- Lógica internacionalização simples tradução da tag new -->
                                                    @if (session()->get('language') == 'portuguese')
                                                        Escolher Cor
                                                    @else
                                                        Choose Color
                                                    @endif--
                                                </option>
                                                <!-- Lógica internacionalização simples tradução  -->
                                                {{-- função ucwords() padroniza palvras, assim o mantendeor 
                                                    não precisa se procupar em digitar Maniusculas ou Minusculas --}}
                                                @if (session()->get('language') == 'portuguese')
                                                    @foreach ($product_color_pt as $cor)
                                                        <option value="{{ $cor }}">{{ ucwords($cor) }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    @foreach ($product_color_en as $color)
                                                        <option value="{{ $color }}">{{ ucwords($color) }}
                                                        </option>
                                                    @endforeach
                                                @endif--


                                            </select>
                                        </div>

                                    </div>

                                    <!-- ================ COR TERMINA AQUI =================-->

                                    <!-- ================ TAMANHO COMEÇA AQUI =================-->


                                    <div class="col-sm-6">
                                        {{-- BOOTSTRAP TIRADO DE shopping-cart.html Flipmart Template --}}

                                        {{-- <!-- condição if-else: tamanho protuo ingles e portugues forem nulos, 
                                            não mostrar campo tamanho na descrição do produto, caso contrário, seguir normalmente. --> --}}
                                        <div class="form-group">
                                            @if ($product->product_size_en and $product->product_size_pt == null)

                                            @else
                                                <label class="info-title control-label">
                                                    <!-- Lógica internacionalização simples tradução da tag new -->
                                                    @if (session()->get('language') == 'portuguese')
                                                        Escolher Tamanho
                                                    @else
                                                        Choose Size
                                                    @endif <span></span>
                                                </label>
                                                <select class="form-control unicase-form-control selectpicker">
                                                    <option selected="" disabled="">--
                                                        <!-- Lógica internacionalização simples tradução da tag new -->
                                                        @if (session()->get('language') == 'portuguese')
                                                            Escolher Tamanho
                                                        @else
                                                            Choose Size
                                                        @endif --
                                                    </option>
                                                    <!-- Lógica internacionalização simples tradução da tag new -->
                                                    {{-- função ucwords() padroniza palvras, assim o mantendeor 
                                                    não precisa se procupar em digitar Maniusculas ou Minusculas --}}
                                                    @if (session()->get('language') == 'portuguese')
                                                        @foreach ($product_size_pt as $tamanho)
                                                            <option value="{{ $tamanho }}">
                                                                {{ ucwords($tamanho) }}
                                                            </option>
                                                        @endforeach
                                                    @else
                                                        @foreach ($product_size_en as $size)
                                                            <option value="{{ $size }}">
                                                                {{ ucwords($size) }}
                                                            </option>
                                                        @endforeach
                                                    @endif--

                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- ================ TAMANHO TERMINA AQUI =================-->

                                    <!-- ================ PREÇO AQUI =================-->
                                    <div class="quantity-container info-container">
                                        <div class="row">

                                            <div class="col-sm-2">
                                                <span class="label">Qty :</span>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="cart-quantity">
                                                    <div class="quant-input">
                                                        <div class="arrows">
                                                            <div class="arrow plus gradient"><span class="ir"><i
                                                                        class="icon fa fa-sort-asc"></i></span></div>
                                                            <div class="arrow minus gradient"><span class="ir"><i
                                                                        class="icon fa fa-sort-desc"></i></span></div>
                                                        </div>
                                                        <input type="text" value="1">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-7">
                                                <a href="#" class="btn btn-primary"><i
                                                        class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                            </div>


                                        </div><!-- /.row -->
                                    </div><!-- /.quantity-container -->






                                </div><!-- /.product-info -->
                            </div><!-- /.col-sm-7 -->
                        </div><!-- /.row -->
                    </div>

                    <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                        <div class="row">
                            <div class="col-sm-3">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                    <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                    <li><a data-toggle="tab" href="#tags">TAGS</a></li>
                                </ul><!-- /.nav-tabs #product-tabs -->
                            </div>
                            <div class="col-sm-9">

                                <div class="tab-content">

                                    <!-- ================ DESCRIÇÃO LONGA AQUI =================-->
                                    <div id="description" class="tab-pane in active">
                                        <div class="product-tab">
                                            <p class="text">
                                                <!-- Lógica internacionalização mostrar nome produto -->
                                                @if (session()->get('language') == 'portuguese')
                                                    <!-- Sintaxe blade (!!) para evitar mostrar código HTML no frontend -->
                                                    {!! $product->product_long_description_pt !!}
                                                @else
                                                    {!! $product->product_long_description_en !!}
                                                @endif
                                            </p>
                                        </div>
                                    </div><!-- /.tab-pane -->

                                    <div id="review" class="tab-pane">
                                        <div class="product-tab">

                                            <div class="product-reviews">
                                                <h4 class="title">Customer Reviews</h4>

                                                <div class="reviews">
                                                    <div class="review">
                                                        <div class="review-title"><span class="summary">We love this
                                                                product</span><span class="date"><i
                                                                    class="fa fa-calendar"></i><span>1 days
                                                                    ago</span></span></div>
                                                        <div class="text">"Lorem ipsum dolor sit amet, consectetur
                                                            adipiscing elit.Aliquam suscipit."</div>
                                                    </div>

                                                </div><!-- /.reviews -->
                                            </div><!-- /.product-reviews -->



                                            <div class="product-add-review">
                                                <h4 class="title">Write your own review</h4>
                                                <div class="review-table">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="cell-label">&nbsp;</th>
                                                                    <th>1 star</th>
                                                                    <th>2 stars</th>
                                                                    <th>3 stars</th>
                                                                    <th>4 stars</th>
                                                                    <th>5 stars</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="cell-label">Quality</td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="1"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="2"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="3"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="4"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="5"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="cell-label">Price</td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="1"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="2"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="3"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="4"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="5"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="cell-label">Value</td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="1"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="2"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="3"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="4"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="5"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table><!-- /.table .table-bordered -->
                                                    </div><!-- /.table-responsive -->
                                                </div><!-- /.review-table -->

                                                <div class="review-form">
                                                    <div class="form-container">
                                                        <form role="form" class="cnt-form">

                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputName">Your Name <span
                                                                                class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt"
                                                                            id="exampleInputName" placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                    <div class="form-group">
                                                                        <label for="exampleInputSummary">Summary <span
                                                                                class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt"
                                                                            id="exampleInputSummary" placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputReview">Review <span
                                                                                class="astk">*</span></label>
                                                                        <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                                    </div><!-- /.form-group -->
                                                                </div>
                                                            </div><!-- /.row -->

                                                            <div class="action text-right">
                                                                <button class="btn btn-primary btn-upper">SUBMIT
                                                                    REVIEW</button>
                                                            </div><!-- /.action -->

                                                        </form><!-- /.cnt-form -->
                                                    </div><!-- /.form-container -->
                                                </div><!-- /.review-form -->

                                            </div><!-- /.product-add-review -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                    <div id="tags" class="tab-pane">
                                        <div class="product-tag">

                                            <h4 class="title">Product Tags</h4>
                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-container">

                                                    <div class="form-group">
                                                        <label for="exampleInputTag">Add Your Tags: </label>
                                                        <input type="email" id="exampleInputTag"
                                                            class="form-control txt">


                                                    </div>

                                                    <button class="btn btn-upper btn-primary" type="submit">ADD
                                                        TAGS</button>
                                                </div><!-- /.form-container -->
                                            </form><!-- /.form-cnt -->

                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <span class="text col-md-offset-3">Use spaces to separate tags. Use
                                                        single quotes (') for phrases.</span>
                                                </div>
                                            </form><!-- /.form-cnt -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                </div><!-- /.tab-content -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.product-tabs -->

                    <!-- ============================================== PRODUTOS RELACIONADOS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">
                            <!-- Lógica internacionalização simples tradução da tag new -->
                            @if (session()->get('language') == 'portuguese')
                                Produtos Relacionados
                            @else
                                Related Products
                            @endif
                        </h3>
                        <div
                            class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

                            @foreach ($related as $product)
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
                                                <!-- /.image -->

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
                                            <!-- /.product-image -->

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
                                                    <!-- /.product_selling_price without discount -->
                                                @else
                                                    <!-- caso contrário, mostrar valor com o desconto -->
                                                    <div class="product-price"> <span class="price">
                                                            {{ $product->product_discount_price }}
                                                        </span><span class="price-before-discount">
                                                            {{ $product->product_selling_price }}
                                                        </span>
                                                    </div>
                                                    <!-- /.product_discount_price with discount -->
                                                @endif

                                            </div>
                                            <!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            <button data-toggle="tooltip" class="btn btn-primary icon"
                                                                type="button" title="Add Cart"> <i
                                                                    class="fa fa-shopping-cart"></i>
                                                            </button>
                                                            <button class="btn btn-primary cart-btn"
                                                                type="button">Add to
                                                                cart</button>
                                                        </li>
                                                        <li class="lnk wishlist"> <a data-toggle="tooltip"
                                                                class="add-to-cart" href="detail.html"
                                                                title="Wishlist">
                                                                <i class="icon fa fa-heart"></i>
                                                            </a> </li>
                                                        <li class="lnk"> <a data-toggle="tooltip"
                                                                class="add-to-cart" href="detail.html"
                                                                title="Compare"> <i class="fa fa-signal"
                                                                    aria-hidden="true"></i> </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- /.action -->
                                            </div>
                                            <!-- /.cart -->
                                        </div>
                                        <!-- /.product -->

                                    </div>
                                    <!-- /.products -->
                                </div>
                                <!-- /.item CAROUSEL IMPORTANTE -->
                            @endforeach
                        </div>
                        <!-- /.home-owl-carousel -->
                    </section><!-- /.section -->

                    <!-- ==============================================  PRODUTOS RELACIONADO FINAL ============================================== -->
                </div>
            </div><!-- /.col -->
            <div class="clearfix"></div>
        </div><!-- /.row -->
    </div><!-- /.row -->

    @include('frontend.body.brands')
@endsection
