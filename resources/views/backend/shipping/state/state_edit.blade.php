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


                                <form method="post" action="{{ route('state.update', $states->id) }}">
                                    @csrf


                                    <div class="form-group">
                                        <h5> Selecionar Bairro <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="shipping_division_id" class="form-control">
                                                <option value="" selected="" disabled=""> Selecionar Bairro
                                                </option>
                                                @foreach ($divisions as $div)
                                                    <option value="{{ $div->id }}"
                                                        {{ $div->id == $districts->shipping_division_id ? 'selected' : '' }}>
                                                        {{ $div->shipping_division_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('shipping_division_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5> Selecionar Cidade <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="shipping_district_id" class="form-control">
                                                <option value="" selected="" disabled="">Selecionar Cidade
                                                </option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}">
                                                        {{ $district->shipping_district_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('shipping_district_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <h5> Estado <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="shipping_state_name" class="form-control">
                                            @error('shipping_state_name')
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
