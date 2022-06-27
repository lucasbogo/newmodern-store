@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper" style="min-height: 326px;">
        <div class="container-full">

            <!-- Main content -->
            <section class="content">
                <div class="row">


                    <!--  =============== Página de Adicionar Marcas ================ -->


                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Atualizar Marca </h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">

                                    <!-- foi criado uma rota POST para guardar a atualização Marca -->
                                    <form method="post" action="{{ route('brand.update', $brand->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <!-- POST image update -->
                                        <input type="hidden" name="id" value="{{ $brand->id }}">
                                        <!-- POST method: pegar a imagem antiga -->
                                        <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">


                                        <!-- INPUT FIELD P/ MARCA EN -->
                                        <div class="form-group">
                                            <h5>Brand <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="brand_name_en" class="form-control"
                                                    value="{{ $brand->brand_name_en }}">
                                                <!-- Mostrar nome marca dinamicamente -->


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
                                                <input type="text" name="brand_name_pt" class="form-control"
                                                    value="{{ $brand->brand_name_pt }}">
                                                <!-- Mostrar nome marca dinamicamente -->


                                                <!-- Mensagem de Erro -->
                                                @error('brand_name_pt')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <!-- /Mensagem de Erro -->
                                            </div>

                                        </div>



                                        <div class="form-group">
                                            <h5>Logomarca <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="brand_image" class="form-control">
                                                @error('brand_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-success mb-5"
                                                value="Atualizar">
                                        </div>
                                    </form>





                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!--/div col md-4 -->
                </div><!-- /div class row -->

            </section>
            <!-- /.content -->

        </div>
    </div>
@endsection
