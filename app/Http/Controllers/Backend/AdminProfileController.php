<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    // Método p/ acessar perfil admin
    public function AdminProfile() 
    {
        // Acessa Admin Model p/ pegar o adm pre-registrado no BD pelo ID (1)
        $adminData = Admin::find(1);
        // Depois retorna perfil adm editável
        // Onde compact() cria um array com a variavél existente
        return view('admin.admin_profile_view', compact('adminData'));
    }

    // Metodo p/ editar perfil admin
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
        if ($request->file('profile_photo_path'))
        {
            $file = $request->file('profile_photo_path');
            // Salvar apenas a foto atual
            @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            // Salvar arquivo em upload/admin_images pelo nome e extensão da imagem
            $filename = date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            // Subir dado no BD
            $data['profile_photo_path'] = $filename;
        }
        // Salvar dado no BD
        $data->save();

        // Mensagens toaster
        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        // Retornar para pagina
        return redirect()->route('admin.profile')->with($notification);
    }
}
