@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper" style="min-height: 326px;">

        <section class="content">
            <div class="row">

                {{-- <!-- Copiei e colei a view division (cidade) apaguei o col-md-8 e alterei o col-md-4 
                    p/ col-md-12 --> --}}

                <!-- ======================== ADICIONAR BAIRRO ========================  -->

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Editar Bairro </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">


                                <form method="post" action="{{ route('division.update', $divisions->id) }}">
                                    @csrf


                                    <div class="form-group">
                                        <h5>Nome Bairro <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="shipping_division_name" class="form-control"
                                                value="{{ $divisions->shiping_division_name }}">
                                            @error('shipping_division_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-success mb-5" value="Atualizar">
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
@endsection
