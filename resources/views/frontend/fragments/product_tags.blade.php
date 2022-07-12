<!-- bloco php para buscar os dados relacionados às tags com produtos e separar-os em grupo -->
@php
$tags_en = App\Models\Product::groupBy('product_tags_en')
    ->select('product_tags_en')
    ->get();

$tags_pt = App\Models\Product::groupBy('product_tags_pt')
    ->select('product_tags_pt')
    ->get();
@endphp


<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">
        <!-- Lógica internacionalização simples tradução da tag new -->
        @if (session()->get('language') == 'portuguese')
            Tags Produto
        @else
            Product Tags
        @endif
    </h3>


    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">

            <!-- Lógica internacionalização mostrar nome tags -->
            @if (session()->get('language') == 'portuguese')
                @foreach ($tags_pt as $tag)
                    <a class="item active" title="{{ str_replace(',', ' ', $tag->product_tags_pt) }}"
                        href="{{ url('product/tag/' . $tag->product_tags_pt) }}">{{ str_replace(',', ' ', $tag->product_tags_pt) }}</a>
                @endforeach
            @else
                @foreach ($tags_en as $tag)
                    <a class="item active" title="{{ str_replace(',', ' ', $tag->product_tags_en) }}"
                        href="{{ url('product/tag/' . $tag->product_tags_en) }}">{{ str_replace(',', ' ', $tag->product_tags_en) }}</a>
                @endforeach
            @endif


        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>
<!-- /.sidebar-widget -->
