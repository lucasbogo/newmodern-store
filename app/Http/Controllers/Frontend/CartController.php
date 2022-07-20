<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Coupon;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Método p/ adicionar Item no Carrinho
    public function AddToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->product_discount_price == null) {
            // bumbummen99/shoppingcart
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->product_selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

            return response()->json(['success' => 'Produto Adicionado ao Carrinho']);
        } else {
            //bumbummen99/shoppingcart
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->product_discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

            return response()->json(['success' => 'Produto Adicionado ao Carrinho']);
        }
    }

    // Método para adicionar Carrinho Temporário
    public function AddMiniCart()
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

    // Método p/ Remover Item no Carrinho Temporário
    public function RemoveMiniCart($rowId)
    {
        // bumbummen99/shoppingcart 
        Cart::remove($rowId);
        return response()->json(['success' => 'Produto Removido do Carrinho']);
    }

    // O item só poderá ser adicionado à lista de desejos se e somente se, o usuário estiver 'logado'
    // O item, também, só poderá ser adicionado, se e somente se, não existir na lista. (não foi adicionado ainda)  
    // Método p/ adicionar Item na Lista de Desejos
    public function AddToWishList(Request $request, $product_id)
    {
        // Verificar se o usuário está logado ou existe
        if (Auth::check()) {

            $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();

            // Se o produto não existir na Lista Desejos, então, adicionar, caso contrário, impede a adição.
            if (!$exists) {
                // Se existir, inserir o produto na Lista de Desejos com os seguintes atributos:
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Produto Adicionado à sua Lista de Desejos']);
            } else {
                // Se o usuário tentar adicionar um produto já adicionado, mostrar mensagem de erro.
                return response()->json(['error' => 'Produto ja foi adicionado à sua Lista de Desejos ']);
            }
        } else {
            // Se o usário não for autenticado ou não estiver 'logado', mostrar toastr msg erro.
            return response()->json(['error' => 'Efetuar Login antes de Adicionar à sua Lista de Desejos']);
        }
    }



    // ============================= MÉTODOS  AJAX APLICAR VOUCHER/CUPOM  ============================= //

    // Método aplicar voucher/cupom ajax
    public function CouponApply(Request $request)
    {
        // Relação db cupom com o field name ajax econtrada na main_master
        $coupon = Coupon::where('coupon_name', $request->coupon_name)->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->first();
        // Condição: se existe cupom, e o mesmo está nos conformes, 'colocar' cupom na sessão usuário
        // Mostrar nome, disconto, calcular o descconto e valor total após desconto.
        if ($coupon) {

            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100)
            ]);

            return response()->json(array(
                'validity' => true,
                'success' => 'Cupom Aplicado com Sucesso'
            ));
        } else {
            return response()->json(['error' => 'Cupom Inválido']);
        }
    }
}
