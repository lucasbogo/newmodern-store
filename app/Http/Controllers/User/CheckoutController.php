<?php

namespace App\Http\Controllers\User;


use App\Models\Shipping;
use App\Models\ShippingDistrict;
use App\Models\ShippingDivision;
use App\Models\ShippingState;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function CheckoutStore(Request $request)
    {

        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['postal_code'] = $request->postal_code;
        $data['shipping_street'] = $request->shipping_street;
        $data['shipping_number'] = $request->shipping_number;
        $data['shipping_hood'] = $request->shipping_hood;
        $data['shipping_city'] = $request->shipping_city;
        $data['shipping_state'] = $request->shipping_state;
        $data['notes'] = $request->notes;
        $cartTotal = Cart::total();
        //  Tentativa selecionar estado com bairro e cidade
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;

        return view('frontend.payment.stripe', compact('data', 'cartTotal'));
    }
}
