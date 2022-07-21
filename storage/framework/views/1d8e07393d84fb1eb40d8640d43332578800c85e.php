<?php $__env->startSection('content'); ?>

<?php $__env->startSection('title'); ?>
    NewModern Home
<?php $__env->stopSection(); ?>
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                <!-- ======= MENU VERTICAL CATEGORIAS =========== -->

                <?php echo $__env->make('frontend.fragments.vertical_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <!-- ===== MENU VERTICAL CATEGORIAL FINAL ======== -->

                <!-- ============================================== HOT DEALS FRAGMENT ============================================== -->

                <?php echo $__env->make('frontend.fragments.hot_deals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <!-- ============================================== HOT DEALS /FRAGMENT ============================================== -->

                <!-- ============================================== SPECIAL OFFER COMEÇA AQUI ============================================== -->

                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">
                        <!-- Lógica internacionalização simples tradução da tag new -->
                        <?php if(session()->get('language') == 'portuguese'): ?>
                            Oferta Especial
                        <?php else: ?>
                            Special Offer
                        <?php endif; ?>
                    </h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">


                            <div class="item">

                                <div class="products special-product">

                                    <?php $__currentLoopData = $specialoffers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a
                                                                    href="<?php echo e(url('product/details/' . $product->id . '/' . $product->product_slug_en)); ?>">
                                                                    <img src="<?php echo e(asset($product->product_thumbnail)); ?>"
                                                                        alt=""> </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a
                                                                    href="<?php echo e(url('product/details/' . $product->id . '/' . $product->product_slug_en)); ?>">
                                                                    <!-- Lógica internacionalização mostrar nome produto -->
                                                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                                                        <?php echo e($product->product_name_pt); ?>

                                                                    <?php else: ?>
                                                                        <?php echo e($product->product_name_en); ?>

                                                                    <?php endif; ?>
                                                                </a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    <!-- Lógica: se não houver desconto, aparecer o valor normal (product_selling_price)...-->
                                                                    <?php if($product->product_discount_price == null): ?>
                                                                        <div class="product-price"> <span
                                                                                class="price">
                                                                                <?php echo e($product->product_selling_price); ?>

                                                                            </span>
                                                                        </div>
                                                                        <!-- /.product_selling_price without discount -->
                                                                    <?php else: ?>
                                                                        <!-- caso contrário, mostrar valor com o desconto -->
                                                                        <div class="product-price"> <span
                                                                                class="price">
                                                                                <?php echo e($product->product_discount_price); ?>

                                                                            </span><span class="price-before-discount">
                                                                                <?php echo e($product->product_selling_price); ?>

                                                                            </span>
                                                                        </div>
                                                                        <!-- /.product_discount_price with discount -->
                                                                    <?php endif; ?>
                                                                </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <!-- Start here -->

                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL TERMINA AQUI ================================================== -->



                <!-- ====================== PRODUCT TAGS COMEÇA AQUI ARRUMAR BUG E IMPELMENTAR FUTURAMENTE ================================ -->

                

                <!-- ============================================== PRODUCT TAGS TERMINA AQUI ============================================== -->



                <!-- ============================================== SPECIAL DEALS COMEÇA AQUI ============================================== -->

                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">
                        <!-- Lógica internacionalização simples tradução da tag new -->
                        <?php if(session()->get('language') == 'portuguese'): ?>
                            Oferta Unica
                        <?php else: ?>
                            Special Deals
                        <?php endif; ?>
                    </h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                            <div class="item">
                                <div class="products special-product">

                                    <?php $__currentLoopData = $specialdeals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a
                                                                    href="<?php echo e(url('product/details/' . $product->id . '/' . $product->product_slug_en)); ?>">
                                                                    <img src="<?php echo e(asset($product->product_thumbnail)); ?>"
                                                                        alt=""> </a> </div>


                                                        </div>

                                                    </div>

                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a
                                                                    href="<?php echo e(url('product/details/' . $product->id . '/' . $product->product_slug_en)); ?>">
                                                                    <!-- Lógica internacionalização mostrar nome produto -->
                                                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                                                        <?php echo e($product->product_name_pt); ?>

                                                                    <?php else: ?>
                                                                        <?php echo e($product->product_name_en); ?>

                                                                    <?php endif; ?>
                                                                </a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    <!-- Lógica: se não houver desconto, aparecer o valor normal (product_selling_price)...-->
                                                                    <?php if($product->product_discount_price == null): ?>
                                                                        <div class="product-price"> <span
                                                                                class="price">
                                                                                <?php echo e($product->product_selling_price); ?>

                                                                            </span>
                                                                        </div>
                                                                        <!-- /.product_selling_price without discount -->
                                                                    <?php else: ?>
                                                                        <!-- caso contrário, mostrar valor com o desconto -->
                                                                        <div class="product-price"> <span
                                                                                class="price">
                                                                                <?php echo e($product->product_discount_price); ?>

                                                                            </span><span class="price-before-discount">
                                                                                <?php echo e($product->product_selling_price); ?>

                                                                            </span>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                <?php echo $__env->make('frontend.fragments.store_reviews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <!-- =============================================== AVALIAÇÕES LOJA /FRAGMENTAÇÃO ========================================= -->




                <div class="home-banner"> <img src="<?php echo e(asset('frontend/assets/images/banners/LHS-banner.jpg')); ?>"
                        alt="Image"> </div>
            </div>




            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">

                <!-- ========================================== SLIDERS ========================================= -->

                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

                        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item" style="background-image: url(<?php echo e(asset($slider->slider_image)); ?>);">
                                <div class="container-fluid">
                                    <div class="caption bg-color vertical-center text-left">

                                        <div class="big-text fadeInDown-1"> <?php echo e($slider->slider_title); ?> </div>
                                        <div class="excerpt fadeInDown-2 hidden-xs">
                                            <span><?php echo e($slider->slider_description); ?> </span>
                                        </div>
                                        <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product"
                                                class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop
                                                Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



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
                            <?php if(session()->get('language') == 'portuguese'): ?>
                                Novos Produtos
                            <?php else: ?>
                                New Products
                            <?php endif; ?>
                        </h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">

                            <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">
                                    <!-- Lógica internacionalização simples tradução -->
                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                        Todos
                                    <?php else: ?>
                                        All
                                    <?php endif; ?>
                                </a></li>

                            <!-- loop condicional para 'baixar' os dados categoria na index.home -->
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a data-transition-type="backSlide" href="#category<?php echo e($category->id); ?>"
                                        data-toggle="tab">
                                        <!-- Lógica internacionalização mostrar nome categoria -->
                                        <?php if(session()->get('language') == 'portuguese'): ?>
                                            <?php echo e($category->category_name_pt); ?>

                                        <?php else: ?>
                                            <?php echo e($category->category_name_en); ?>

                                        <?php endif; ?>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </ul>
                    </div>

                    <div class="tab-content outer-top-xs">

                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                                    <!-- loop condicional para 'baixar' os dados categoria na index.home -->
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item item-carousel">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <!-- url para acessar detalhes do produto ao clickar na imagem produto -->
                                                            <a
                                                                href="<?php echo e(url('product/details/' . $product->id . '/' . $product->product_slug_en)); ?>">
                                                                <!-- mostrar miniatura produto dinamicamente em 'novos produtos' -->
                                                                <img src="<?php echo e(asset($product->product_thumbnail)); ?>"
                                                                    alt="">
                                                            </a>
                                                        </div>


                                                        <!-- Lógica porcentagem -->
                                                        <?php
                                                            $discount = $product->product_selling_price - $product->product_discount_price;
                                                            $percentage = ($discount / $product->product_selling_price) * 100;
                                                        ?>

                                                        <div>
                                                            <!-- Lógica: se não houver desconto, aparecer a a tag new...-->
                                                            <?php if($product->product_discount_price == null): ?>
                                                                <div class="tag new"><span>
                                                                        <!-- Lógica internacionalização simples tradução da tag new -->
                                                                        <?php if(session()->get('language') == 'portuguese'): ?>
                                                                            NOVO
                                                                        <?php else: ?>
                                                                            NEW
                                                                        <?php endif; ?>
                                                                    </span></div>
                                                            <?php else: ?>
                                                                <!-- caso contrário, mostrar a porcentagem de desconto -->
                                                                <div class="tag hot">
                                                                    <span><?php echo e(round($percentage)); ?> %</span>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>



                                                    </div>


                                                    <!-- =============== DETALHES DO PRODUTO COMEÇA AQUI" =================== -->

                                                    <div class="product-info text-left">
                                                        <!-- url: ao clickar em um produto específico, redirencianar para a página detalahe do produto -->
                                                        <h3 class="name"><a
                                                                href="<?php echo e(url('product/details/' . $product->id . '/' . $product->product_slug_en)); ?>">
                                                                <!-- Lógica internacionalização mostrar nome produto -->
                                                                <?php if(session()->get('language') == 'portuguese'): ?>
                                                                    <?php echo e($product->product_name_pt); ?>

                                                                <?php else: ?>
                                                                    <?php echo e($product->product_name_en); ?>

                                                                <?php endif; ?>
                                                            </a>
                                                        </h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="description"></div>

                                                        <!--== LÓGICA P/ MOSTRAR VALOR PRODUTO DINAMICAMENTE ==-->

                                                        <!-- Lógica: se não houver desconto, aparecer o valor normal (product_selling_price)...-->
                                                        <?php if($product->product_discount_price == null): ?>
                                                            <div class="product-price"> <span class="price">
                                                                    <?php echo e($product->product_selling_price); ?>

                                                                </span>
                                                            </div>
                                                        <?php else: ?>
                                                            <!-- caso contrário, mostrar valor com o desconto -->
                                                            <div class="product-price"> <span class="price">
                                                                    <?php echo e($product->product_discount_price); ?>

                                                                </span><span class="price-before-discount">
                                                                    <?php echo e($product->product_selling_price); ?>

                                                                </span>
                                                            </div>
                                                        <?php endif; ?>

                                                    </div>

                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">
                                                                    <button data-toggle="tooltip"
                                                                        class="btn btn-primary icon" type="button"
                                                                        title="Add Cart"> <i
                                                                            class="fa fa-shopping-cart"></i> </button>
                                                                    <button class="btn btn-primary cart-btn"
                                                                        type="button">Add to cart</button>
                                                                </li>
                                                                <li class="lnk wishlist"> <a data-toggle="tooltip"
                                                                        class="add-to-cart" href="detail.html"
                                                                        title="Wishlist"> <i
                                                                            class="icon fa fa-heart"></i>
                                                                    </a> </li>
                                                                <li class="lnk"> <a data-toggle="tooltip"
                                                                        class="add-to-cart" href="detail.html"
                                                                        title="Compare"> <i class="fa fa-signal"
                                                                            aria-hidden="true"></i> </a> </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>

                        <!--======================================== /.nav-tabs PRIMEIRO ============================================ -->


                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tab-pane" id="category<?php echo e($category->id); ?>">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme"
                                        data-item="4">

                                        <!-- buscar os produtos por suas respectivas categorias -->
                                        <?php
                                            $categorised_product = App\Models\Product::where('category_id', $category->id)
                                                ->orderBy('id', 'DESC')
                                                ->get();
                                        ?>


                                        <!-- loop condicional para 'baixar' os dados produto por categoria na index.home -->
                                        <?php $__empty_1 = true; $__currentLoopData = $categorised_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <div class="item item-carousel">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <!-- url para redirecionar para pagina detalhes produto ao clickar na imagem -->
                                                                <a
                                                                    href="<?php echo e(url('product/details/' . $product->id . '/' . $product->product_slug_en)); ?>">
                                                                    <!-- mostrar miniatura produto dinamicamente em 'novos produtos' -->
                                                                    <img src="<?php echo e(asset($product->product_thumbnail)); ?>"
                                                                        alt="">
                                                                </a>
                                                            </div>

                                                            <!-- Lógica porcentagem -->
                                                            <?php
                                                                $discount = $product->product_selling_price - $product->product_discount_price;
                                                                $percentage = ($discount / $product->product_selling_price) * 100;
                                                            ?>

                                                            <div>
                                                                <!-- Lógica: se não houver desconto, aparecer a a tag new...-->
                                                                <?php if($product->product_discount_price == null): ?>
                                                                    <div class="tag new"><span>
                                                                            <!-- Lógica internacionalização simples tradução da tag new -->
                                                                            <?php if(session()->get('language') == 'portuguese'): ?>
                                                                                NOVO
                                                                            <?php else: ?>
                                                                                NEW
                                                                            <?php endif; ?>
                                                                        </span></div>
                                                                <?php else: ?>
                                                                    <!-- caso contrário, mostrar a porcentagem de desconto -->
                                                                    <div class="tag hot">
                                                                        <span><?php echo e(round($percentage)); ?> %</span>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>



                                                        </div>


                                                        <div class="product-info text-left">
                                                            <h3 class="name">
                                                                <!-- url para redirecionar para pagina detalhes produto ao clickar no nome produto -->
                                                                <a
                                                                    href="<?php echo e(url('product/details/' . $product->id . '/' . $product->product_slug_en)); ?>">
                                                                    <!-- Lógica internacionalização mostrar nome produto -->
                                                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                                                        <?php echo e($product->product_name_pt); ?>

                                                                    <?php else: ?>
                                                                        <?php echo e($product->product_name_en); ?>

                                                                    <?php endif; ?>
                                                                </a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="description"></div>

                                                            <!--== LÓGICA P/ MOSTRAR VALOR PRODUTO DINAMICAMENTE ==-->

                                                            <!-- Lógica: se não houver desconto, aparecer o valor normal (product_selling_price)...-->
                                                            <?php if($product->product_discount_price == null): ?>
                                                                <div class="product-price"> <span class="price">
                                                                        <?php echo e($product->product_selling_price); ?>

                                                                    </span>
                                                                </div>
                                                            <?php else: ?>
                                                                <!-- caso contrário, mostrar valor com o desconto -->
                                                                <div class="product-price"> <span class="price">
                                                                        <?php echo e($product->product_discount_price); ?>

                                                                    </span><span class="price-before-discount">
                                                                        <?php echo e($product->product_selling_price); ?>

                                                                    </span>
                                                                </div>
                                                            <?php endif; ?>

                                                        </div>

                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <button data-toggle="tooltip"
                                                                            class="btn btn-primary icon"
                                                                            type="button" title="Add Cart"> <i
                                                                                class="fa fa-shopping-cart"></i>
                                                                        </button>
                                                                        <button class="btn btn-primary cart-btn"
                                                                            type="button">Add to cart</button>
                                                                    </li>
                                                                    <li class="lnk wishlist"> <a data-toggle="tooltip"
                                                                            class="add-to-cart" href="detail.html"
                                                                            title="Wishlist"> <i
                                                                                class="icon fa fa-heart"></i>
                                                                        </a> </li>
                                                                    <li class="lnk"> <a data-toggle="tooltip"
                                                                            class="add-to-cart" href="detail.html"
                                                                            title="Compare"> <i class="fa fa-signal"
                                                                                aria-hidden="true"></i> </a> </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <h5 class="text-danger">
                                                <!-- Lógica internacionalização mostrar mensagem de falta de produto ao selecionar uma categoria sem produtos -->
                                                <?php if(session()->get('language') == 'portuguese'): ?>
                                                    Categoria sem Produtos
                                                <?php else: ?>
                                                    Category without Products
                                                <?php endif; ?>
                                            </h5>
                                        <?php endif; ?>



                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <!-- ============================================== SCROLL TABS : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-7 col-sm-7">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive"
                                        src="<?php echo e(asset('frontend/assets/images/banners/home-banner1.jpg')); ?>"
                                        alt=""> </div>
                            </div>

                        </div>

                        <div class="col-md-5 col-sm-5">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive"
                                        src="<?php echo e(asset('frontend/assets/images/banners/home-banner2.jpg')); ?>"
                                        alt=""> </div>
                            </div>

                        </div>

                    </div>
                </div>


                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->



                <!-- ============================================== FEATURED PRODUCTS COMEÇA AQUI ===================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">
                        <!-- Lógica internacionalização simples tradução da tag new -->
                        <?php if(session()->get('language') == 'portuguese'): ?>
                            Produtos em Destaque
                        <?php else: ?>
                            Featured Products
                        <?php endif; ?>
                    </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                        <?php $__currentLoopData = $featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <!-- url para redirecionar para pagina detalhes produto ao clickar na imagem -->
                                                <a
                                                    href="<?php echo e(url('product/details/' . $product->id . '/' . $product->product_slug_en)); ?>">
                                                    <!-- mostrar miniatura produto dinamicamente em 'novos produtos' -->
                                                    <img src="<?php echo e(asset($product->product_thumbnail)); ?>"
                                                        alt="">
                                                </a>
                                            </div>


                                            <!-- Lógica porcentagem -->
                                            <?php
                                                $discount = $product->product_selling_price - $product->product_discount_price;
                                                $percentage = ($discount / $product->product_selling_price) * 100;
                                            ?>

                                            <div>
                                                <!-- Lógica: se não houver desconto, aparecer a a tag new...-->
                                                <?php if($product->product_discount_price == null): ?>
                                                    <div class="tag new"><span>
                                                            <!-- Lógica internacionalização simples tradução da tag new -->
                                                            <?php if(session()->get('language') == 'portuguese'): ?>
                                                                NOVO
                                                            <?php else: ?>
                                                                NEW
                                                            <?php endif; ?>
                                                        </span></div>
                                                <?php else: ?>
                                                    <!-- caso contrário, mostrar a porcentagem de desconto -->
                                                    <div class="tag hot">
                                                        <span><?php echo e(round($percentage)); ?> %</span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>



                                        </div>


                                        <div class="product-info text-left">
                                            <h3 class="name">
                                                <!-- url para redirecionar para pagina detalhes produto ao clickar no nome produto -->
                                                <a
                                                    href="<?php echo e(url('product/details/' . $product->id . '/' . $product->product_slug_en)); ?>">
                                                    <!-- Lógica internacionalização mostrar nome produto -->
                                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                                        <?php echo e($product->product_name_pt); ?>

                                                    <?php else: ?>
                                                        <?php echo e($product->product_name_en); ?>

                                                    <?php endif; ?>
                                                </a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            <!--== LÓGICA P/ MOSTRAR VALOR PRODUTO DINAMICAMENTE ==-->

                                            <!-- Lógica: se não houver desconto, aparecer o valor normal (product_selling_price)...-->
                                            <?php if($product->product_discount_price == null): ?>
                                                <div class="product-price"> <span class="price">
                                                        <?php echo e($product->product_selling_price); ?>

                                                    </span>
                                                </div>
                                            <?php else: ?>
                                                <!-- caso contrário, mostrar valor com o desconto -->
                                                <div class="product-price"> <span class="price">
                                                        <?php echo e($product->product_discount_price); ?>

                                                    </span><span class="price-before-discount">
                                                        <?php echo e($product->product_selling_price); ?>

                                                    </span>
                                                </div>
                                            <?php endif; ?>

                                        </div>

                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <!-- ========== BOTÃO ADICIONAR AO CARRINHO ======= -->
                                                    <li class="add-cart-button btn-group">

                                                        <!-- Modal Bootstrap Button -->
                                                        <button class="btn btn-primary icon" type="button"
                                                            title="Add Cart" data-toggle="modal"
                                                            data-target="#exampleModal" id="<?php echo e($product->id); ?>"
                                                            onclick="productView(this.id)"> <i
                                                                class="fa fa-shopping-cart"></i>
                                                        </button>

                                                        <button class="btn btn-primary cart-btn" type="button">
                                                            <!-- Lógica internacionalização simples tradução da tag new -->
                                                            <?php if(session()->get('language') == 'portuguese'): ?>
                                                                Adicionar
                                                            <?php else: ?>
                                                                Add to Cart
                                                            <?php endif; ?>
                                                        </button>
                                                    </li>
                                                    <!-- ========== /BOTÃO ADICIONAR AO CARRINHO ======= -->

                                                    <!-- ========== BOTÃO WISHLIST ======= -->


                                                    <!-- Wishlist Button -->
                                                    <button class="btn btn-primary icon" type="button"
                                                        title="Wishlist" id="<?php echo e($product->id); ?>"
                                                        onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i>
                                                    </button>


                                                    <!-- ========== /BOTÃO WISHLIST ======== -->

                                                    <!-- ========== BOTÃO COMPARE ========== -->
                                                    <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"
                                                            href="detail.html" title="Compare"> <i
                                                                class="fa fa-signal" aria-hidden="true"></i> </a>
                                                    </li>

                                                    <!-- ========== /BOTÃO COMPARE ========== -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </section>


                <!-- ================================ FEATURED PRODUCTS TERMINA AQUI =========================================== -->



                <!-- ============================================== BANNER ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive"
                                        src="<?php echo e(asset('frontend/assets/images/banners/home-banner.jpg')); ?>"
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
                        <?php if(session()->get('language') == 'portuguese'): ?>
                            <?php echo e($skip_category_0->category_name_pt); ?>

                        <?php else: ?>
                            <?php echo e($skip_category_0->category_name_en); ?>

                        <?php endif; ?>
                    </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                        <?php $__currentLoopData = $skip_product_0; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <!-- url para redirecionar para pagina detalhes produto ao clickar na imagem -->
                                                <a
                                                    href="<?php echo e(url('product/details/' . $product->id . '/' . $product->product_slug_en)); ?>">
                                                    <!-- mostrar miniatura produto dinamicamente em 'novos produtos' -->
                                                    <img src="<?php echo e(asset($product->product_thumbnail)); ?>"
                                                        alt="">
                                                </a>
                                            </div>


                                            <!-- Lógica porcentagem -->
                                            <?php
                                                $discount = $product->product_selling_price - $product->product_discount_price;
                                                $percentage = ($discount / $product->product_selling_price) * 100;
                                            ?>

                                            <div>
                                                <!-- Lógica: se não houver desconto, aparecer a a tag new...-->
                                                <?php if($product->product_discount_price == null): ?>
                                                    <div class="tag new"><span>
                                                            <!-- Lógica internacionalização simples tradução da tag new -->
                                                            <?php if(session()->get('language') == 'portuguese'): ?>
                                                                NOVO
                                                            <?php else: ?>
                                                                NEW
                                                            <?php endif; ?>
                                                        </span></div>
                                                <?php else: ?>
                                                    <!-- caso contrário, mostrar a porcentagem de desconto -->
                                                    <div class="tag hot">
                                                        <span><?php echo e(round($percentage)); ?> %</span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>



                                        </div>


                                        <div class="product-info text-left">
                                            <h3 class="name">
                                                <!-- url para redirecionar para pagina detalhes produto ao clickar no nome produto -->
                                                <a
                                                    href="<?php echo e(url('product/details/' . $product->id . '/' . $product->product_slug_en)); ?>">
                                                    <!-- Lógica internacionalização mostrar nome produto -->
                                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                                        <?php echo e($product->product_name_pt); ?>

                                                    <?php else: ?>
                                                        <?php echo e($product->product_name_en); ?>

                                                    <?php endif; ?>
                                                </a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            <!--== LÓGICA P/ MOSTRAR VALOR PRODUTO DINAMICAMENTE ==-->

                                            <!-- Lógica: se não houver desconto, aparecer o valor normal (product_selling_price)...-->
                                            <?php if($product->product_discount_price == null): ?>
                                                <div class="product-price"> <span class="price">
                                                        <?php echo e($product->product_selling_price); ?>

                                                    </span>
                                                </div>
                                            <?php else: ?>
                                                <!-- caso contrário, mostrar valor com o desconto -->
                                                <div class="product-price"> <span class="price">
                                                        <?php echo e($product->product_discount_price); ?>

                                                    </span><span class="price-before-discount">
                                                        <?php echo e($product->product_selling_price); ?>

                                                    </span>
                                                </div>
                                            <?php endif; ?>

                                        </div>

                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button data-toggle="tooltip" class="btn btn-primary icon"
                                                            type="button" title="Add Cart"> <i
                                                                class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                                            cart</button>
                                                    </li>
                                                    <li class="lnk wishlist"> <a data-toggle="tooltip"
                                                            class="add-to-cart" href="detail.html" title="Wishlist">
                                                            <i class="icon fa fa-heart"></i>
                                                        </a> </li>
                                                    <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"
                                                            href="detail.html" title="Compare"> <i
                                                                class="fa fa-signal" aria-hidden="true"></i> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </section>

                <!-- ================================ SKIP CATEGORY 0 PRODUCTS TERMINA AQUI =========================================== -->

                <!-- ================================ SKIP CATEGORY 1 PRODUCTS COMEÇA AQUI =========================================== -->

                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">
                        <?php if(session()->get('language') == 'portuguese'): ?>
                            <?php echo e($skip_category_1->category_name_pt); ?>

                        <?php else: ?>
                            <?php echo e($skip_category_1->category_name_en); ?>

                        <?php endif; ?>
                    </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                        <?php $__currentLoopData = $skip_product_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <!-- url para redirecionar para pagina detalhes produto ao clickar na imagem -->
                                                <a
                                                    href="<?php echo e(url('product/details/' . $product->id . '/' . $product->product_slug_en)); ?>">
                                                    <!-- mostrar miniatura produto dinamicamente em 'novos produtos' -->
                                                    <img src="<?php echo e(asset($product->product_thumbnail)); ?>"
                                                        alt="">
                                                </a>
                                            </div>


                                            <!-- Lógica porcentagem -->
                                            <?php
                                                $discount = $product->product_selling_price - $product->product_discount_price;
                                                $percentage = ($discount / $product->product_selling_price) * 100;
                                            ?>

                                            <div>
                                                <!-- Lógica: se não houver desconto, aparecer a a tag new...-->
                                                <?php if($product->product_discount_price == null): ?>
                                                    <div class="tag new"><span>
                                                            <!-- Lógica internacionalização simples tradução da tag new -->
                                                            <?php if(session()->get('language') == 'portuguese'): ?>
                                                                NOVO
                                                            <?php else: ?>
                                                                NEW
                                                            <?php endif; ?>
                                                        </span></div>
                                                <?php else: ?>
                                                    <!-- caso contrário, mostrar a porcentagem de desconto -->
                                                    <div class="tag hot">
                                                        <span><?php echo e(round($percentage)); ?> %</span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>



                                        </div>


                                        <div class="product-info text-left">
                                            <h3 class="name">
                                                <!-- url para redirecionar para pagina detalhes produto ao clickar no nome produto -->
                                                <a
                                                    href="<?php echo e(url('product/details/' . $product->id . '/' . $product->product_slug_en)); ?>">
                                                    <!-- Lógica internacionalização mostrar nome produto -->
                                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                                        <?php echo e($product->product_name_pt); ?>

                                                    <?php else: ?>
                                                        <?php echo e($product->product_name_en); ?>

                                                    <?php endif; ?>
                                                </a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            <!--== LÓGICA P/ MOSTRAR VALOR PRODUTO DINAMICAMENTE ==-->

                                            <!-- Lógica: se não houver desconto, aparecer o valor normal (product_selling_price)...-->
                                            <?php if($product->product_discount_price == null): ?>
                                                <div class="product-price"> <span class="price">
                                                        <?php echo e($product->product_selling_price); ?>

                                                    </span>
                                                </div>
                                            <?php else: ?>
                                                <!-- caso contrário, mostrar valor com o desconto -->
                                                <div class="product-price"> <span class="price">
                                                        <?php echo e($product->product_discount_price); ?>

                                                    </span><span class="price-before-discount">
                                                        <?php echo e($product->product_selling_price); ?>

                                                    </span>
                                                </div>
                                            <?php endif; ?>

                                        </div>

                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button data-toggle="tooltip" class="btn btn-primary icon"
                                                            type="button" title="Add Cart"> <i
                                                                class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                                            cart</button>
                                                    </li>
                                                    <li class="lnk wishlist"> <a data-toggle="tooltip"
                                                            class="add-to-cart" href="detail.html" title="Wishlist">
                                                            <i class="icon fa fa-heart"></i>
                                                        </a> </li>
                                                    <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"
                                                            href="detail.html" title="Compare"> <i
                                                                class="fa fa-signal" aria-hidden="true"></i> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                </section>

                <!-- ================================ SKIP CATEGORY 1 PRODUCTS TERMINA AQUI =========================================== -->

                <!-- ================================ SKIP BRAND 1 PRODUCTS COMEÇA AQUI =========================================== -->

                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">
                        <?php if(session()->get('language') == 'portuguese'): ?>
                            <?php echo e($skip_brand_1->brand_name_pt); ?>

                        <?php else: ?>
                            <?php echo e($skip_brand_1->brand_name_en); ?>

                        <?php endif; ?>
                    </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                        <?php $__currentLoopData = $skip_brand_product_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <!-- url para redirecionar para pagina detalhes produto ao clickar na imagem -->
                                                <a
                                                    href="<?php echo e(url('product/details/' . $product->id . '/' . $product->product_slug_en)); ?>">
                                                    <!-- mostrar miniatura produto dinamicamente em 'novos produtos' -->
                                                    <img src="<?php echo e(asset($product->product_thumbnail)); ?>"
                                                        alt="">
                                                </a>
                                            </div>


                                            <!-- Lógica porcentagem -->
                                            <?php
                                                $discount = $product->product_selling_price - $product->product_discount_price;
                                                $percentage = ($discount / $product->product_selling_price) * 100;
                                            ?>

                                            <div>
                                                <!-- Lógica: se não houver desconto, aparecer a a tag new...-->
                                                <?php if($product->product_discount_price == null): ?>
                                                    <div class="tag new"><span>
                                                            <!-- Lógica internacionalização simples tradução da tag new -->
                                                            <?php if(session()->get('language') == 'portuguese'): ?>
                                                                NOVO
                                                            <?php else: ?>
                                                                NEW
                                                            <?php endif; ?>
                                                        </span></div>
                                                <?php else: ?>
                                                    <!-- caso contrário, mostrar a porcentagem de desconto -->
                                                    <div class="tag hot">
                                                        <span><?php echo e(round($percentage)); ?> %</span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>



                                        </div>


                                        <div class="product-info text-left">
                                            <h3 class="name">
                                                <!-- url para redirecionar para pagina detalhes produto ao clickar no nome produto -->
                                                <a
                                                    href="<?php echo e(url('product/details/' . $product->id . '/' . $product->product_slug_en)); ?>">
                                                    <!-- Lógica internacionalização mostrar nome produto -->
                                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                                        <?php echo e($product->product_name_pt); ?>

                                                    <?php else: ?>
                                                        <?php echo e($product->product_name_en); ?>

                                                    <?php endif; ?>
                                                </a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            <!--== LÓGICA P/ MOSTRAR VALOR PRODUTO DINAMICAMENTE ==-->

                                            <!-- Lógica: se não houver desconto, aparecer o valor normal (product_selling_price)...-->
                                            <?php if($product->product_discount_price == null): ?>
                                                <div class="product-price"> <span class="price">
                                                        <?php echo e($product->product_selling_price); ?>

                                                    </span>
                                                </div>
                                            <?php else: ?>
                                                <!-- caso contrário, mostrar valor com o desconto -->
                                                <div class="product-price"> <span class="price">
                                                        <?php echo e($product->product_discount_price); ?>

                                                    </span><span class="price-before-discount">
                                                        <?php echo e($product->product_selling_price); ?>

                                                    </span>
                                                </div>
                                            <?php endif; ?>

                                        </div>

                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button data-toggle="tooltip" class="btn btn-primary icon"
                                                            type="button" title="Add Cart"> <i
                                                                class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                                            cart</button>
                                                    </li>
                                                    <li class="lnk wishlist"> <a data-toggle="tooltip"
                                                            class="add-to-cart" href="detail.html" title="Wishlist">
                                                            <i class="icon fa fa-heart"></i>
                                                        </a> </li>
                                                    <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"
                                                            href="detail.html" title="Compare"> <i
                                                                class="fa fa-signal" aria-hidden="true"></i> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </section>

                <!-- ================================ SKIP BRAND 1 PRODUCTS TERMINA AQUI =========================================== -->

                <!-- ============================================== BEST SELLER ============================================== -->

                <div class="best-deal wow fadeInUp outer-bottom-xs">
                    <h3 class="section-title">Best seller</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                            <div class="item">
                                <div class="products best-product">
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img
                                                                    src="assets/images/products/p20.jpg"
                                                                    alt=""> </a> </div>


                                                    </div>

                                                </div>

                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print
                                                                Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> $450.99
                                                            </span> </div>


                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img
                                                                    src="assets/images/products/p21.jpg"
                                                                    alt=""> </a>
                                                        </div>


                                                    </div>

                                                </div>

                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print
                                                                Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> $450.99
                                                            </span>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="products best-product">
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img
                                                                    src="assets/images/products/p22.jpg"
                                                                    alt=""> </a> </div>


                                                    </div>

                                                </div>

                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print
                                                                Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> $450.99
                                                            </span>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img
                                                                    src="assets/images/products/p23.jpg"
                                                                    alt=""> </a>
                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print
                                                                Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> $450.99
                                                            </span> </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="products best-product">
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img
                                                                    src="assets/images/products/p24.jpg"
                                                                    alt=""> </a>
                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print
                                                                Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> $450.99
                                                            </span>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img
                                                                    src="assets/images/products/p25.jpg"
                                                                    alt=""> </a>
                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print
                                                                Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> $450.99
                                                            </span>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="products best-product">
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img
                                                                    src="assets/images/products/p26.jpg"
                                                                    alt=""> </a>
                                                        </div>


                                                    </div>

                                                </div>

                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print
                                                                Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> $450.99
                                                            </span>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img
                                                                    src="assets/images/products/p27.jpg"
                                                                    alt=""> </a>
                                                        </div>


                                                    </div>

                                                </div>

                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print
                                                                Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> $450.99
                                                            </span>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================== BEST SELLER : END ============================================== -->

                <!-- ============================================== BLOG SLIDER ============================================== -->
                <section class="section latest-blog outer-bottom-vs wow fadeInUp">
                    <h3 class="section-title">latest form blog</h3>
                    <div class="blog-slider-container outer-top-xs">
                        <div class="owl-carousel blog-slider custom-carousel">
                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"> <a href="blog.html"><img
                                                    src="<?php echo e(asset('frontend/assets/images/blog-post/post1.jpg')); ?>"
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

                <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                <section class="section wow fadeInUp new-arriavls">
                    <h3 class="section-title">New Arrivals</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="detail.html"><img
                                                    src="assets/images/products/p19.jpg" alt=""></a> </div>
                                        

                                        <div class="tag new"><span>new</span></div>
                                    </div>
                                    

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"> <span class="price"> $450.99 </span> <span
                                                class="price-before-discount">$ 800</span> </div>
                                       

                                    </div>
                                   
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown"
                                                        type="button"> <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart</button>
                                                </li>
                                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                                        title="Wishlist"> <i class="icon fa fa-heart"></i> </a>
                                                </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                        title="Compare"> <i class="fa fa-signal"
                                                            aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                               

                            </div>
                            
                        </div>
                      

                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="detail.html"><img
                                                    src="assets/images/products/p28.jpg" alt=""></a> </div>
                                        

                                        <div class="tag new"><span>new</span></div>
                                    </div>
                                    

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"> <span class="price"> $450.99 </span> <span
                                                class="price-before-discount">$ 800</span> </div>
                                        

                                    </div>
                                    
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown"
                                                        type="button"> <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart</button>
                                                </li>
                                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                                        title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                        title="Compare"> <i class="fa fa-signal"
                                                            aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                       
                                    </div>
                                    
                                </div>
                               

                            </div>
                            
                        </div>
                        

                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="detail.html"><img
                                                    src="assets/images/products/p30.jpg" alt=""></a> 
                                                </div>
                                        

                                        <div class="tag hot"><span>hot</span></div>
                                    </div>
                                    

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"> <span class="price"> $450.99 </span> <span
                                                class="price-before-discount">$ 800</span> </div>
                                        

                                    </div>
                                    
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown"
                                                        type="button"> <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart</button>
                                                </li>
                                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                                        title="Wishlist"> <i class="icon fa fa-heart"></i> </a>
                                                </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                        title="Compare"> <i class="fa fa-signal"
                                                            aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                       
                                    </div>
                                    
                                </div>
                                

                            </div>
                            
                        </div>
                        

                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="detail.html"><img
                                                    src="assets/images/products/p1.jpg" alt=""></a> 
                                                </div>
                                        

                                        <div class="tag hot"><span>hot</span></div>
                                    </div>
                                    

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"> <span class="price"> $450.99 </span> <span
                                                class="price-before-discount">$ 800</span> </div>
                                        

                                    </div>
                                    
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown"
                                                        type="button"> <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart</button>
                                                </li>
                                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                                        title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                        title="Compare"> <i class="fa fa-signal"
                                                            aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                

                            </div>
                            
                        </div>
                        

                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="detail.html"><img
                                                    src="assets/images/products/p2.jpg') }}" alt=""></a>
                                        </div>
                                        

                                        <div class="tag sale"><span>sale</span></div>
                                    </div>
                                    

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"> <span class="price"> $450.99 </span> <span
                                                class="price-before-discount">$ 800</span> </div>
                                        

                                    </div>
                                    
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown"
                                                        type="button"> <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart</button>
                                                </li>
                                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                                        title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                        title="Compare"> <i class="fa fa-signal"
                                                            aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                

                            </div>
                            
                        </div>
                        

                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="detail.html"><img
                                                    src="assets/images/products/p3.jpg" alt=""></a> 
                                                </div>
                                        

                                        <div class="tag sale"><span>sale</span></div>
                                    </div>
                                    

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"> <span class="price"> $450.99 </span> <span
                                                class="price-before-discount">$ 800</span> </div>
                                        

                                    </div>
                                    
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown"
                                                        type="button"> <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart</button>
                                                </li>
                                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                                        title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                        title="Compare"> <i class="fa fa-signal"
                                                            aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                

                            </div>
                            
                        </div>
                        
                    </div>
                    
                </section>
                
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

            </div>
            
            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <?php echo $__env->make('frontend.body.brands', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.main_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lucas/newmodern-store/resources/views/frontend/index.blade.php ENDPATH**/ ?>