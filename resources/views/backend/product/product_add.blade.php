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
                                                <div class="col-md-4">

                                                    <!-- FIELD p/ Categoria -->
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

                                                <div class="col-md-4">

                                                    <!-- FIELD p/ Categoria -->
                                                    <div class="form-group">
                                                        <h5>Selecionar Categoria <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="category_id" class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    Selecionar Categoria
                                                                </option>

                                                                <!-- Mostrar os dados da variável $categories na condição foreach (nome categoria em inglês) -->
                                                                @foreach ($categories as $category)
                                                                    <!--  CONDIÇÃO p/ mostrar os dados, passa-se a coluna category e o id da mesma:
                                                                                              quando os IDs combinarem, a fk_id category com a id subcategory, então
                                                                                              retorna os valores solicitados, caso contrário, retorna nulo -->
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

                                                <div class="col-md-4">

                                                    <!-- FIELD p/ Categoria -->
                                                    <div class="form-group">
                                                        <h5>Selecionar Sub-Categoria <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="subcategory_id" class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    Selecionar
                                                                    Categoria
                                                                </option>

                                                               <!-- AQUI FOI USADO JAVASCRIPT PARA SELECIONAR 
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

                                            <div class="form-group">
                                                <h5>Email Field <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="email" name="email" class="form-control" required
                                                        data-validation-required-message="This field is required">
                                                </div>
                                            </div>


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
