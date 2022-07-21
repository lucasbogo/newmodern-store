@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper" style="min-height: 326px;">
        <div class="container-full">


            <section class="content">
                <div class="row">

                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Produtos <span class="badge badge-pill badge-danger">
                                        {{ count($products) }} </span></h3>
                                <!-- função para contar quantidade de categorias inseridas pelo admin -->
                            </div>

                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>

                                                <th> Imagem </th>
                                                <th> Produto </th>
                                                <th> Valor Venda </th>
                                                <th> Quantidade </th>
                                                <th> Desconto </th>
                                                <th> Status </th>
                                                <th> Acão </th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($products as $product)
                                                <tr>

                                                    <td><img src="{{ asset($product->product_thumbnail) }}" width="60"
                                                            height="60"></td>
                                                    <td>{{ $product->product_name_pt }}</td>
                                                    <td>R$ {{ $product->product_selling_price }} </td>
                                                    <td>{{ $product->product_qty }} Unidades</td>
                                                    <td>
                                                        {{-- <!-- LÓGICA: se o valor disconto do produto for nulo, retornar nulo,
                                                            caso contrário, segue p/ a regra de três para mostrar percentagem do desconto --> --}}

                                                        @if ($product->product_discount_price == null)
                                                            <span class="badge badge-pill badge-danger"> Sem Desconto</span>
                                                        @else
                                                            <!-- Lógica percentagem desconto -->
                                                            @php
                                                                $discount = $product->product_selling_price - $product->product_discount_price;
                                                                $percentage = ($discount / $product->product_selling_price) * 100;
                                                            @endphp
                                                            <span
                                                                class="badge badge-pill badge-danger">{{ round($percentage) }}
                                                                %</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <!--CONDIÇÃO: Se o produto ffor igual a um, então, está ativo, caso contrário zero, é inativo  -->
                                                        @if ($product->product_status == 1)
                                                            <span class="badge badge-pill badge-success"> Ativo</span>
                                                        @else
                                                            <span class="badge badge-pill badge-danger"> Inativo</span>
                                                        @endif
                                                    </td>

                                                    <!-- caso necessário, mudar o widht table buttons para caber certinho -->
                                                    <td width="30%">
                                                        <!-- Ver Detalhes Produto(s) -->
                                                        <a href="{{ route('product.manage', $product->id) }}"
                                                            class="btn btn-info" title="Detalhes Produto"><i
                                                                class="fa fa-eye"></i> </a>

                                                        <!-- Editar Produto(s) -->
                                                        <a href="{{ route('product.edit', $product->id) }}"
                                                            class="btn btn-warning" title="Editar Produto"><i
                                                                class="fa fa-pencil"></i> </a>

                                                        <!-- Excluir Produto(s) -->
                                                        <a href="{{ route('product.delete', $product->id) }}"
                                                            class="btn btn-danger" id="delete" title="Excluir Produto">
                                                            <i class="fa fa-trash"></i></a>

                                                        <!--CONDIÇÃO: Se o produto for igual a um, então, mostrar botão decrementar apenas um, caso contrário, mostrar incrementar apenas um  -->
                                                        @if ($product->product_status == 1)
                                                            <a href="{{ route('product.inactivate', $product->id) }}"
                                                                class="btn btn-dark" title="Desativar"><i
                                                                    class="fa fa-arrow-down"></i> </a>
                                                        @else
                                                            <a href="{{ route('product.activate', $product->id) }}"
                                                                class="btn btn-light" title="Ativar"><i
                                                                    class="fa fa-arrow-up"></i> </a>
                                                        @endif
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
