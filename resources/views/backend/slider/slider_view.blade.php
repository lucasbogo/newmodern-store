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
                                        {{ count($sliders) }} </span></h3>
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
                                                    <td>
                                                        <!--CONDIÇÃO: Se o produto ffor igual a um, então, está ativo, caso contrário zero, é inativo  -->
                                                        @if ($slider->slider_title == null)
                                                            <span class="badge badge-pill badge-danger"> Sem Título</span>
                                                        @else
                                                            {{ $slider->slider_title }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $slider->slider_description }}</td>


                                                    <td>
                                                        <!--CONDIÇÃO: Se o produto ffor igual a um, então, está ativo, caso contrário zero, é inativo  -->
                                                        @if ($slider->slider_status == 1)
                                                            <span class="badge badge-pill badge-success"> Ativo</span>
                                                        @else
                                                            <span class="badge badge-pill badge-danger"> Inativo</span>
                                                        @endif
                                                    </td>

                                                    <td width="">
                                                        <!-- Editar Slider(s) -->
                                                        <a href="{{ route('slider.edit', $slider->id) }}"
                                                            class="btn btn-warning" title="Editar Slider"><i
                                                                class="fa fa-pencil"></i> </a>

                                                        <!-- Excluir Slider(s) -->
                                                        <a href="{{ route('slider.delete', $slider->id) }}"
                                                            class="btn btn-danger" id="delete" title="Deletar Slider">
                                                            <i class="fa fa-trash"></i></a>

                                                        <!--CONDIÇÃO: Se o slider for igual a um, então, mostrar botão decrementar (desativar), caso contrário, mostrar incrementar (ativar)  -->
                                                        @if ($slider->slider_status == 1)
                                                            <a href="{{ route('slider.inactivate', $slider->id) }}"
                                                                class="btn btn-dark" title="Desativar"><i
                                                                    class="fa fa-arrow-down"></i> </a>
                                                        @else
                                                            <a href="{{ route('slider.activate', $slider->id) }}"
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
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->


                    </div>
                    <!-- /.col -->


                    <!--  =============== Adicionar Sliders ================ -->


                    <div class="col-4">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Adicionar Sliders </h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">


                                    <form method="post" action="{{ route('slider.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <!-- INPUT FIELD P/ MARCA EN -->
                                        <div class="form-group">
                                            <h5>Titulo<span class="text-info"> OPCIONAL</span></h5>
                                            <div class="controls">
                                                <input type="text" name="slider_title" class="form-control">


                                            </div>
                                        </div>

                                        <!-- INPUT FIELD P/ MARCA PTBR -->
                                        <div class="form-group">
                                            <h5>Descrição<span class="text-info"> OPCIONAL</span></h5>
                                            <div class="controls">
                                                <input type="text" name="slider_description" class="form-control">


                                            </div>

                                        </div>



                                        <div class="form-group">
                                            <h5>Imagem <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="slider_image" class="form-control">
                                                @error('slider_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Botão adicionar formato 'success' (verde) -->
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-success mb-5"
                                                value="Adicionar Slider">
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
