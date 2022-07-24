@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper" style="min-height: 326px;">

        <section class="content">
            <div class="row">

                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Estado</h3>
                        </div>

                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Estado</th>
                                            <th>Ação</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($divisions as $item)
                                            <tr>
                                                <td> {{ $item->shipping_division_name }} </td>

                                                <td width="40%">
                                                    <a href="{{ route('division.edit', $item->id) }}"
                                                        class="btn btn-warning" title="Edit Data"><i
                                                            class="fa fa-pencil"></i> </a>
                                                    <a href="{{ route('division.delete', $item->id) }}"
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

                                <form method="post" action="{{ route('division.store') }}">
                                    @csrf

                                    <div class="form-group">
                                        <h5>Estado<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="shipping_division_name" class="form-control">
                                            @error('shipping_division_name')
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
