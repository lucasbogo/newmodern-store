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
                                                <td width="25%">
                                                    {{ Carbon\Carbon::parse($coupon->coupon_validity)->format('D,d F Y') }}
                                                </td>


                                                <td>
                                                    @if ($coupon->status == 1)
                                                        <span class="badge badge-pill badge-success"> Valido </span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger"> Invalido </span>
                                                    @endif

                                                </td>

                                                <td width="40%">
                                                    <a href="{{ route('coupon.edit', $coupon->id) }}"
                                                        class="btn btn-warning" title="Edit Data"><i
                                                            class="fa fa-pencil"></i> </a>

                                                    <a href="{{ route('coupon.delete', $coupon->id) }}"
                                                        class="btn btn-danger" title="Delete Data" id="delete">
                                                        <i class="fa fa-trash"></i></a>

                                                    <!--CONDIÇÃO: Se o cupom/voucher for igual a um, então, mostrar botão decrementar apenas um, caso contrário, mostrar incrementar apenas um  -->
                                                    @if ($coupon->status == 1)
                                                        <a href="{{ route('coupon.inactivate', $coupon->id) }}"
                                                            class="btn btn-dark btn-sm" title="Desativar"><i
                                                                class="fa fa-arrow-down"></i> </a>
                                                    @else
                                                        <a href="{{ route('coupon.activate', $coupon->id) }}"
                                                            class="btn btn-light btn-sm" title="Ativar"><i
                                                                class="fa fa-arrow-up"></i> </a>
                                                    @endif
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

                                    <!-- {carbon\} = impedir que validem desconto para datas antes de (now) -->
                                    <div class="form-group">
                                        <h5>Data de Validade <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="coupon_validity" class="form-control"
                                                min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
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
@endsection
