<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Images;
use App\Models\Product;
use App\Models\Slider;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    // MÉTODO P/ ADICIONAR PRODUTO
    public function SliderView()
    {
        // Pegar todos os dados da Model Category
        $sliders = Slider::latest()->get();

        // Após pegar os dados das Models pelo compact(), retornar p a página em Backend/slider.slider_view
        return view('backend.slider.slider_view', compact('sliders'));
    }
}
