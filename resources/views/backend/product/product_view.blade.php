<!-- COPIEI E COLEI A VIEW CATEGORY E EXCLUI O COL MD-4 (ADICONAR CATEGORIA) -->

@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper" style="min-height: 326px;">
        <div class="container-full">

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Produtos <span class="badge badge-pill badge-danger">
                                        {{ count($products) }} </span></h3>
                                <!-- função para contar quantidade de categorias inseridas pelo admin -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>

                                                <th> Imagem </th>
                                                <th> Produto </th>
                                                <th> Valor Venda </th>
                                                <th> Quantidade </th>
                                                <th> Acão </th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($products as $product)
                                                <tr>

                                                    <td><img src="{{ asset($product->product_thumbnail) }}" width="60"
                                                            height="60"></td>
                                                    <td>{{ $product->product_name_pt }}</td>
                                                    <td>{{ $product->product_selling_price }}</td>
                                                    <td>{{ $product->product_qty }}</td>

                                                    <td>
                                                        <!-- Editar Produto(s) -->
                                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-info" title="Editar Produto"><i
                                                                class="fa fa-pencil"></i> </a>

                                                        <!-- Excluir Produto(s) -->
                                                        <a href="#" class="btn btn-danger" id="delete"
                                                            title="Excluir Produto">
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
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection
