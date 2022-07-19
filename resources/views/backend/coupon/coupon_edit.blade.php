@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper" style="min-height: 326px;">



        <section class="content">
            <div class="row">




                <!-- ======================== EDITAR CUPOM/VOUCHERS ========================  -->


                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Editar Cupom/Voucher </h3>
                        </div>

                        <div class="box-body">
                            <div class="table-responsive">


                                <form method="post" action="{{ route('coupon.update', $coupons->id) }}">
                                    @csrf


                                    <div class="form-group">
                                        <h5>Nome/Tipo <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="coupon_name" class="form-control"
                                                value="{{ $coupons->coupon_name }}">
                                            @error('coupon_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <h5>Desconto(%) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="coupon_discount" class="form-control"
                                                value="{{ $coupons->coupon_discount }}">
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
                                                min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                                value="{{ $coupons->coupon_validity }}">
                                            @error('coupon_validity')
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
