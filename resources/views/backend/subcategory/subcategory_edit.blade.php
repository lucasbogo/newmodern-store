<!-- COPIEI E COLEI A VIEW SUBCATEGORY -->

@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper" style="min-height: 326px;">
        <div class="container-full">

            <!-- conteúdo principal -->
            <section class="content">
                <div class="row">




                    <!--  =============== Adicionar Sub-Categorias ================ -->

                    <!-- "col-12" deixa classe larga; abrage a página inteira -->
                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Editar Sub-Categoria</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">


                                    <form method="post" action="{{ route('subcategory.update') }}">
                                        @csrf

                                        <!-- incluir dados que não podem ser vistos ou modificados pelos usuários 
                                                    quando um formulário é enviado; -->
                                        <input type="hidden" name="id" value="{{ $subcategory->id }}">

                                        <!-- FIELD p/ Categoria -->
                                        <div class="form-group">
                                            <h5>Selecionar Categoria <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="category_id" class="form-control">
                                                    <option value="" selected="" disabled="">Selecionar
                                                        Categoria
                                                    </option>

                                                    <!-- Mostrar os dados da variável $categories na condição foreach (nome categoria em inglês) -->
                                                    @foreach ($categories as $category)

                                                        <!--  CONDIÇÃO p/ mostrar os dados, passa-se a coluna category e o id da mesma:
                                                              quando os IDs combinarem, a fk_id category com a id subcategory, então 
                                                              retorna os valores solicitados, caso contrário, retorna nulo -->
                                                        <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ?
                                                        'selected': ''}}>

                                                            {{ $category->category_name_en }}</option>
                                                    @endforeach

                                                </select>
                                                @error('category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- INPUT FIELD P/ SUB-CATEGORIA EN -->
                                        <div class="form-group">
                                            <h5>SubCategory <span class="text-danger">*</span></h5>
                                            <div class="controls">

                                                <!-- campo value="" serve p/ mostrar dinamicamente os valores da subcategoria,(name_en ou name_ptbr) -->
                                                <input type="text" name="subcategory_name_en" class="form-control"
                                                    value="{{ $subcategory->subcategory_name_en }}">

                                                <!-- Mensagem de Erro -->
                                                @error('subcategory_name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <!-- /Mensagem de Erro -->
                                            </div>
                                        </div>

                                        <!-- INPUT FIELD P/ SUB-CATEGORIA PTBR -->
                                        <div class="form-group">
                                            <h5>Sub-Categoria<span class="text-danger">*</span></h5>
                                            <div class="controls">

                                                <!-- campo value="" serve p/ mostrar dinamicamente os valores da subcategoria,(name_en ou name_ptbr) -->
                                                <input type="text" name="subcategory_name_pt" class="form-control"
                                                    value="{{ $subcategory->subcategory_name_pt }}">

                                                <!-- Mensagem de Erro -->
                                                @error('subcategory_name_pt')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <!-- /Mensagem de Erro -->
                                            </div>

                                        </div>


                                        <!-- Botão adicionar formato 'success' (verde) -->
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-success mb-5"
                                                value="Confirmar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection
