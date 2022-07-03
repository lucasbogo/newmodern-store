<!-- COPIEI E COLEI A VIEW CATEGORY -->

@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper" style="min-height: 326px;">
        <div class="container-full">

            <!-- conteúdo principal -->
            <section class="content">
                <div class="row">

                    <div class="col-8">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Sub-Categorias <span class="badge badge-pill badge-danger">
                                        {{ count($subcategories) }} </span></h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>

                                                <th> Categoria </th>
                                                <th> Sub Category </th>
                                                <th> Sub-Categoria </th>
                                                <th> Acão </th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($subcategories as $item)
                                                <tr>

                                                    <!-- chamar aqui o método category, declarado na Models/SubCategory.php
                                                                        para mostrar o nome categoria dinamicamente na view subcategory -->
                                                    <td>{{ $item['category']['category_name_en'] }}</td>
                                                    <td>{{ $item->subcategory_name_en }}</td>
                                                    <td>{{ $item->subcategory_name_pt }}</td>

                                                    <!-- Alterar o tamanho da width acy conforme necessário -->
                                                    <td width="25%">
                                                        <!-- Editar Sub-Categoria(s) -->
                                                        <a href="{{ route('subcategory.edit', $item->id) }}"
                                                            class="btn btn-info" title="Editar Sub-Categoria"><i
                                                                class="fa fa-pencil"></i> </a>

                                                        <!-- Excluir Sub-Categoria(s) -->
                                                        <a href="{{ route('subcategory.delete', $item->id) }}"
                                                            class="btn btn-danger" id="delete"
                                                            title="Excluir Sub-Categoria">
                                                            <i class="fa fa-trash"></i></a>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->


                    </div>
                    <!-- /.col -->


                    <!--  =============== Adicionar Sub-Categorias ================ -->


                    <div class="col-4">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Adicionar Sub-Categoria</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">


                                    <form method="post" action="{{ route('subcategory.store') }}">
                                        @csrf

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
                                                        <!-- P/ mostrar os dados, passa-se a coluna category e o id da mesma -->
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->category_name_en }}</option>
                                                    @endforeach

                                                </select>
                                                @error('category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <h5>SubCategory <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="subcategory_name_en" class="form-control">
                                                @error('subcategory_name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- INPUT FIELD P/ CATEGORIA PTBR -->
                                        <div class="form-group">
                                            <h5>Sub-Categoria<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="subcategory_name_pt" class="form-control">

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
                                                value="Adicionar">
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
