<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="NewModern Team" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <!-- ========================== FAVICON ============================ -->
    <link rel="icon" href="<?php echo e(asset('backend/images/favicon-32x32.png')); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/bootstrap.min.css')); ?>">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/blue.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/owl.carousel.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/owl.transitions.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/rateit.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/bootstrap-select.min.css')); ?>">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/font-awesome.css')); ?>">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
        rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Toaster Stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">



</head>

<body class="cnt-home">



    <!-- ============================================== HEADER ============================================== -->

    <?php echo $__env->make('frontend.body.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Chamar o HEADER. Assim todas as páginas terão mesmo conteúdo HEADER |**FRAGMENTAÇÃO** -->

    <!-- ============================================== HEADER : END ============================================== -->

    <!-- yield('content') é onde fica o conteúdo (que muda de página p/ pagina) -->

    <?php echo $__env->yieldContent('content'); ?>

    <!-- ============================================================= FOOTER ============================================================= -->

    <?php echo $__env->make('frontend.body.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Chamar o FOOTER. Assim todas as páginas terão mesmo conteúdo footer | **FRAGMENTAÇÃO** -->

    <!-- ============================================================= FOOTER : END============================================================= -->



    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="<?php echo e(asset('frontend/assets/js/jquery-1.11.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/echo.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/jquery.easing-1.3.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/bootstrap-slider.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/jquery.rateit.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend/assets/js/lightbox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/bootstrap-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/scripts.js')); ?>"></script>

    <!-- Sweer Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Script para mostrar as mensagens toaster para o admin. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        <?php if(Session::has('message')): ?>
            var type = "<?php echo e(Session::get('alert-type', 'info')); ?>"
            switch (type) {

                case 'info':
                    toastr.info(" <?php echo e(Session::get('message')); ?> ");
                    break;

                case 'success':
                    toastr.success(" <?php echo e(Session::get('message')); ?> ");
                    break;

                case 'warning':
                    toastr.warning(" <?php echo e(Session::get('message')); ?> ");
                    break;

                case 'error':
                    toastr.error(" <?php echo e(Session::get('message')); ?> ");
                    break;

            }
        <?php endif; ?>
    </script>

    <!-- Bootstrap 4.6 Modal Botão Adicionar ao Carrinho -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong><span id="productname"></strong></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModel">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Design começa aqui -->
                    <div class="row">
                        <div class="col-md-4">

                            <!-- bootstrap 4.6 card -->
                            <div class="card" style="width: 18rem;">
                                <img src="..." class="card-img-top" alt="..."
                                    style="width:220px; height:220px;" id="productimage">

                            </div>

                        </div><!-- \1° col md 4 -->
                        <div class="col-md-4">

                            <!-- bootstrap 4.6 list -->
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                        Preço:
                                    <?php else: ?>
                                        Price:
                                    <?php endif; ?>
                                    <strong class="text-danger">R$<span id="pricecondition"></span></strong><br>
                                    <del id="oldpricecondition"></del>
                                </li>
                                <li class="list-group-item">
                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                        Codigo:
                                    <?php else: ?>
                                        Code:
                                    <?php endif; ?>
                                    <strong id="productcode"></strong>
                                </li>
                                <li class="list-group-item">
                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                        Categoria:
                                    <?php else: ?>
                                        Category:
                                    <?php endif; ?>
                                    <strong id="productcategory"></strong>
                                </li>
                                <li class="list-group-item">
                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                        Marca:
                                    <?php else: ?>
                                        Brand:
                                    <?php endif; ?>
                                    <strong id="productbrand"></strong>
                                </li>
                                <li class="list-group-item">
                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                        Estoque:
                                    <?php else: ?>
                                        Stock:
                                    <?php endif; ?>
                                    <span class="badge badge-pill badge-success" id="available"
                                        style="background: green;color: white;">
                                    </span>
                                    <span class="badge badge-pill badge-danger" id="unavailable"
                                        style="background: red;color: white;">
                                    </span>
                                </li>
                            </ul>

                        </div><!-- \2° col md 4 -->
                        <div class="col-md-4">

                            <!-- bootstrap 4.6 form group 1 -->
                            <div class="form-group" id="colorForm">
                                <label for="color">
                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                        Escolha a Cor
                                    <?php else: ?>
                                        Choose Color
                                    <?php endif; ?>
                                </label>
                                <select class="form-control" id="color" name="color">


                                </select>
                            </div><!-- \form group 1 -->

                            <!-- bootstrap 4.6 form group 2 -->
                            <div class="form-group" id="sizeForm">
                                <label for="size">
                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                        Escolha o Tamanho
                                    <?php else: ?>
                                        Choose Size
                                    <?php endif; ?>
                                </label>
                                <select class="form-control" id="size" name="size">
                                    <option>1</option>

                                </select>
                            </div><!-- \form group 2 -->

                            <!-- bootstrap 4.6 form -->
                            <form>
                                <div class="form-group">
                                    <label for="qty">
                                        <?php if(session()->get('language') == 'portuguese'): ?>
                                            Quantidade
                                        <?php else: ?>
                                            Quantity
                                        <?php endif; ?>
                                    </label>
                                    <input type="number" class="form-control" id="qty" value="1"
                                        min="1">
                                </div>
                                <!--\formgroup -->

                                
                                 <?php echo csrf_field(); ?>
                                <input type="hidden" id="product_id">
                                <button type="submit" class="btn btn-success mb-2" onclick="addToCart()">
                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                        Adicionar ao Carrinho
                                    <?php else: ?>
                                        Add to Cart
                                    <?php endif; ?>
                                </button>
                            </form>
                        </div><!-- \3° col md 4 -->
                    </div><!-- \final row -->
                </div>
            </div>
        </div>
    </div>
    <!-- JS AJAX P/ MOSTRAR DADOS PRODUTO NA MODEL DINAMICAMENTE -->
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        // View Produto com a Modal Bootstrap | nome dado no método onclick="productView"
        function productView(id) {
            $.ajax({
                type: 'GET',
                url: '/product/view/modal/' + id,
                dataType: 'json',
                success: function(data) {
                    $('#productname').text(data.product.product_name_en);
                    $('#productprice').text(data.product.product_selling_price);
                    $('#productcode').text(data.product.product_code);
                    $('#productcategory').text(data.product.category.category_name_en);
                    $('#productbrand').text(data.product.brand.brand_name_en);
                    $('#productimage').attr('src', '/' + data.product.product_thumbnail);
                    $('#product_id').val(id);
                    $('#qty').val(1);


                    // Condição: mostrar desconto produto caso exista...
                    if (data.product.product_discount_price == null) {
                        $('#pricecondition').text("");
                        $('#oldpricecondition').text("");
                        $('#pricecondition').text(data.product.product_selling_price);
                    } else {
                        $('#pricecondition').text(data.product.product_discount_price);
                        $('#oldpricecondition').text(data.product.product_selling_price);
                    }

                    // Cor c/ AJAX
                    // limpar o select field antes de clickar em um produto novo. load with empty function
                    $('select[name="color"]').empty();
                    $.each(data.color, function(key, value) {
                        $('select[name="color"]').append('<option value=" ' + value + ' ">' + value +
                            '</option>')
                        // Condição, se produto não tem tamanho, esconder o form tanho, caso contrário, mostrar form tamanho
                        if (data.color == "") {
                            $('#colorForm').hide();
                        } else {
                            $('#colorForm').show();
                        }
                    })

                    // Tamanho c/ AJAX
                    // limpar o select field antes de clickar em um produto novo. load with empty function
                    $('select[name="size"]').empty();
                    $.each(data.size, function(key, value) {
                        $('select[name="size"]').append('<option value=" ' + value + ' ">' + value +
                            '</option>')
                        // Condição, se produto não tem tamanho, esconder o form tamanho, caso contrário, mostrar form tamanho
                        if (data.size == "") {
                            $('#sizeForm').hide();
                        } else {
                            $('#sizeForm').show();
                        }
                    })

                    // Estoque
                    if (data.product.product_qty > 0) {
                        $('#available').text("");
                        $('#unavailable').text("");
                        $('#available').text('available')
                    } else {
                        $('#available').text("");
                        $('#unavailable').text("");
                        $('#unavailable').text('out of stock')
                    }

                }
            })
        }

        function addToCart() {
            var product_name = $('#productname').text();
            var id = $('#product_id').val();
            var color = $('#color option:selected').text();
            var size = $('#size option:selected').text();
            var quantity = $('#qty').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    //_token: "<?php echo e(csrf_token()); ?>",
                    color: color,
                    size: size,
                    quantity: quantity,
                    product_name: product_name
                },
                url: "/cart/data/store/" + id,
                success: function(data) {
                    miniCart()
                    $('#closeModel').click();
                    // console.log(data)
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    // End Message 
                }
            })
        }
    </script>




    <script type="text/javascript">
        function miniCart() {
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart/',
                dataType: 'json',
                success: function(response) {
                    console.log(response);

                }
            })
        }
    </script>


</body>

</html>
<?php /**PATH /home/lucas/newmodern-store/resources/views/frontend/main_master.blade.php ENDPATH**/ ?>