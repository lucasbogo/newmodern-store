<?php

namespace App\Http\Controllers\User;


use App\Models\Shipping;
use App\Models\ShippingDistrict;
use App\Models\ShippingDivision;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // Método Ajax p/ pegar os dados relacionais estado/cidade do BD
    public function DistrictGetAjax($shipping_division_id)
    {
        // Buscar os nomes em orden decrescente da table shipping_division (estado) e atribui-los à variável $shipping
        $shipping = ShippingDistrict::where('shipping_division_id', $shipping_division_id)->orderBy('shipping_district_name', 'ASC')->get();
        // Após atribuição, retornar os dados em formato json, como consta no JS Ajax script.
        return json_encode($shipping);
    }



    public function CheckoutStore(Request $request)
    {

        $data = array();
        $data['shipping_division_id'] = $request->shipping_division_id;
        $data['shipping_district_id'] = $request->shipping_district_id;
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['postal_code'] = $request->postal_code;
        $data['shipping_street'] = $request->shipping_street;
        $data['shipping_number'] = $request->shipping_number;
        $data['shipping_hood'] = $request->shipping_hood;
        $data['notes'] = $request->notes;
        $cartTotal = Cart::total();


        if ($request->payment_method == 'stripe') {
            return view('frontend.payment.stripe', compact('data', 'cartTotal'));
        } elseif ($request->payment_method == 'card') {
            return 'card';
        } else {
            return view('frontend.payment.cash', compact('data', 'cartTotal'));
        }
    }
}
