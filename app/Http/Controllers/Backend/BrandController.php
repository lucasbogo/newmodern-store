<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function BrandView()
    {
        // Pegar os dados mais atuais da table marcas pela Model e atribuir à variável $brands
        $brands = Brand::latest()->get();

        // após isso, retornar visualização da pagina brand_view localizada em:
        // views/backend/brand/brand_view.blade.php e passar os dados atribuidos à
        // variável $brands pelo compact().
        return view('backend.brand.brand_view', compact('brands'));
    }
}
