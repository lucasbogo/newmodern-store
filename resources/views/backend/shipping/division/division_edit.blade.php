@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper" style="min-height: 326px;">

        <section class="content">
            <div class="row">

                <!-- ======================== EDITAR ESTADO ========================  -->

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Editar Estado </h3>
                        </div>

                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{ route('division.update', $divisions->id) }}">
                                    @csrf

                                    <div class="form-group">
                                        <h5>Nome Estado <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="shipping_division_name" class="form-control"
                                                value="{{ $divisions->shipping_division_name }}">
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
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
