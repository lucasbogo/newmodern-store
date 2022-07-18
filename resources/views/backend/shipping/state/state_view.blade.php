@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper" style="min-height: 326px;">


        <section class="content">
            <div class="row">

                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Estados</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Bairro</th>
                                            <th>Cidade </th>
                                            <th>Estado </th>
                                            <th>Ação</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($states as $item)
                                            <tr>
                                                <td> {{ $item->division->shipping_division_name }} </td>
                                                <td> {{ $item->district->shipping_district_name }} </td>
                                                <td> {{ $item->shipping_state_name }} </td>

                                                <td width="40%">
                                                    <a href="{{ route('state.edit', $item->id) }}" class="btn btn-warning"
                                                        title="Edit Data"><i class="fa fa-pencil"></i> </a>

                                                    <a href="{{ route('state.delete', $item->id) }}"
                                                        class="btn btn-danger" title="Delete Data" id="delete">
                                                        <i class="fa fa-trash"></i></a>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- ======================== ADICIONAR ESTADO ========================  -->


                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Adicionar Estado </h3>
                        </div>

                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{ route('state.store') }}">
                                    @csrf

                                    <div class="form-group">
                                        <h5> Selecionar Bairro <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="shipping_division_id" class="form-control">
                                                <option value="" selected="" disabled="">Selecionar Bairro
                                                </option>
                                                @foreach ($divisions as $div)
                                                    <option value="{{ $div->id }}">{{ $div->shipping_division_name }}
                                                    </option>
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
                                        <input type="submit" class="btn btn-rounded btn-success mb-5" value="Adicionar">
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
