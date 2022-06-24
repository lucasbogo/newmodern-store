<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    // Método para mostrar a página index [HOME]
    public function index()
    {

        return view('frontend.index');
    }
}
