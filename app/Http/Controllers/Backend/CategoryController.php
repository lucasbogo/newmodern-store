<?php

/* IMPORTAR MODELS CATEGORY */
/* COPIE E COLEI A MESMA LÓGICA UTILIZADA NA CRUD BRANDS(marcas) */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Método p/ visualização das categorias
    public function CategoryView()
    {
        // Pegar os dados mais atuais da table brands(categories) pela Model e atribuir à variável $category
        $categories = Category::latest()->get();
        // Retorna a view, localizada em resources/views/backend/category/category_view.blade.php
        return view('backend.category.category_view', compact('categories'));
    }

    // Método p/ guardar dados categoria no BD - a rota deve ser POST no web.php
    public function CategoryStore(Request $request)
    {
        $request->validate(
            [
                'category_name_en' => 'required',
                'category_name_pt' => 'required',
                

            ],

            // Customizar as mensagens de erro
            [
                'category_name_en.required' => 'Inserir Categoria em Inglês',
                'category_name_pt.required' => 'Inserir Categoria em Português',
                
            ]
        );

        // Salvar imagem no BD
        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_pt' => $request->category_name_pt,
            

            //Slug, strtolower converte string para minusculo, se tiver espaço, substitui com traço e mostra o nome da marca em inglês
            'category_slug_en' => strtolower(str_replace('', '-', $request->category_name_en)),
            'category_slug_pt' => strtolower(str_replace('', '-', $request->category_name_pt)),

        ]);

        // Mensagen toaster para mostrar barra verde com a mensaagem de sucesso
        $notification = array(
            'message' => 'Categoria inserida com Sucesso',
            'alert-type' => 'success'
        );

        // Retornar para pagina manter marca
        return redirect()->back()->with($notification);
    }

    // Método para editar categoria
    public function CategoryEdit($id)
    {
        // Buscar o Id e atribuit à variável $category pelo find or fail, que:
        // recebe um id e retorna um único modelo. Se não existir nenhum modelo correspondente, ele gera um erro 404
        $category = Category::findOrFail($id);

        // Após buscar a Id e atribuir-à variável $category, retornar para página editar categoria;
        // Cria, também, um array com a marca selecionada pelo ID, essa é a função fo compact('brands'));
        return view('backend.category.category_edit', compact('category'));
    }

    // Método para guardar os dados editados da categoria, POST = (Request $request)
    public function CategoryUpdate(Request $request)
    {
        // Pegar id e atribuir à variável $brand
        $category_id = $request->id;

        /* CASO OPTEMOS EM TRABALHAR COM IMAGENS CATEGORIA, descomentar código comentado

        // Pegar Imagem antiga
        $old_image = $request->old_image;

        // COndição: se deseja atualizar imagem, pega a imagem antiga e atualiza
        if ($request->file('brand_image')) {

            // desvincular imagem
            unlink($old_image);

            // Pegar a imagem Marca e a atribuir a variável $image
            $image = $request->file('brand_image');

            // Criar um Id unica para a imagem e pegar a extensão da imagem
            $generate_name = hexdec(uniqid()) . '.' . $image->getClientOriginalName();

            // Gerar a imagem e redimensionar para 3000px X 300px e depois salvar na pasta brands (marcas)
            Image::make($image)->resize(300, 300)->save('upload/brand_images/' . $generate_name);

            // Salvar a imagem atualizada
            $save_url = 'upload/brand_images/' . $generate_name;
            */

        // ATUALIZAR imagem no BD pelo ID. acha id ou gera mens. erro 404 e, finalmente, atualiza ->update
        Category::findOrFail($category_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_pt' => $request->category_name_pt,
         


            //Slug, strtolower converte string para minusculo, se tiver espaço, substitui com traço e mostra o nome da marca em inglês
            'category_slug_en' => strtolower(str_replace('', '-', $request->category_name_en)),
            'category_slug_pt' => strtolower(str_replace('', '-', $request->category_name_pt)),

            /* CASO OPTEMOS EM TRABALHAR COM IMAGENS CATEGORIA
                // Salva a imagem utilzando a variável $save_url
                'brand_image' => $save_url, */
        ]);

        // Mensagen toaster para mostrar barra verde com a mensagem de sucesso
        $notification = array(
            'message' => 'Categoria atualizada com Sucesso',
            'alert-type' => 'success'
        );

        // Retornar para pagina todas marcas
        return redirect()->route('all.categories')->with($notification);

        /* CASO OPTEMOS EM TRABALHAR COM IMAGENS CATEGORIA
            // Caso contrário, se não desejar atualizar imagem, atualizar somente o inputfield desejado
        } else {


            /* ===== COPIEI E COLEI A LÓGICA Brand::findOrFail =====

            // ATUALIZAR imagem no BD pelo ID. acha id ou gera mens. erro 404 e, finalmente, atualiza ->update
            Category::findOrFail($brand_id)->update([
           'category_name_en' => $request->category_name_en,
           'category_name_pt' => $request->category_name_pt,

           //Slug, strtolower converte string para minusculo, se tiver espaço, substitui com traço e mostra o nome da marca em inglês
           'category_slug_en' => strtolower(str_replace('', '-', $request->category_name_en)),
           'category_slug_pt' => strtolower(str_replace('', '-', $request->category_name_pt)),


            ]);

            // Mensagen toaster para mostrar barra verde com a mensagem de sucesso
            $notification = array(
           'message' => 'Marca atualizada com Sucesso',
           'alert-type' => 'success'
            );

            // Retornar para pagina todas marcas
            return redirect()->route('all.brands')->with($notification);
        } //final else

        */
    }

    // Método para excluir categoria pelo id
    public function CategoryDelete($id)
    {
        // Como ja explicado, é necessário pegar o id Categiri pelo método findOrFail, pega ou 404 error
        $category = Category::findOrFail($id);

        /* CASO OPTEMOS EM TRABALHAR COM IMAGENS CATEGORIA
        // Acessar a table Brand(marcas) e a coluna brand_image
        $image = $category->category_image;

        // Após isso, desvincular image
        unlink($image);

        */

        // deletar após achar categoria pelo Id.
        Category::findOrFail($id)->delete();

        // Mostrar notificação (toaster message) de exclusão bem sucedida.
        $notification = array(
            'message' => 'Categoria Excluída com Sucesso',
            'alert-type' => 'success'
        );
        // Após exclusão, simplesmente retornar.
        return redirect()->back()->with($notification);
    }
}
