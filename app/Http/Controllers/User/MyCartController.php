<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class MyCartController extends Controller
{
    // Método retornar view mycart
    public function MyCart()
    {
        return view('frontend.cart.view_mycart');
    }

    // Método Ajax p/ pegar produto e enviar ao Meu Carrinho
    public function GetCartProduct()
    {
        // bumbummen99/shoppingcart  
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),

        ));
    }

    // Método p/ excluir produto Meu Carrinho
    public function RemoveCartProduct($rowId)
    {
        // // Tentativa de aplicar cupom
        // if (Session::has('coupon')) {
        //     Session::forget('coupon');
        // }

        // Copiei essa função da documentação pacote bumbummen99/shoppingcart
        Cart::remove($rowId);
        // Após remover pela função do pacote bumbummen, retorna msg.
        return response()->json(['success' => 'Produto removido com Sucesso']);
    }

    // Método p/ incrementar produto Meu Carrinho
    public function CartProductIncrement($rowId)
    {
        // Pegar a variável $row e passar a Id nela utilizando a função get do pacote...
        $row = Cart::get($rowId);
        // Função tirada do pacote bumbummen99/shopppingcart, pegar a variável e adicionar um na qty
        Cart::update($rowId, $row->qty + 1);

        // // Tentativa de aplicar cupom
        // if (Session::has('coupon')) {
        //     $coupon_name = Session::get('coupon')['coupon_name'];
        //     $coupon = Coupon::where('coupon_name', $coupon_name)->first();

        //     Session::put('coupon', [
        //         'coupon_name' => $coupon->coupon_name,
        //         'coupon_discount' => $coupon->coupon_discount,
        //         'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100),
        //         'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100)
        //     ]);
        // }

        return response()->json('Produto incrementado com Sucesso');
    }

    public function CartProductDecrement($rowId)
    {
        // Pegar a variável $row e passar a Id nela utilizando a função get do pacote...
        $row = Cart::get($rowId);
        // Função tirada do pacote bumbummen99/shopppingcart, pegar a variável e dimunir um na qty 
        Cart::update($rowId, $row->qty - 1);

        // // Tentativa de aplicar cupom
        // $coupon_name = Session::get('coupon')['coupon_name'];
        // $coupon = Coupon::where('coupon_name', $coupon_name)->first();

        // Session::put('coupon', [
        //     'coupon_name' => $coupon->coupon_name,
        //     'coupon_discount' => $coupon->coupon_discount,
        //     'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100),
        //     'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100)
        // ]);

        return response()->json('Produto decrementado com Sucesso');
    }
}
