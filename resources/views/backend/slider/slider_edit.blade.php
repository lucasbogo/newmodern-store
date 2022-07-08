@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper" style="min-height: 326px;">
        <div class="container-full">

            <!-- Main content -->
            <section class="content">
                <div class="row">


                    <!--  =============== Página de Adicionar Sliders ================ -->


                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Atualizar Marca </h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">

                                    <!-- foi criado uma rota POST para guardar a atualização Slider -->
                                    <form method="post" action="{{ route('slider.update') }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <!-- POST IMAGE UPDATE -->
                                        <input type="hidden" name="id" value="{{ $sliders->id }}">
                                        <!-- POST method: pegar a imagem antiga -->
                                        <input type="hidden" name="old_image" value="{{ $sliders->slider_image }}">


                                        <!-- INPUT FIELD P/ TITULO SLIDER -->
                                        <div class="form-group">
                                            <h5>Titulo <span class="text-info">OPCIONAL</span></h5>
                                            <div class="controls">
                                                <input type="text" name="slider_title" class="form-control"
                                                    value="{{ $sliders->slider_title }}">

                                            </div>
                                        </div>

                                        <!-- INPUT FIELD P/ MARCA PTBR -->
                                        <div class="form-group">
                                            <h5> Descrição <span class="text-info">OPCIONAL</span></h5>
                                            <div class="controls">
                                                <input type="text" name="slider_desciprion" class="form-control"
                                                    value="{{ $sliders->slider_description }}">

                                            </div>

                                        </div>


                                        <!-- INPUT FIELD FILE P/ IMAGEM-->
                                        <div class="form-group">
                                            <h5>Imagem <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="slider_image" class="form-control">
                                                @error('slider_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- SUBMIT BUTTON -->
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-success mb-5"
                                                value="Atualizar Slider">
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
