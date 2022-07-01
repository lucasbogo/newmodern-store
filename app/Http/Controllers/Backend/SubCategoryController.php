<?php

/* IMPORTAR MODELS SUBCATEGORY */
/* COPIE E COLEI A MESMA LÓGICA UTILIZADA NA CRUD CATEGORY */

namespace App\Http\Controllers\Backend;

use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        // Pegar os dados mais atuais da table brands(categories) pela Model e atribuir à variável $category
        $subcategories = SubCategory::latest()->get();
        // Retorna a view, localizada em resources/views/backend/subcategory/subcategory_view.blade.php
        return view('backend.category.subcategory_view', compact('subcategories'));
    }

    // Método p/ guardar dados categoria no BD - a rota deve ser POST no web.php
    public function SubCategoryStore(Request $request)
    {
        $request->validate(
            [
                'subcategory_name_en' => 'required',
                'subcategory_name_pt' => 'required',


            ],

            // Customizar as mensagens de erro
            [
                'category_name_en.required' => 'Inserir Categoria em Inglês',
                'category_name_pt.required' => 'Inserir Categoria em Português',
                'category_icon.required' => 'Ícone é obrigatório',
            ]
        );

        // Salvar imagem no BD
        SubCategory::insert([
            'subcategory_name_en' => $request->category_name_en,
            'subcategory_name_pt' => $request->category_name_pt,


            //Slug, strtolower converte string para minusculo, se tiver espaço, substitui com traço e mostra o nome da marca em inglês
            'subcategory_slug_en' => strtolower(str_replace('', '-', $request->subcategory_name_en)),
            'subcategory_slug_pt' => strtolower(str_replace('', '-', $request->subcategory_name_pt)),

        ]);

        // Mensagen toaster para mostrar barra verde com a mensaagem de sucesso
        $notification = array(
            'message' => 'Categoria inserida com Sucesso',
            'alert-type' => 'success'
        );

        // Retornar para pagina manter marca
        return redirect()->back()->with($notification);
    }
}
