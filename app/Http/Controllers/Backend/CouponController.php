<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    // Método p/ visualizar página crud cupons
    public function CouponView()
    {
        $coupons = Coupon::orderBy('id', 'DESC')->get();
        return view('backend.coupon.coupon_view', compact('coupons'));
    }

    // Método p/ guardar os dados cupom/voucher
    public function CouponStore(Request $request)
    {

        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required',

        ]);



        Coupon::insert([
            // função do Laravel para deixar todos os carecteres em caixa alta
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Cupom/Voucher inserido com Sucesso',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function CouponEdit($id)
    {
        $coupons = Coupon::findOrFail($id);
        return view('backend.coupon.coupon_edit', compact('coupons'));
    }


    public function CouponUpdate(Request $request, $id)
    {

        Coupon::findOrFail($id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Cupom/Voucher Atualizado com Successo',
            'alert-type' => 'success'
        );

        return redirect()->route('coupons.manage')->with($notification);
    }

    public function CouponDelete($id)
    {

        Coupon::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Cupom/Voucher Excluído com Successo',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
