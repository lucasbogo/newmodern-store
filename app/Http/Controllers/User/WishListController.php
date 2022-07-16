<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    // Método p/ acessar a rota view Lista Desejo página
    public function ViewWishList()
    {
        return view('frontend.wishlist.view_wishlist');
    }

    public function GetWishListProduct()
    {

        $wishlist = Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();

        return response()->json($wishlist);
    }

    public function RemoveWishlistProduct($id)
    {

        Wishlist::where('user_id', Auth::id())->where('id', $id)->delete();
        return response()->json(['success' => 'Produto removido com Sucesso']);
    }
}
