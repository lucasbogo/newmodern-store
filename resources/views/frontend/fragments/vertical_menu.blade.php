<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">

            @foreach ($categories as $category)
                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="#" aria-hidden="true"></i>
                        @if (session()->get('language') == 'portuguese')
                            {{ $category->category_name_pt }}
                        @else
                            {{ $category->category_name_en }}
                        @endif
                    </a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">

                                <!-- Relacionar a subcategoria com a fk categoria; quando bater com a categoria id, então, order by ascendente -->
                                @php
                                    $subcategories = App\Models\SubCategory::where('category_id', $category->id)
                                        ->orderBy('subcategory_name_en', 'ASC')
                                        ->get();
                                @endphp

                                @foreach ($subcategories as $subcategory)
                                    <div class="col-sm-12 col-md-3">

                                        <!-- CONDIÇÃO IF ELSE: se a sessão for em ptbr, mostrar nome ptbr caso contrário, mostrar inglês -->

                                        <h2 class="title">
                                            @if (session()->get('language') == 'portuguese')
                                                {{ $subcategory->subcategory_name_pt }}
                                            @else
                                                {{ $subcategory->subcategory_name_en }}
                                            @endif
                                        </h2>

                                        <!-- Relacionar a subsubcategoria com a fk subcategoria; quando bater com a subcategoria id, então, order by ascendente -->
                                        @php
                                            $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $subcategory->id)
                                                ->orderBy('subsubcategory_name_en', 'ASC')
                                                ->get();
                                        @endphp

                                        @foreach ($subsubcategories as $subsubcategory)
                                            <ul class="links list-unstyled">
                                                <li>
                                                    <a href="#">
                                                        @if (session()->get('language') == 'portuguese')
                                                            {{ $subsubcategory->subsubcategory_name_pt }}
                                                        @else
                                                            {{ $subsubcategory->subsubcategory_name_en }}
                                                        @endif
                                                    </a>
                                                </li>

                                            </ul>
                                        @endforeach
                                        <!-- /. final subsubcategoria -->
                                    </div>
                                @endforeach
                                <!-- /. final subcategoria -->
                            </div>
                            <!-- /.row -->

                        </li>
                        <!-- /.yamm-content -->
                    </ul>
                    <!-- /.dropdown-menu -->
                </li>
                <!-- /.menu-item -->
            @endforeach
            <!-- /. category foreach -->
            <!-- HERE ! -->



        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
<!-- /.side-menu -->

