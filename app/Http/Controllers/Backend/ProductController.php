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
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

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

        // Código Image Intervention Package for PHP
        $image = $request->file('product_thumbnail');
        $generate_name = hexdec(uniqid()) . '.' . $image->getClientOriginalName();
        Image::make($image)->resize(917, 1000)->save('upload/products/thumbnails/product_thumbnail/' . $generate_name);
        $save_url = 'upload/products/thumbnails/product_thumbnail/' . $generate_name;

        // Inserir todos os dados Models Produto
        Product::insert([

            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_pt' => $request->product_name_pt,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_pt' => strtolower(str_replace(' ', '-', $request->product_name_pt)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_pt' => $request->product_tags_pt,
            'product_size_en' => $request->product_size_en,
            'product_size_pt' => $request->product_size_pt,
            'product_color_en' => $request->product_color_en,
            'product_color_pt' => $request->product_color_pt,
            'product_selling_price' => $request->product_selling_price,
            'product_discount_price' => $request->product_discount_price,
            'product_short_description_en' => $request->product_short_description_en,
            'product_short_description_pt' => $request->product_short_description_pt,
            'product_long_description_en' => $request->product_long_description_en,
            'product_long_description_pt' => $request->product_long_description_pt,

            'product_hot_deals' => $request->product_hot_deals,
            'product_featured' => $request->product_featured,
            'product_special_deals' => $request->product_special_deals,
            'product_hot_deals' => $request->product_hot_deals,

            'product_thumbnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);
    }
}
