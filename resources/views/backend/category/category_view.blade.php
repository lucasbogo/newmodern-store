<!-- COPIEI E COLEI A VIEW MARCA -->

@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper" style="min-height: 326px;">
        <div class="container-full">

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-8">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Categorias <span class="badge badge-pill badge-danger">
                                        {{ count($categories) }} </span></h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th> Ícone </th>
                                                <th> Category </th>
                                                <th> Categoria </th>
                                                <th> Acão </th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($categories as $item)
                                                <tr>
                                                    <!-- i class será a classe para os fa-fa (ícones) -->
                                                    <td><span><i class="{{ $item->category_icon }}"></i></span></td>
                                                    <td>{{ $item->category_name_en }}</td>
                                                    <td>{{ $item->category_name_pt }}</td>

                                                    <td>
                                                        <!-- Editar Categoria(s) -->
                                                        <a href="{{ route('category.edit', $item->id) }}"
                                                            class="btn btn-info" title="Editar Categoria"><i
                                                                class="fa fa-pencil"></i> </a>

                                                        <!-- Excluir Categoria(s) -->
                                                        <a href="{{ route('category.delete', $item->id) }}"
                                                            class="btn btn-danger" id="delete" title="Deletar Categoria" >
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


                    <!--  =============== Adicionar Categorias ================ -->


                    <div class="col-4">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Adicionar Categoria</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">


                                    <form method="post" action="{{ route('category.store') }}">
                                        @csrf

                                        <!-- INPUT FIELD P/ CATEGORIA EN -->
                                        <div class="form-group">
                                            <h5>Category<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="category_name_en" class="form-control">

                                                <!-- Mensagem de Erro -->
                                                @error('category_name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <!-- /Mensagem de Erro -->
                                            </div>
                                        </div>

                                        <!-- INPUT FIELD P/ CATEGORIA PTBR -->
                                        <div class="form-group">
                                            <h5>Categoria<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="category_name_pt" class="form-control">

                                                <!-- Mensagem de Erro -->
                                                @error('category_name_pt')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <!-- /Mensagem de Erro -->
                                            </div>

                                        </div>

                                        <!-- INPUT FIELD P/ CATEGORIA PTBR -->
                                        <div class="form-group">
                                            <h5>Ícone Categoria<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="category_icon" class="form-control">

                                                <!-- Mensagem de Erro -->
                                                @error('category_icon')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <!-- /Mensagem de Erro -->
                                            </div>

                                        </div>


                                        <!-- Botão adicionar formato 'success' (verde) -->
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-success mb-5"
                                                value="Adicionar Categoria">
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
