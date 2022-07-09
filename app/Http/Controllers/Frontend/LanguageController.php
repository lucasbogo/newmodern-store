<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    // MÉTODO P/ TRADUZIR PARA PTBR
    public function Portuguese()
    {   
        // Pegar a sessão v
        session()->get('language');

        // Esquecer a sessão
        session()->forget('language');

        // Indicar a linguagem da Sessão
        Session::put('language', 'portuguese');

        // Retornar pagina (backpage)
        return redirect()->back();
    }

    // MÉTODO P/ TRADUZIR PARA INGLÊS
    public function English()
    {   
        // Pegar a sessão
        session()->get('language');

        // Esquecer a sessão
        session()->forget('language');


        // Indicar a linguagem da Sessão
        Session::put('language', 'english');

        // Retornar pagina (backpage)
        return redirect()->back();
    }
}
