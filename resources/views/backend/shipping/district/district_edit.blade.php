@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper" style="min-height: 326px;">

        <section class="content">
            <div class="row">

                <!-- ======================== EDITAR CIDADE ========================  -->

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Editar Cidade </h3>
                        </div>

                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{ route('district.update', $districts->id) }}">
                                    @csrf

                                    <div class="form-group">
                                        <h5> Selecionar Cidade <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="shipping_division_id" class="form-control">
                                                <option value="" selected="" disabled=""> Selecionar Cidade
                                                </option>
                                                @foreach ($divisions as $division)
                                                    <option value="{{ $division->id }}"
                                                        {{ $division->id == $districts->shipping_division_id ? 'selected' : '' }}>
                                                        {{ $division->shipping_division_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('shipping_division_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Cidade <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="shipping_district_name" class="form-control"
                                                value="{{ $districts->shipping_district_name }}">
                                            @error('shipping_district_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-success mb-5" value="Update">
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
