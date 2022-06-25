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


    // Método para atualizar e guardar o dados usuario ao editar perfil - Mesma lógica do Admin.
    public function UserProfileStore(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/' .$data->profile_photo_path));
            $filename = date('Ymdhi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);
    }
    
}
