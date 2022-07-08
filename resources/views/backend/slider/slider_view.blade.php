@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper" style="min-height: 326px;">
        <div class="container-full">

            <!-- Conteúdo Principal -->
            <section class="content">
                <div class="row">

                    <div class="col-8">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Sliders <span class="badge badge-pill badge-danger">
                                        {{ count($slider) }} </span></h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th> Imagem Slider </th>
                                                <th> Título </th>
                                                <th> Descrição </th>
                                                <th> Status </th>
                                                <th> Acão </th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($sliders as $slider)
                                                <tr>
                                                    <td><img src="{{ asset($slider->slider_image) }}"
                                                            style="width: 70px; height: 40px;"> </td>
                                                    <td>{{ $slider->title }}</td>
                                                    <td>{{ $slider->description }}</td>


                                                    <td>
                                                        <!--CONDIÇÃO: Se o produto ffor igual a um, então, está ativo, caso contrário zero, é inativo  -->
                                                        @if ($product->slider_status == 1)
                                                            <span class="badge badge-pill badge-success"> Ativo</span>
                                                        @else
                                                            <span class="badge badge-pill badge-danger"> Inativo</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <!-- Editar Marca(s) -->
                                                        <a href="{{ route('brand.edit', $item->id) }}"
                                                            class="btn btn-info" title="Editar Marca"><i
                                                                class="fa fa-pencil"></i> </a>

                                                        <!-- Excluir Marca(s) -->
                                                        <a href="{{ route('brand.delete', $item->id) }}"
                                                            class="btn btn-danger" id="delete" title="Deletar Marca">
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


                    <!--  =============== Adicionar Marcas ================ -->


                    <div class="col-4">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Adicionar Marcas </h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">


                                    <form method="post" action="{{ route('brand.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <!-- INPUT FIELD P/ MARCA EN -->
                                        <div class="form-group">
                                            <h5>Brand<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="brand_name_en" class="form-control">

                                                <!-- Mensagem de Erro -->
                                                @error('brand_name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <!-- /Mensagem de Erro -->
                                            </div>
                                        </div>

                                        <!-- INPUT FIELD P/ MARCA PTBR -->
                                        <div class="form-group">
                                            <h5>Marca<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="brand_name_pt" class="form-control">

                                                <!-- Mensagem de Erro -->
                                                @error('brand_name_pt')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <!-- /Mensagem de Erro -->
                                            </div>

                                        </div>



                                        <div class="form-group">
                                            <h5>Brand Image <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="brand_image" class="form-control">
                                                @error('brand_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Botão adicionar formato 'success' (verde) -->
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-success mb-5"
                                                value="Adicionar Marca">
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
