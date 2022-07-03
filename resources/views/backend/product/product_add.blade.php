<!--
Eu utilizei o template "forms_validation.html"
como referencia para essa view adicionar produto.
Está disponível no pacote template que eu comprei
e compartilhei com a equipe.
-->

@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">


            <!-- Main content -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title"></h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form novalidate>
                                    <div class="row">
                                        <div class="col-12">


                                            <!-- PRIMEIRO ROW -->
                                            <div class="row">

                                                <!-- SELECT FIELD MARCA -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Selecionar Marca <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="brand_id" class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    Selecionar Marca
                                                                </option>

                                                                <!-- Mostrar os dados da variável $brands na condição foreach (nome marca em inglês) -->
                                                                @foreach ($brands as $brand)
                                                                    <option value="{{ $brand->id }}">
                                                                        {{ $brand->brand_name_en }}</option>
                                                                @endforeach

                                                            </select>
                                                            @error('brand_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div> <!-- /col-md-4 -->

                                                <!-- SELECT FIELD CATEGORIA -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Selecionar Categoria <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="category_id" class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    Selecionar Categoria
                                                                </option>

                                                                <!-- Mostrar os dados da variável $categories na condição foreach (nome categoria em inglês) -->
                                                                @foreach ($categories as $category)

                                                                    <!--CONDIÇÃO p/ mostrar os dados, passa-se a coluna category e o id da mesma:
                                                                        quando os IDs combinarem, a fk_id category com a id subcategory, então
                                                                        retorna os valores solicitados, caso contrário, retorna nulo 
                                                                    -->
                                                                    <option value="{{ $category->id }}">
                                                                        {{ $category->category_name_en }}</option>
                                                                @endforeach

                                                            </select>
                                                            @error('category_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div> <!-- /col-md-4 -->

                                                <!-- SELECT FIELD SUB CATEGORIA -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Selecionar Sub-Categoria <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="subcategory_id" class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    Selecionar
                                                                    Categoria
                                                                </option>

                                                                <!--AQUI FOI USADO JAVASCRIPT PARA SELECIONAR
                                                                    NOME SUBCATEGORIA DINAMICAMENTE: OU SEJA,
                                                                    AO SELECIONAR CATEGORIA, AUTOMATICAMENTE,
                                                                    APARECERÁ A SUBCATEGORIA E A SUB SUB CATEGORIA,
                                                                    DE ACORDO COM O RELACIONAMENTO BD
                                                                -->

                                                            </select>
                                                            @error('subcategory_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div> <!-- /col-md-4 -->

                                            </div><!-- /row -->

                                            <!-- SEGUNDO ROW -->
                                            <div class="row">

                                                <!-- SELECT FIELD SUB-SUB-CATEGORIA -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Selecionar Sub-Sub-Categoria <span class="text-danger">*</span>
                                                        </h5>
                                                        <div class="controls">
                                                            <select name="subsubcategory_id" class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    Selecionar Sub Sub Categoria
                                                                </option>

                                                                <!--AQUI FOI USADO JAVASCRIPT PARA SELECIONAR
                                                                    NOME SUBCATEGORIA DINAMICAMENTE: OU SEJA,
                                                                    AO SELECIONAR CATEGORIA, AUTOMATICAMENTE,
                                                                    APARECERÁ A SUBCATEGORIA E A SUB SUB CATEGORIA,
                                                                    DE ACORDO COM O RELACIONAMENTO BD
                                                                -->

                                                            </select>
                                                            @error('subsubcategory_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div> <!-- /col-md-4 -->

                                                <!-- INPUT FIELD NOME PRODUTO INGLÊS -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product Name (EN) <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_name_en"
                                                                class="form-control">

                                                            @error('product_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div> <!-- /col-md-4 -->

                                                <!-- INPUT FIELD NOME PRODUTO PORTUGUÊS -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Nome Produto (PTBR) <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_name_pt"
                                                                class="form-control">

                                                            @error('product_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div> <!-- /col-md-4 -->

                                            </div><!-- /row -->

                                            <!-- TERCEIRO ROW -->
                                            <div class="row">

                                                <!-- INPUT FIELD CÓDIGO DO PRODUTO-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Código <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_code" class="form-control">

                                                            @error('product_code')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div> <!-- /col-md-4 -->

                                                <!-- INPUT FIELD QUANTIDADE PRODUTO-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Quantidade <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_qty" class="form-control">

                                                            @error('product_qty')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                    </div>

                                                </div> <!-- /col-md-4 -->

                                                <!-- INPUT FIELD VALOR VENDA -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Valor Venda <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_selling_price"
                                                                class="form-control">

                                                            @error('product_selling_price')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div> <!-- /col-md-4 -->

                                            </div><!-- /row -->


                                            <!-- QUARTA ROW -->
                                            <div class="row">

                                                <!-- INPUT FIELD INSERIR VALOR DESCONTO-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Valor Desconto <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_discount_price"
                                                                class="form-control">

                                                            @error('product_discount_price')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- INPUT FILE THUMBNAIL (MINIATURA)-->
                                                <div class="col-md-4">
                                                    <div class="form-group">

                                                        <h5>Thumbnail (miniatura) <span class="text-danger">*</span>
                                                        </h5>
                                                        <div class="controls">
                                                            <input type="file" name="product_thumbnail"
                                                                class="form-control">

                                                            @error('product_thumbnail')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>

                                                 <!-- INPUT FILE IMAGENS MULTIPLAS-->
                                                 <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Imagens <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="file" name="multi_images[]"
                                                                class="form-control">

                                                            @error('multi_images')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div> <!-- /col-md-4 -->
                                               
                                            </div><!-- /row -->


                                            <!-- QUINTA ROW -->
                                            <div class="row">

                                                <!-- INSERIR COR INGLÊS-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Color <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_color_en"
                                                                class="form-control" value="Black, Blue, Yellow, white"
                                                                data-role="tagsinput">

                                                            @error('product_color_en')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- INSERIR COR PORTUGUÊS-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Cor <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_color_pt"
                                                                class="form-control" value="Amarelo, Azul, Branco, Preto"
                                                                data-role="tagsinput">

                                                            @error('product_color_pt')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- INSERIR TAGS INGLÊS -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Tags (EN) <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_tags_en"
                                                                class="form-control" value="English,Lorem, Ipsum, Amet"
                                                                data-role="tagsinput">

                                                            @error('product_tags_en')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div> <!-- /col-md-4 -->

                                            </div><!-- /row -->


                                            <!-- SEXTA ROW -->
                                            <div class="row">

                                                <!-- INSERIR TAGS PORTUGUÊS-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Tags (PTBR) <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_tags_pt"
                                                                class="form-control" value="Português,Lorem, Ipsum, Amet"
                                                                data-role="tagsinput">

                                                            @error('product_tags_pt')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>

                                                 <!-- TAMANHO PRODUTO INGLÊS -->
                                                 <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Size <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_size_en"
                                                                class="form-control"
                                                                value="Small, Medium, Large, Extra-Large, XXL"
                                                                data-role="tagsinput">

                                                            @error('product_size_en')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- TAMANHO PRODUTO PORTUGUÊS -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Tamanho <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_size_pt"
                                                                class="form-control"
                                                                value="Pequeno, Médio, Grande, GG, GGG"
                                                                data-role="tagsinput">

                                                            @error('product_size_pt')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div> <!-- /col-md-4 -->
                                               
                                            </div><!-- /row -->



                                            <div class="form-group">
                                                <h5>File Input Field <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="file" class="form-control" required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <h5>Basic Select <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="select" id="select" required class="form-control">
                                                    <option value="">Select Your City</option>
                                                    <option value="1">India</option>
                                                    <option value="2">USA</option>
                                                    <option value="3">UK</option>
                                                    <option value="4">Canada</option>
                                                    <option value="5">Dubai</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Checkbox <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="checkbox" id="checkbox_1" required value="single">
                                                    <label for="checkbox_1">Check this custom checkbox</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Checkbox Group <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_2" required value="x">
                                                        <label for="checkbox_2">I am unchecked Checkbox</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_3" value="y">
                                                        <label for="checkbox_3">I am unchecked too</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-success mb-5" value="Adicionar">
                                    </div>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
