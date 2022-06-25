<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class IndexController extends Controller
{
    // Método para mostrar a página index [HOME]
    public function index()
    {

        return view('frontend.index');
    }

    // Método logout usuario [LOGOUT]
    public function UserLogout()
    {

        // Auth::logout acessa o método logout default do jetstream
        Auth::logout();

        // Após logout, o usuario é redirecionado para a pagina login
        return Redirect()->route('login');
    }

    // Método para mostrar a página perfil usuario [PROFILE]
    public function UserProfile()
    {
        //Verificar o usuario pelo ID e atribuir à variável ID
        $id = Auth::user()->id;

        // Acessar BD pela Model user, pegar a ID e atribuir à variável $user.
        $user = User::find($id);

        // Após a autenticação, retornar para página perfil. | compact retorna dados em array...
        return view('frontend.profile.user_profile', compact('user'));
    }
}
