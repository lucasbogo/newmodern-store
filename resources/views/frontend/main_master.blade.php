<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="NewModern Team" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <!-- ========================== FAVICON ============================ -->
    <link rel="icon" href="{{ asset('backend/images/favicon-32x32.png') }}">
    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

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

    @include('frontend.body.header')
    <!-- Chamar o HEADER. Assim todas as páginas terão mesmo conteúdo HEADER |**FRAGMENTAÇÃO** -->

    <!-- ============================================== HEADER : END ============================================== -->

    <!-- yield('content') é onde fica o conteúdo (que muda de página p/ pagina) -->

    @yield('content')

    <!-- ============================================================= FOOTER ============================================================= -->

    @include('frontend.body.footer')
    <!-- Chamar o FOOTER. Assim todas as páginas terão mesmo conteúdo footer | **FRAGMENTAÇÃO** -->

    <!-- ============================================================= FOOTER : END============================================================= -->



    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>

    <!-- Script para mostrar as mensagens toaster para o admin. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {

                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;

            }
        @endif
    </script>

    <!-- Bootstrap 4.6 Modal Botão Adicionar ao Carrinho -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong><span id="productname"></strong></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                    @if (session()->get('language') == 'portuguese')
                                        Preço:
                                    @else
                                        Price:
                                    @endif
                                    <strong class="text-danger">R$<span id="pricecondition"></span></strong><br>
                                    <del id="oldpricecondition"></del>
                                </li>
                                <li class="list-group-item">
                                    @if (session()->get('language') == 'portuguese')
                                        Codigo:
                                    @else
                                        Code:
                                    @endif
                                    <strong id="productcode"></strong>
                                </li>
                                <li class="list-group-item">
                                    @if (session()->get('language') == 'portuguese')
                                        Categoria:
                                    @else
                                        Category:
                                    @endif
                                    <strong id="productcategory"></strong>
                                </li>
                                <li class="list-group-item">
                                    @if (session()->get('language') == 'portuguese')
                                        Marca:
                                    @else
                                        Brand:
                                    @endif
                                    <strong id="productbrand"></strong>
                                </li>
                                <li class="list-group-item">
                                    @if (session()->get('language') == 'portuguese')
                                        Estoque:
                                    @else
                                        Stock:
                                    @endif
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
                                <label for="exampleFormControlSelect1">
                                    @if (session()->get('language') == 'portuguese')
                                        Escolha a Cor
                                    @else
                                        Choose Color
                                    @endif
                                </label>
                                <select class="form-control" id="exampleFormControlSelect1" name="color">


                                </select>
                            </div><!-- \form group 1 -->

                            <!-- bootstrap 4.6 form group 2 -->
                            <div class="form-group" id="sizeForm">
                                <label for="exampleFormControlSelect1">
                                    @if (session()->get('language') == 'portuguese')
                                        Escolha o Tamanho
                                    @else
                                        Choose Size
                                    @endif
                                </label>
                                <select class="form-control" id="exampleFormControlSelect1" name="size">
                                    <option>1</option>

                                </select>
                            </div><!-- \form group 2 -->

                            <!-- bootstrap 4.6 form -->
                            <form>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">
                                        @if (session()->get('language') == 'portuguese')
                                            Quantidade
                                        @else
                                            Quantity
                                        @endif
                                    </label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1"
                                        value="1" min="1">
                                </div>
                                <!--\formgroup -->
                                <button type="submit" class="btn btn-success mb-2">
                                    @if (session()->get('language') == 'portuguese')
                                        Adicionar ao Carrinho
                                    @else
                                        Add to Cart
                                    @endif
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
        $ajaxSetup({
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
                        // Condição, se produto não tem tamanho, esconder o form tanho, caso contrário, mostrar form tamanho
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
    </script>


</body>

</html>
