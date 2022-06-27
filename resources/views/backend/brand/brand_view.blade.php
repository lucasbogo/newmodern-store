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
                                <h3 class="box-title">Marcas <span class="badge badge-pill badge-danger">
                                        {{ count($brands) }} </span></h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th> Brand </th>
                                                <th> Marca </th>
                                                <th> Imagem </th>
                                                <th> Acão </th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($brands as $item)
                                                <tr>
                                                    <td>{{ $item->brand_name_en }}</td>
                                                    <td>{{ $item->brand_name_pt }}</td>
                                                    <td><img src="{{ asset($item->brand_image) }}"
                                                            style="width: 70px; height: 40px;"> </td>
                                                    <td>
                                                        <!-- Editar Marca(s) -->
                                                        <a href="{{ route('brand.edit', $item->id) }}"
                                                            class="btn btn-info" title="Editar Marca"><i
                                                                class="fa fa-pencil"></i> </a>
                                                                
                                                        <!-- Editar Marca(s) -->    
                                                        <a href="{{ route('brand.delete', $item->id) }}"
                                                            class="btn btn-danger" title="Deletar Marca" id="delete">
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


                    <!--  =============== Adiciona a página de Marcas ================ -->


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
                                            <h5>Brand <span class="text-danger">*</span></h5>
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
                                            <h5> Marca <span class="text-danger">*</span></h5>
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
