<?php

// Importar todas as models categorias e marca

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Product;

class ProductController extends Controller
{
    // MÉTODO P/ ADICIONAR PRODUTO
    public function AddProduct()
    {
        // Pegar todos os dados da Model Category
        $categories = Category::latest()->get(); 

        // Pegar todos os dados da Model Brand (marca)
        $brands = Brand::latest()->get();
        
        // Após pegar os dados das Models pelo compact(), retornar p a página em Backend/products.product.add
        return view('backend.product.product_add', compact('categories', 'brands'));


    }

    // MÉTODO P/ SALVAR O PRODUTO ADICIONADO
    public function StoreProduct(Request $request)
    {



    }
}
