@extends('admin.admin_master')
@section('admin')


    <div class="content-wrapper" style="min-height: 326px;">



        <section class="content">
            <div class="row">


                <!-- ======================== VIEW CUPOM/VOUCHERS ========================  -->
                
                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cupons</h3>
                        </div>

                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nome/Tipo </th>
                                            <th>Desconto</th>
                                            <th>Validade </th>
                                            <th>Status </th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($coupons as $coupon)
                                            <tr>
                                                <td> {{ $coupon->coupon_name }} </td>
                                                <td> {{ $coupon->coupon_discount }}% </td>
                                                <td> {{ $coupon->coupon_validity }}</td>

                                                <td>
                                                    @if ($coupon->status == 1)
                                                        <span class="badge badge-pill badge-success"> Ativo </span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger"> Inativo </span>
                                                    @endif

                                                </td>

                                                <td>
                                                    <a href="{{ route('coupon.edit', $coupon->id) }}" class="btn btn-info"
                                                        title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                                    <a href="{{ route('coupon.delete', $coupon->id) }}"
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



                <!-- ======================== ADICIONAR CUPOM/VOUCHERS ========================  -->


                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Adicionar Cupom/Voucher </h3>
                        </div>

                        <div class="box-body">
                            <div class="table-responsive">


                                <form method="post" action="{{ route('coupon.store') }}">
                                    @csrf


                                    <div class="form-group">
                                        <h5>Nome/Tipo <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="coupon_name" class="form-control">
                                            @error('coupon_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <h5>Desconto(%) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="coupon_discount" class="form-control">
                                            @error('coupon_discount')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <h5>Data de Validade <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="coupon_validity" class="form-control">
                                            @error('coupon_validity')
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
