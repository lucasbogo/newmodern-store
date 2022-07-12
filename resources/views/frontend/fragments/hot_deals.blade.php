@php
    // 'Baixar' os dados admin backend products no HotDealsProductsHome  se ativar o produto no painel, então ele irá aparecer no front Hot Deals Products. Só deve aparece produtos com o campo desconto.
    $hotdeals = App\Models\Product::where('product_hot_deals', 1)->where('product_discount_price', '!=', null)->orderBy('id', 'DESC')->limit(6)->get();
@endphp


<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">
        <!-- Lógica internacionalização simples tradução da tag new -->
        @if (session()->get('language') == 'portuguese')
            Promoções
        @else
            Hot Deals
        @endif
    </h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

        @foreach ($hotdeals as $product)
            <div class="item">
                <div class="products">
                    <div class="hot-deal-wrapper">
                        <div class="image"> <img src="{{ asset($product->product_thumbnail) }}" alt=""> </div>

                        <!-- Lógica porcentagem -->
                        @php
                            $discount = $product->product_selling_price - $product->product_discount_price;
                            $percentage = ($discount / $product->product_selling_price) * 100;
                        @endphp

                        @if ($product->product_discount_price == null)
                            <div class="tag new"><span>new</span></div>
                        @else
                            <div class="sale-offer-tag"><span>{{ round($percentage) }}%<br>
                                    off</span></div>
                        @endif


                        <div class="timing-wrapper">
                            <div class="box-wrapper">
                                <div class="date box"> <span class="key">120</span> <span class="value">DAYS</span>
                                </div>
                            </div>
                            <div class="box-wrapper">
                                <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span>
                                </div>
                            </div>
                            <div class="box-wrapper">
                                <div class="minutes box"> <span class="key">36</span> <span
                                        class="value">MINS</span> </div>
                            </div>
                            <div class="box-wrapper hidden-md">
                                <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.hot-deal-wrapper -->

                    <div class="product-info text-left m-t-20">
                        <h3 class="name"><a
                                href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}"></a>
                        </h3>
                        <div class="rating rateit-small"></div>
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
                            <div class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                    <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to
                                    cart</button>
                            </div>
                        </div>
                        <!-- /.action -->
                    </div>
                    <!-- /.cart -->
                </div>
            </div>
        @endforeach

    </div>
    <!-- /.sidebar-widget -->
</div>
