<header class="header-style-1">
    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="icon fa fa-user"></i>
                                <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                <?php if(session()->get('language') == 'portuguese'): ?>
                                    Minha Conta
                                <?php else: ?>
                                    My Profile
                                <?php endif; ?>
                            </a></li>
                        <li><a href="<?php echo e(route('wishlist')); ?>"><i class="icon fa fa-heart"></i>
                                <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                <?php if(session()->get('language') == 'portuguese'): ?>
                                    Lista de Desejos
                                <?php else: ?>
                                    Wishlist
                                <?php endif; ?>
                            </a>
                        </li>
                        <li><a href="<?php echo e(route('mycart')); ?>"><i class="icon fa fa-shopping-cart"></i>
                                <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                <?php if(session()->get('language') == 'portuguese'): ?>
                                    Meu Carrinho
                                <?php else: ?>
                                    My Cart
                                <?php endif; ?>
                            </a>
                        </li>
                        <li><a href="#"><i class="icon fa fa-check"></i>
                                <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                <?php if(session()->get('language') == 'portuguese'): ?>
                                    Conferir Compras
                                <?php else: ?>
                                    Checkout
                                <?php endif; ?>
                            </a></li>

                        <!-- Se o usuario estiver logado(auth), mostra o icone usuario e link para entrar no perfil -->
                        <?php if(auth()->guard()->check()): ?>
                            <li><a href="<?php echo e(route('login')); ?>"><i class="icon fa fa-user"></i>
                                    <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                        Perfil Usuário
                                    <?php else: ?>
                                        User Profile
                                    <?php endif; ?>
                                </a></li>

                            <!-- Se usuário não estiver logado, mostra o icone lock(cadeado) e link para realizar login ou registro -->
                        <?php else: ?>
                            <li><a href="<?php echo e(route('login')); ?>"><i class="icon fa fa-lock"></i>
                                    <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                        Entrar/Registrar
                                    <?php else: ?>
                                        Login/Register
                                    <?php endif; ?>
                                </a></li>

                        <?php endif; ?>
                    </ul>
                </div>
                <!-- /.cnt-account -->

                <div class="cnt-block">

                    <ul class="list-unstyled list-inline">
                        <!-- ============= ESCOLHER MOEDA (IMPLEMENTAR ESSA LÓGICA FUTURAMENTRE) ============= -->
                        <!--
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle"
                                data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">INR</a></li>
                                <li><a href="#">GBP</a></li>
                            </ul>
                        </li>
                    -->
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle"
                                data-hover="dropdown" data-toggle="dropdown"><span class="value">
                                    <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                        Idioma
                                    <?php else: ?>
                                        Language
                                    <?php endif; ?>
                                </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">

                                <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                <?php if(session()->get('language') == 'portuguese'): ?>
                                    <li><a href="<?php echo e(route('english.language')); ?>">English</a></li>
                                <?php else: ?>
                                    <li><a href="<?php echo e(route('portuguese.language')); ?>">Português</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    </ul>
                    <!-- /.list-unstyled -->
                </div>
                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">

                    <!-- ============================================================= LOGO ============================================================= -->

                    <div class="logo"> <a href="<?php echo e(url('/')); ?>"> <img
                                src="<?php echo e(asset('frontend/assets/images/logo-header-edit.png')); ?>" alt="logo"> </a>

                    </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>

                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form>
                            <div class="control-group">
                                <ul class="categories-filter animate-dropdown">
                                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown"
                                            href="category.html">Categories <b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="menu-header">Computer</li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">-
                                                    Clothing</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">-
                                                    Electronics</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">-
                                                    Shoes</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">-
                                                    Watches</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <input class="search-field" placeholder="Search here..." />
                                <a class="search-button" href="#"></a>
                            </div>
                        </form>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">

                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->


                    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart"
                            data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                <div class="basket-item-count"><span class="count" id="cartQty"> </span></div>
                                <div class="total-price-basket"> <span class="lbl"></span>
                                    <span class="total-price"> <span class="sign">R$</span>
                                        <span class="value" id="cartSubTotal"> </span> </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <!--   // Mini Cart Start with Ajax -->

                                <div id="miniCart">

                                </div>

                                <!--   // End Mini Cart Start with Ajax -->


                                <div class="clearfix cart-total">
                                    <div class="pull-right"> <span class="text">Sub Total :</span>
                                        <span class='price' id="cartSubTotal"> </span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <a href="checkout.html"
                                        class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                </div>
                                <!-- /.cart-total-->

                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div>
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw"> <a href="<?php echo e(url('/')); ?>"
                                        data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                                        <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                        <?php if(session()->get('language') == 'portuguese'): ?>
                                            Pagina Incial
                                        <?php else: ?>
                                            Home
                                        <?php endif; ?>
                                    </a>
                                </li>


                                <!-- =========================== DEIXAR O MENU DROPDOWN DINÂMICO CHAMANDO AS CATEGORIAS DO PAINEL ADMIN =========================== -->

                                <!-- Relacionar a subcategoria com a fk categoria; quando bater com a categoria id, então, order by ascendente -->

                                <?php
                                    $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
                                ?>


                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown"
                                            class="dropdown-toggle" data-toggle="dropdown">

                                            <?php if(session()->get('language') == 'portuguese'): ?>
                                                <?php echo e($category->category_name_pt); ?>

                                            <?php else: ?>
                                                <?php echo e($category->category_name_en); ?>

                                            <?php endif; ?>
                                        </a>
                                        <ul class="dropdown-menu container">
                                            <li>
                                                <div class="yamm-content ">
                                                    <div class="row">


                                                        <!-- =========================== DEIXAR O MENU DROPDOWN DINÂMICO CHAMANDO AS SUB-CATEGORIAS DO PAINEL ADMIN =========================== -->

                                                        <!-- Relacionar a subcategoria com a fk categoria; quando bater com a categoria id, então, order by ascendente -->
                                                        <?php
                                                            $subcategories = App\Models\SubCategory::where('category_id', $category->id)
                                                                ->orderBy('subcategory_name_en', 'ASC')
                                                                ->get();
                                                        ?>

                                                        <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                                <!-- CONDIÇÃO IF ELSE: se a sessão for em ptbr, mostrar nome ptbr caso contrário, mostrar inglês -->
                                                                <a
                                                                    href="<?php echo e(url('subcategory/product/' . $subcategory->id . '/' . $subcategory->subcategory_slug_en)); ?>">
                                                                    <h2 class="title">
                                                                        <?php if(session()->get('language') == 'portuguese'): ?>
                                                                            <?php echo e($subcategory->subcategory_name_pt); ?>

                                                                        <?php else: ?>
                                                                            <?php echo e($subcategory->subcategory_name_en); ?>

                                                                        <?php endif; ?>
                                                                    </h2>
                                                                </a>


                                                                <!-- =========================== DEIXAR O MENU DROPDOWN DINÂMICO CHAMANDO AS SUB-SUB-CATEGORIAS DO PAINEL ADMIN =========================== -->

                                                                <!-- Relacionar a subsubcategoria com a fk subcategoria; quando bater com a subcategoria id, então, order by ascendente -->
                                                                <?php
                                                                    $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $subcategory->id)
                                                                        ->orderBy('subsubcategory_name_en', 'ASC')
                                                                        ->get();
                                                                ?>

                                                                <?php $__currentLoopData = $subsubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <!-- CONDIÇÃO IF ELSE: se a sessão for em ptbr, mostrar nome ptbr caso contrário, mostrar inglês -->
                                                                    <ul class="links">
                                                                        <li><a
                                                                                href="<?php echo e(url('subsubcategory/product/' . $subsubcategory->id . '/' . $subsubcategory->subsubcategory_slug_en)); ?>">
                                                                                <?php if(session()->get('language') == 'portuguese'): ?>
                                                                                    <?php echo e($subsubcategory->subsubcategory_name_pt); ?>

                                                                                <?php else: ?>
                                                                                    <?php echo e($subsubcategory->subsubcategory_name_en); ?>

                                                                                <?php endif; ?>
                                                                            </a></li>

                                                                    </ul>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                                        <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                            <img class="img-responsive"
                                                                src="<?php echo e(asset('frontend/assets/images/logo.png')); ?>"
                                                                alt="">
                                                        </div>

                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <li class="dropdown  navbar-right special-menu"> <a href="#">
                                        <?php if(session()->get('language') == 'portuguese'): ?>
                                            Oferta do
                                            dia
                                        <?php else: ?>
                                            Todays
                                            offer
                                        <?php endif; ?>
                                    </a>
                                </li>
                            </ul>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>
<?php /**PATH /home/lucas/newmodern-store/resources/views/frontend/body/header.blade.php ENDPATH**/ ?>