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
    <link rel="icon" href="<?php echo e(asset('backend/images/favicon-new.ico')); ?>">
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

    <!-- Modal adicionar produto no carrinho -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong><span id="pname"></span> </strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModel">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-4">

                            <div class="card" style="width: 18rem;">

                                <img src=" " class="card-img-top" alt="..."
                                    style="height: 200px; width: 200px;" id="pimage">

                            </div>

                        </div><!-- /col md -->


                        <div class="col-md-4">

                            <ul class="list-group">
                                <li class="list-group-item">
                                    <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                        Preço Produto:
                                    <?php else: ?>
                                        Product Price:
                                    <?php endif; ?>
                                    <strong class="text-danger">R$<span id="pprice"></span></strong>
                                    <del id="oldprice">R$</del>
                                </li>
                                <li class="list-group-item">
                                    <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                        Código do Produto:
                                    <?php else: ?>
                                        Product Code:
                                    <?php endif; ?> <strong id="pcode"></strong>
                                </li>
                                <li class="list-group-item">
                                    <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                        Categoria:
                                    <?php else: ?>
                                        Category:
                                    <?php endif; ?> <strong id="pcategory"></strong>
                                </li>
                                <li class="list-group-item">
                                    <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                        Marca:
                                    <?php else: ?>
                                        Brand:
                                    <?php endif; ?> <strong id="pbrand"></strong>
                                </li>
                                <li class="list-group-item">
                                    <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                        Estoque:
                                    <?php else: ?>
                                        Stock:
                                    <?php endif; ?> <span class="badge badge-pill badge-success"
                                        id="aviable" style="background: green; color: white;"></span>
                                    <span class="badge badge-pill badge-danger" id="stockout"
                                        style="background: red; color: white;"></span>

                                </li>
                            </ul>

                        </div><!-- /col md -->


                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="color">
                                    <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                        Escolha a Cor
                                    <?php else: ?>
                                        Choose Color
                                    <?php endif; ?>
                                </label>
                                <select class="form-control" id="color" name="color">


                                </select>
                            </div> <!-- /form group -->


                            <div class="form-group" id="sizeArea">
                                <label for="size">
                                    <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                        Escolha o Tamanho
                                    <?php else: ?>
                                        Choose Size
                                    <?php endif; ?>
                                </label>
                                <select class="form-control" id="size" name="size">
                                    <option>1</option>

                                </select>
                            </div> <!-- // end form group -->

                            <div class="form-group">
                                <label for="qty">
                                    <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                    <?php if(session()->get('language') == 'portuguese'): ?>
                                        Quantidade
                                    <?php else: ?>
                                        Quantity
                                    <?php endif; ?>
                                </label>
                                <input type="number" class="form-control" id="qty" value="1"
                                    min="1">
                            </div> <!-- /form group -->

                            <input type="hidden" id="product_id">
                            <button type="submit" class="btn btn-primary mb-2" onclick="addToCart()">
                                <!-- Lógica internacionalização simples -->
                                <?php if(session()->get('language') == 'portuguese'): ?>
                                    Adicionar
                                <?php else: ?>
                                    Add to Cart
                                <?php endif; ?>
                            </button>


                        </div><!-- /col md -->


                    </div> <!-- /row -->



                </div> <!-- /Final Corpo Modal -->

            </div>
        </div>
    </div>
    <!--  /Final Modal Produto Adcionar ao Carrinho -->


    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        // View Produto com Bootstrap Modal 
        function productView(id) {
            // Id toaster msg (alert)
            $.ajax({
                type: 'GET',
                url: '/product/view/modal/' + id,
                dataType: 'json',
                success: function(data) {

                    $('#pname').text(data.product.product_name_en);
                    $('#price').text(data.product.product_selling_price);
                    $('#pcode').text(data.product.product_code);
                    $('#pcategory').text(data.product.category.category_name_en);
                    $('#pbrand').text(data.product.brand.brand_name_en);
                    $('#pimage').attr('src', '/' + data.product.product_thumbnail);
                    $('#product_id').val(id);
                    $('#qty').val(1);
                    // Preço Produto
                    if (data.product.product_discount_price == null) {
                        $('#pprice').text('');
                        $('#oldprice').text('');
                        $('#pprice').text(data.product.product_selling_price);
                    } else {
                        $('#pprice').text(data.product.product_discount_price);
                        $('#oldprice').text(data.product.product_selling_price);
                    } // Final Preço Produto
                    // Estoque
                    if (data.product.product_qty > 0) {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#aviable').text('available');
                    } else {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#stockout').text('out of stock');
                    } // Final Estoque
                    // Cor
                    $('select[name="color"]').empty();
                    $.each(data.color, function(key, value) {
                        $('select[name="color"]').append('<option value=" ' + value + ' ">' + value +
                            ' </option>')
                    }) // Final cor
                    // Tamanho
                    $('select[name="size"]').empty();
                    $.each(data.size, function(key, value) {
                        $('select[name="size"]').append('<option value=" ' + value + ' ">' + value +
                            ' </option>')
                        if (data.size == "") {
                            $('#sizeArea').hide();
                        } else {
                            $('#sizeArea').show();
                        }
                    }) // Final Tamanho

                }
            })

        } // Final View Produto pela Modal

        // função onclick: addToCart()  adiciona o produto sem ter que 'carregar' a página novamente
        function addToCart() {
            var product_name = $('#pname').text();
            var id = $('#product_id').val();
            var color = $('#color option:selected').text();
            var size = $('#size option:selected').text();
            var quantity = $('#qty').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    color: color,
                    size: size,
                    quantity: quantity,
                    product_name: product_name
                },
                url: "/cart/data/store/" + id,
                success: function(data) {
                    miniCart()
                    $('#closeModel').click();

                    // Toaster msg
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
                    //Final Toaster msg
                }
            })
        }

        // Final Adicionar Item Carrinho
    </script>

    <!-- ========================  MINI CARRINHO HEADER AJAX ========================  -->

    <script type="text/javascript">
        function miniCart() {
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart',
                dataType: 'json',
                success: function(response) {
                    $('span[id="cartSubTotal"]').text(response.cartTotal);
                    $('#cartQty').text(response.cartQty);
                    var miniCart = ""
                    $.each(response.carts, function(key, value) {
                        miniCart +=
                            `<div class="cart-item product-summary">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="image"> 
                                        <a href="detail.html"><img src="/${value.options.image}" alt=""></a> 
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                                        <div class="price"> ${value.price} * ${value.qty} </div>
                                </div>
                                    <div class="col-xs-1 action"> 
                                        <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)">
                                            <i class="fa fa-trash"></i>
                                        </button> 
                                    </div>
                                </div>
                            </div>
                        <!-- /.cart-item -->
                        <div class="clearfix"></div>
                        <hr>`
                    });

                    $('#miniCart').html(miniCart);
                }
            })
        }
        miniCart();


        // Função Remover Item Carrinho 
        function miniCartRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: '/minicart/product-remove/' + rowId,
                dataType: 'json',
                success: function(data) {
                    miniCart();
                    
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // Final Toaster msg 
                }
            });
        }
        //  Final Remover Item Carrinho
    </script>

    <!-- ======================== LISTA DESEJO AJAX ========================  -->

    <!-- JS p/ Adicionar Item Lista de Desejos -->
    <script type="text/javascript">
        function addToWishList(product_id) {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/add-to-wishlist/" + product_id,

                success: function(data) {

                    // Toaster msg 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // Final Toaster msg 
                }
            })
        }
    </script>

    <!-- JS Ajax p/  'baixar' Item na Lista de Desejos view page -->
    <script type="text/javascript">
        function wishlist() {
            $.ajax({
                type: 'GET',
                url: '/user/get-wishlist-product',
                dataType: 'json',
                success: function(response) {
                    var rows = ""
                    $.each(response, function(key, value) {
                        rows +=
                            `<tr>
                            <td class="col-md-2"><img src="/${value.product.product_thumbnail} "alt="imga"></td>
                                <td class="col-md-7">
                                    <div class="product-name"><a href="#">${value.product.product_name_pt}</a></div>
                        
                                    <div class="price">
                                        ${value.product.product_discount_price == null 
                                            ? `${value.product.product_selling_price}`
                                            : `${value.product.product_discount_price}<span>
                                                ${value.product.product_selling_price}</span>`
                                        }
                                    </div>
                                </td>
                                    <td class="col-md-2">
                                        <button class="btn btn-primary icon" type="button" 
                                            title="Add Cart" data-toggle="modal" data-target="#exampleModal" 
                                            id="${value.product_id}" onclick="productView(this.id)">
                                                <?php if(session()->get('language') == 'portuguese'): ?>
                                                    Adicionar Carr.
                                                <?php else: ?>
                                                    Add to Cart
                                                <?php endif; ?> 
                                        </button>
                                    </td>
                                        <td class="col-md-1 close-btn">
                                            <button type="submit" class="" id="${value.id}" 
                                                onclick="wishlistRemove(this.id)">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                        </tr>`
                    });

                    $('#wishlist').html(rows);
                }
            })
        }
        wishlist();

        // ajax onclick function p/ remover item lista desejo
        function wishlistRemove(id) {
            $.ajax({
                type: 'GET',
                url: '/user/wishlist-remove/' + id,
                dataType: 'json',
                success: function(data) {
                    wishlist();
                  
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // Final Toaster msg
                }
            });
        }
        // Final ajax onclick function p/ remover item lista desejo
    </script>



    <!-- ========================  MEU CARRINHO AJAX ========================  -->


    <!-- JS Ajax p/  'baixar' Item no Meu Carrinho view page -->
    <script type="text/javascript">
        // Função adiciona o produto sem ter que 'carregar' a página novamente -AJAX serve p/ isso...
        function cart() {
            $.ajax({
                type: 'GET',
                url: '/user/get-cart-product',
                dataType: 'json',
                success: function(response) {
                    var rows = ""
                    $.each(response.carts, function(key, value) {
                        rows +=
                        `<tr>
                            <td class="col-md-2"><img src="/${value.options.image} "alt="imga"
                                style="width:; height:"></td>
                                <td class="col-md-2">
                                    <div class="product-name"><a href="#">${value.name}</a></div>
                        
                                    <div class="price">
                                        ${value.price}
                                    </div>
                                </td>

                                <td class="col-md-2">
                                    ${value.options.color == null
                                        ?   `<span>
                                                <?php if(session()->get('language') == 'portuguese'): ?>
                                                    Cor Padrão
                                                <?php else: ?>
                                                    Default Color
                                                <?php endif; ?> 
                                            </span>`
                                        :`<strong>${value.options.color}</strong>`
                                    }   

                                </td>

                                <td class="col-md-2">
                                    ${value.options.size == null
                                        ? `<span>
                                                <?php if(session()->get('language') == 'portuguese'): ?>
                                                    Tamanho Padrão
                                                <?php else: ?>
                                                    Default Color
                                                <?php endif; ?>
                                            </span>`
                                        :`<strong>${value.options.size} </strong>` 
                                    }           
                                </td>

                                <td class="col-md-2">

                                    ${value.qty > 1

                                    ?`<button type="submit" class="btn btn-danger btn-sm"id="${value.rowId}" 
                                        onclick="mycartDecrement(this.id)">-</button>`

                                    :`<button type="submit" class="btn btn-danger btn-sm" disabled >-</button>`
                                    }

                                        <input type="text" value="${value.qty}" min="1" max="100" disabled=""style="width:25px;">

                                    <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" 
                                        onclick="mycartIncrement(this.id)">+</button>
                                </td>

                                <td class="col-md-2">
                                    <strong>R$ ${value.subtotal}</strong>    
                                </td>

                                <td class="col-md-1 close-btn">
                                    <button type="submit" class="" id="${value.rowId}" 
                                        onclick="mycartRemove(this.id)">
                                            <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                        </tr>`
                    });

                    $('#mycart').html(rows);
                }
            })
        }
        cart();

        // ajax onclick function p/ remover item Meu Carrinho
        function mycartRemove(id) {
            $.ajax({
                type: 'GET',
                url: '/user/cart-remove/' + id,
                dataType: 'json',
                success: function(data) {
                    // Função exclui o produto sem ter que 'carregar' a página novamente
                    cart();
                    // Função exclui o produto e atualiza o minicart sem ter que 'carregar' a página novamente
                    miniCart(); 
                  
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // Final Toaster msg
                }
            });
        }
        // Final myCartRemove

        // ajax onclick function p/ incrementar item meu carrinho
        function mycartIncrement(rowId){
        $.ajax({
            type:'GET',
            url: "/cart-increment/"+rowId,
            dataType:'json',
            success:function(data){
                //couponCalculation();
                cart();
                miniCart();
                
            }
        });

    } // final increment

    function mycartDecrement(rowId){
        $.ajax({
            type:'GET',
            url: "/cart-decrement/"+rowId,
            dataType:'json',
            success:function(data){
                //couponCalculation();
                cart();
                miniCart();
            }
        });
    } // final decrement

    </script>

    <!-- ========================  VOUCHER AJAX ========================  -->
    <script type="text/javascript">
        function applyCoupon(){
            var coupon_name = $('#coupon_name').val();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {coupon_name:coupon_name},
                url: "<?php echo e(url('/coupon-apply')); ?>",
                success:function(data){
                    
                }

            })
        }


    </script>


</body>

</html>
<?php /**PATH /home/lucas/newmodern-store/resources/views/frontend/main_master.blade.php ENDPATH**/ ?>