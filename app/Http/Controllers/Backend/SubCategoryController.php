<?php

/* IMPORTAR MODELS SUBCATEGORY e MODELS CATEGORY DEVIDO A FK CATEGORY */
/* COPIE E COLEI A MESMA LÓGICA UTILIZADA NA CRUD CATEGORY */

namespace App\Http\Controllers\Backend;

use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        // Pegar os dados categoria ordenado em ordem crescente pelo nome em inglês
        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        // Pegar os dados mais atuais da table brands(categories) pela Model e atribuir à variável $category
        $subcategories = SubCategory::latest()->get();

        // Retorna a view, localizada em resources/views/backend/category/subcategory_view.blade.php com os dados das variáveis sub e categories
        return view('backend.category.subcategory_view', compact('subcategories', 'categories'));
    }

    // Método p/ guardar dados categoria no BD - a rota deve ser POST no web.php
    public function SubCategoryStore(Request $request)
    {
        $request->validate(
            [
                'category_id' => 'required',
                'subcategory_name_en' => 'required',
                'subcategory_name_pt' => 'required',
            ],


            // Customizar as mensagens de erro
            [
                'category_id.required' => 'Selecione qualquer opção',
                'subcategory_name_en.required' => 'Inserir Sub-Categoria em Inglês',

            ]
        );

        // Salvar imagem no BD
        SubCategory::insert([

            // FK category   
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_pt' => $request->subcategory_name_pt,

            //Slug: deixar o BD mais organizado; strtolower converte string para minusculo, se tiver espaço, substitui com traço
            'subcategory_slug_en' => strtolower(str_replace('', '-', $request->subcategory_name_en)),
            'subcategory_slug_pt' => strtolower(str_replace('', '-', $request->subcategory_name_pt)),

        ]);

        // Mensagen toaster para mostrar barra verde com a mensaagem de sucesso
        $notification = array(
            'message' => 'Sub-Categoria inserida com Sucesso',
            'alert-type' => 'success'
        );

        // Retornar para pagina manter marca
        return redirect()->back()->with($notification);
    }

    // Método para editar categoria
    public function SubCategoryEdit($id)
    {
        // Pegar os dados categoria ordenado em ordem crescente pelo nome em inglês
        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        // Buscar o Id e atribuir à variável $subcategory pelo find or fail, que:
        // recebe um id e retorna um único modelo. Se não existir nenhum modelo correspondente, ele gera um erro 404
        $subcategory = SubCategory::findOrFail($id);

        // Após buscar a Id e atribuir-à variável $subcategory, retornar para página editar subcategorias;
        // Cria, também, um array com a marca selecionada pelo ID, essa é a função fo compact('brands'));
        return view('backend.category.subcategory_edit', compact('subcategory', 'categories'));
    }

    // Método para guardar os dados editados da subcategoria, POST = (Request $request)
    public function SubCategoryUpdate(Request $request)
    {
        // Pegar id e atribuir à variável $brand
        $subcategory_id = $request->id;

        // Atualizar dados no BD
        SubCategory::findOrFail($subcategory_id)->update([

            // FK category   
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_pt' => $request->subcategory_name_pt,

            //Slug: deixar o BD mais organizado; strtolower converte string para minusculo, se tiver espaço, substitui com traço
            'subcategory_slug_en' => strtolower(str_replace('', '-', $request->subcategory_name_en)),
            'subcategory_slug_pt' => strtolower(str_replace('', '-', $request->subcategory_name_pt)),

        ]);


        // Mensagen toaster para mostrar barra verde com a mensagem de sucesso
        $notification = array(
            'message' => 'Sub-Categoria atualizada com Sucesso',
            'alert-type' => 'success'
        );

        // Retornar para pagina todas marcas
        return redirect()->route('all.subcategories')->with($notification);
    }

    // Método para excluir categoria pelo id
    public function SubCategoryDelete($id)
    {
        
        // deletar após achar categoria pelo Id.
        SubCategory::findOrFail($id)->delete();

        // Mostrar notificação (toaster message) de exclusão bem sucedida.
        $notification = array(
            'message' => 'Sub-Categoria Excluída com Sucesso',
            'alert-type' => 'success'
        );
        // Após exclusão, simplesmente retornar.
        return redirect()->back()->with($notification);
    }
}
