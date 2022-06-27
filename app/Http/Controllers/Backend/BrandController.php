<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    // Método para visualização das marcas.
    public function BrandView()
    {
        // Pegar os dados mais atuais da table brands(marcas) pela Model e atribuir à variável $brands
        $brands = Brand::latest()->get();

        // após isso, retornar visualização da pagina brand_view localizada em:
        // views/backend/brand/brand_view.blade.php e passar os dados atribuidos à
        // variável $brands pelo compact().
        return view('backend.brand.brand_view', compact('brands'));
    }

    // Método para guardar os dados da marca,
    // Como é um método POST, é nessário chamar Request $request no método.
    public function BrandStore(Request $request)
    {
        // Validar os input fields marcar ingles, marca ptbr e a imagem da marca.
        $request->validate(
            [
                'brand_name_en' => 'required',
                'brand_name_pt' => 'required',
                'brand_image' => 'required',

            ],

            // Customizar as mensagens de erro
            [
                'brand_name_en.required' => 'Inserir Marca em Inglês',
                'brand_name_pt.required' => 'Inserir Marca em Português',
                'brand_image.required' => 'Foto da Marca é obirgatório',
            ]
        );

        // Pegar a imagem Marca e a atribuir a variável $image
        $image = $request->file('brand_image');
        // Criar um Id unica para a imagem e pegar a extensão da imagem
        $generate_name = hexdec(uniqid()) . '.' . $image->getClientOriginalName();
        // Gerar a imagem e redimensionar para 3000px X 300px e depois salvar na pasta brands (marcas)
        Image::make($image)->resize(300, 300)->save('upload/brand_images/' . $generate_name);
        // Salvar a imagem atualizada
        $save_url = 'upload/brand_images/' . $generate_name;

        // Salvar imagem no BD
        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_pt' => $request->brand_name_pt,

            //Slug, strtolower converte string para minusculo, se tiver espaço, substitui com traço e mostra o nome da marca em inglês
            'brand_slug_en' => strtolower(str_replace('', '-', $request->brand_name_en)),
            'brand_slug_pt' => strtolower(str_replace('', '-', $request->brand_name_pt)),

            // Salva a imagem utilzando a variável $save_url
            'brand_image' => $save_url,
        ]);

        // Mensagen toaster para mostrar barra verde com a mensaagem de sucesso
        $notification = array(
            'message' => 'Marca inserido com Sucesso',
            'alert-type' => 'success'
        );

        // Retornar para pagina manter marca
        return redirect()->back()->with($notification);
    }

    // Método para editar Marca, É necessário pegar o Id
    public function BrandEdit($id)
    {
        // Buscar o Id e atribuit à variável $brand pelo find or fail, que:
        // recebe um id e retorna um único modelo. Se não existir nenhum modelo correspondente, ele gera um erro 404
        $brand = Brand::findOrFail($id);

        // Após buscar a Id e atribuir-à variável $brand(marca), retornar para página edit(editar);
        // Cria, também, um array com a marca selecionada pelo ID, essa é a função fo compact('brands'));
        return view('backend.brand.brand_edit', compact('brand'));
    }

    // Método para guardar as edições Marcas (nome e imagem edit); Como é POST, é necessário 'Request $request'
    public function BrandUpdate(Request $request)
    {

        // Pegar id e atribuir à variável $brand
        $brand_id = $request->id;

        // Pegar Imagem antiga
        $old_image = $request->old_image;

        // COndição: se deseja atualizar imagem, pega a imagem antiga e atualiza
        if ($request->file('brand_image')) {

        // desvincular imagem
        unlink($old_image);

        /* === Copiei e colei a lógica do método BrandStore === */

        // Pegar a imagem Marca e a atribuir a variável $image
        $image = $request->file('brand_image');

        // Criar um Id unica para a imagem e pegar a extensão da imagem
        $generate_name = hexdec(uniqid()) . '.' . $image->getClientOriginalName();

        // Gerar a imagem e redimensionar para 3000px X 300px e depois salvar na pasta brands (marcas)
        Image::make($image)->resize(300, 300)->save('upload/brand_images/' . $generate_name);

        // Salvar a imagem atualizada
        $save_url = 'upload/brand_images/' . $generate_name;

        // ATUALIZAR imagem no BD pelo ID. acha id ou gera mens. erro 404 e, finalmente, atualiza ->update
        Brand::findOrFail($brand_id)->update([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_pt' => $request->brand_name_pt,

            //Slug, strtolower converte string para minusculo, se tiver espaço, substitui com traço e mostra o nome da marca em inglês
            'brand_slug_en' => strtolower(str_replace('', '-', $request->brand_name_en)),
            'brand_slug_pt' => strtolower(str_replace('', '-', $request->brand_name_pt)),

            // Salva a imagem utilzando a variável $save_url
            'brand_image' => $save_url,
        ]);

        // Mensagen toaster para mostrar barra verde com a mensagem de sucesso
        $notification = array(
            'message' => 'Marca atualizada com Sucesso',
            'alert-type' => 'success'
        );

        // Retornar para pagina todas marcas
        return redirect()->route('all.brands')->with($notification);
    
        // Caso contrário, se não desejar atualizar imagem, atualizar somente o inputfield desejado
        } else {

            /* ===== COPIEI E COLEI A LÓGICA Brand::findOrFail ===== */

        // ATUALIZAR imagem no BD pelo ID. acha id ou gera mens. erro 404 e, finalmente, atualiza ->update
        Brand::findOrFail($brand_id)->update([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_pt' => $request->brand_name_pt,

            //Slug, strtolower converte string para minusculo, se tiver espaço, substitui com traço e mostra o nome da marca em inglês
            'brand_slug_en' => strtolower(str_replace('', '-', $request->brand_name_en)),
            'brand_slug_pt' => strtolower(str_replace('', '-', $request->brand_name_pt)),

            // Não esquecer de tirar update image...
            
        ]);

        // Mensagen toaster para mostrar barra verde com a mensagem de sucesso
        $notification = array(
            'message' => 'Marca atualizada com Sucesso',
            'alert-type' => 'success'
        );

        // Retornar para pagina todas marcas
        return redirect()->route('all.brands')->with($notification);

        } //final else       

    }

    // Método para Deletar Marca; como foi definido na rota, e nessário pegar o id da Marca. 
    public function BrandDelete($id)
    {
        // Como ja explicado, é necessário pegar o id Marca pelo método findOrFail, pega ou 404 error
        $brand = Brand::findOrFail($id);

        // Acessar a table Brand(marcas) e a coluna brand_image
        $image = $brand->brand_image;

        // Após isso, desvincular image
        unlink($image);

        // Finalmente, deletar pela função delete().
        Brand::findOrFail($id)->delete();

        // Mostrar notificação (toaster message) de exclusão bem sucedida.
        $notification = array(
            'message' => 'Marca Deletada com Sucesso',
            'alert-type' => 'success'
        );
        // Após exclusão, simplesmente retornar.
        return redirect()->back()->with($notification);
    }
}
