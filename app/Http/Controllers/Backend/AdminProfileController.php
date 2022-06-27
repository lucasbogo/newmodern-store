<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;


class AdminProfileController extends Controller
{
    // Método p/ acessar perfil admin. Busca pelo IdAdmin e retorna view perfil
    public function AdminProfile()
    {
        // Acessa Admin Model p/ pegar o adm pre-registrado no BD pelo ID (1)
        $adminData = Admin::find(1);
        // Depois retorna perfil adm editável
        // Onde compact() cria um array com a variavél existente
        return view('admin.admin_profile_view', compact('adminData'));
    }

    // Metodo p/ editar perfil admin. Busca peloo IdAdmin e retorn view editar perfil
    public function AdminProfileEdit()
    {
        $editData = Admin::find(1);
        return view('admin.admin_profile_edit', compact('editData'));
    }

    // Método p/ postar (POST) dados editados do admin
    public function AdminProfileStore(Request $request)
    {
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        // Condição de upload de imagem:
        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            // Salvar apenas a foto atual
            @unlink(public_path('upload/admin_images/' . $data->profile_photo_path));
            // Salvar arquivo em upload/admin_images pelo nome e extensão da imagem
            $filename = date('Ymdhi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            // Subir dado no BD
            $data['profile_photo_path'] = $filename;
        }
        // Salvar dado no BD
        $data->save();

        // Mensagen toaster para mostrar barra verde com a mensaagem de sucesso
        $notification = array(
            'message' => 'Perfil Adminstrador Alterada com Sucesso',
            'alert-type' => 'success'
        );

        // Retornar para pagina perfil
        return redirect()->route('admin.profile')->with($notification);
    }

    // Método para mudar senha mantenedor: apenas retorn a view
    public function AdminChangePassword()
    {
        return view('admin.admin_change_password');
    }

    // Método para atualizar senha alterada mantenedor
    public function  AdminUpdateChangePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        // Pega a senha criptografada do mantenedor e salva na variável $hashedPassword
        $hashedPassword = Admin::find(1)->password;

        /*Condição: se o mantenedor requisitar mudança de senha , realizar: */

        // verificar se a senha é compativel com a senha salva no BD | Hash::check é uma função nativa do Laravel */
        if (Hash::check($request->oldpassword, $hashedPassword)) {

            // Pega os dados admin (Senha) e armazena na variavél $admin
            $admin = Admin::find(1);

            // Acessa o campo 'password' no BD com a variável $admin e cria, então, uma senha HASH
            $admin->password = Hash::make($request->password);

            // Salvar dado
            $admin->save();

            // Após salvar dado, o mantendeor autenticado é redirecionado para logout
            Auth::logout();

            // Após logout, mantenedor é redirecionado para página logout
            return redirect()->route('admin.logout');
        }
        /*Condição: caso contrário, redirecionar para página anterior */ else {
            return redirect()->back();
        }
    }
}
