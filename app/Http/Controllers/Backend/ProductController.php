<?php

// Importar todas as models

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Images;
use App\Models\Product;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    // MÉTODO P/ ADICIONAR PRODUTO
    public function AddProduct()
    {
        // Pegar todos os dados da Model Category
        $categories = Category::latest()->get();

        // Pegar todos os dados da Model Brand (marca)
        $brands = Brand::latest()->get();

        // Após pegar os dados das Models pelo compact(), retornar p a página em Backend/products.product.add
        return view('backend.product.product_add', compact('categories', 'brands'));
    }

    // MÉTODO P/ SALVAR O PRODUTO ADICIONADO
    public function StoreProduct(Request $request)
    {

        // Código Image Intervention Package for PHP
        $image = $request->file('product_thumbnail');
        $generate_name = hexdec(uniqid()) . '.' . $image->getClientOriginalName();
        Image::make($image)->resize(917, 1000)->save('upload/products/thumbnails/' . $generate_name);
        $save_url = 'upload/products/thumbnails/' . $generate_name;

        // Inserir todos os dados Models Produto; atribuir-os à variável product_id
        $product_id = Product::insertGetId([

            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_pt' => $request->product_name_pt,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_pt' => strtolower(str_replace(' ', '-', $request->product_name_pt)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_pt' => $request->product_tags_pt,
            'product_size_en' => $request->product_size_en,
            'product_size_pt' => $request->product_size_pt,
            'product_color_en' => $request->product_color_en,
            'product_color_pt' => $request->product_color_pt,
            'product_selling_price' => $request->product_selling_price,
            'product_discount_price' => $request->product_discount_price,
            'product_short_description_en' => $request->product_short_description_en,
            'product_short_description_pt' => $request->product_short_description_pt,
            'product_long_description_en' => $request->product_long_description_en,
            'product_long_description_pt' => $request->product_long_description_pt,

            'product_hot_deals' => $request->product_hot_deals,
            'product_featured' => $request->product_featured,
            'product_special_deals' => $request->product_special_deals,
            'product_hot_deals' => $request->product_hot_deals,

            'product_thumbnail' => $save_url,
            'product_status' => 1,
            'created_at' => Carbon::now(), // Carbon = extensão DateTime

        ]);


        // Função p/ gerar e salvar imagens produto
        $images = $request->file('images');
        // LOOP CONDICIONAL donominar como $image todo arquivo images declarado como variável $images
        foreach ($images as $image) {
            //gerar id única para a imagem
            $generate_image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalName();
            Image::make($image)->resize(917, 1000)->save('upload/products/images/' . $generate_image_name);
            $save_url_images = 'upload/products/images/' . $generate_image_name;

            Images::insert([

                // Para não ter que declarar todos os campos do BD novamente, eu apenas atribui-os à variável product_id
                'product_id' => $product_id,
                'photo_name' => $save_url_images,
                'created_at' => Carbon::now(), // Carbon = extensão DateTime

            ]);
        }

        // Mensagen toaster para mostrar barra verde com a mensagem de sucesso
        $notification = array(
            'message' => 'Produto inserido com Sucesso',
            'alert-type' => 'success'
        );

        // Ao inserir produto com sucesso, retorna para a pagina gerenciar produto com o produto recém cadastrado
        return redirect()->route('product.manage')->with($notification);
    }

    // MÉTODO P/ GERENCIAR PRODUTO
    public function ManageProduct()
    {
        // Pegar os dados mais atuais da table Product pela Model e atribuir à variável $products
        $products = Product::latest()->get();

        // Após pegar os dados mais atuais, retornar para a página view com os dados compactados
        return view('backend.product.product_view', compact('products'));
    }

    // MÉTODO P/ EDITAR PRODUTO
    public function EditProduct($id)
    {
        // Pegar os dados da images produto
        // CONDIÇÃO WHERE: quando o id produto combinar com a id requisitada (edit), então salvar dado na variável $multi_images pela função get()
        $images = Images::where('product_id', $id)->get();

        // Pegar os dados MARCA mais recentes e atribui-los à variável $brands pela função get()
        $brands = Brand::latest()->get();

        // Pegar os dados CATEGORIA mais recentes e atribui-los à variável $categories pela função get()
        $categories = Category::latest()->get();

        // Pegar os dados SUBCATEGORIA mais recentes e atribui-los à variável $subcategories pela função get()
        $subcategories = SubCategory::latest()->get();

        // Pegar os dados SUBSUBCATEGORIA mais recentes ...
        $subsubcategories = SubSubCategory::latest()->get();

        // Buscar o Id e atribuir à variável $products pelo find or fail, que:
        // recebe um id e retorna um único modelo. Se não existir nenhum modelo correspondente, ele gera um erro 404
        $products = Product::findOrFail($id);

        // Após pegar os dados das Models e compactar-os, redirecionar o Admin p/ a página editar produtos
        return view('backend.product.product_edit', compact('brands', 'categories', 'subcategories', 'subsubcategories', 'products', 'images'));
    }

    // MÉTODO P/ GUARDAR OS DADOS EDITADOS DO PRODUTO NO PAINEL ADMIN | POST = (Request $request)
    public function UpdateProduct(Request $request)
    {
        // Pegar id e atribuir à variável $product_id e enviar a request->id no hidden input field
        $product_id = $request->id;

        // Atualizar dados no BD com a função update
        Product::findOrFail($product_id)->update([


            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_pt' => $request->product_name_pt,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_pt' => strtolower(str_replace(' ', '-', $request->product_name_pt)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_pt' => $request->product_tags_pt,
            'product_size_en' => $request->product_size_en,
            'product_size_pt' => $request->product_size_pt,
            'product_color_en' => $request->product_color_en,
            'product_color_pt' => $request->product_color_pt,
            'product_selling_price' => $request->product_selling_price,
            'product_discount_price' => $request->product_discount_price,
            'product_short_description_en' => $request->product_short_description_en,
            'product_short_description_pt' => $request->product_short_description_pt,
            'product_long_description_en' => $request->product_long_description_en,
            'product_long_description_pt' => $request->product_long_description_pt,

            'product_hot_deals' => $request->product_hot_deals,
            'product_featured' => $request->product_featured,
            'product_special_deals' => $request->product_special_deals,
            'product_special_offer' => $request->product_special_offer,

            'product_status' => 0,
            'created_at' => Carbon::now(),

        ]);

        // Mensagen toaster para mostrar barra verde com a mensagem de sucesso
        $notification = array(
            'message' => 'Dados do produto atualizado com Sucesso',
            'alert-type' => 'success'
        );

        // Retornar para pagina todas marcas
        return redirect()->route('product.manage')->with($notification);
    }

    // MÉTODO P/ ATUALIZAR AS IMAGENS PRODUTOS NO PAINEL ADMIN
    public function UpdateProductImage(Request $request)
    {
        $product_images = $request->images;

        // Loop condicional
        foreach ($product_images as $id => $image) {

            // Pegar imagem pelo id e attribuir à varável $delete_image
            $delete_image = Images::findOrFail($id);

            // Desvincular a imagem pela função unlink
            unlink($delete_image->photo_name);

            // Mesma lógica utilizada no método StoreProduct
            $generate_image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalName();
            Image::make($image)->resize(917, 1000)->save('upload/products/images/' . $generate_image_name);
            $image_url = 'upload/products/images/' . $generate_image_name;

            // Atualizar a path imagem mudando o nome da foto e o timestamp pelo Carbon que é um extensão para DateTime
            Images::where('id', $id)->update([

                'photo_name' => $image_url,
                'updated_at' => Carbon::now() // Carbon = extensão DateTime


            ]);
        }

        // Mensagen toaster para mostrar barra verde com a mensagem de sucesso
        $notification = array(
            'message' => 'Imagem(ns) produto(s) atualizado(s) com Sucesso',
            'alert-type' => 'success'
        );

        // Retornar para pagina todas marcas
        return redirect()->back()->with($notification);
    }

    // MÉTODO P/ ATUALIZAR OS THUMBNAILS PRODUTOS NO PAINEL ADMIN
    public function UpdateProductThumbnail(Request $request)
    {
        $product_thumbnails = $request->id;
        $thumbnail_image = $request->old_image;
        unlink($thumbnail_image);

        // Código Image Intervention Package for PHP
        $image = $request->file('product_thumbnail');
        $generate_name = hexdec(uniqid()) . '.' . $image->getClientOriginalName();
        Image::make($image)->resize(917, 1000)->save('upload/products/thumbnails/' . $generate_name);
        $save_url = 'upload/products/thumbnails/' . $generate_name;

        // Mesma lógica utilizada no método StoreProduct
        Product::findOrFail($product_thumbnails)->update([
            'product_thumbnail' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

        // Mensagen toaster para mostrar barra verde com a mensagem de sucesso
        $notification = array(
            'message' => 'Thumbnail atualizado com Sucesso',
            'alert-type' => 'success'
        );

        // Retornar para pagina todas marcas
        return redirect()->back()->with($notification);
    }

    // Método para excluir imagem produto pelo Id
    public function DeleteProductImage($id)
    {
        // Como ja explicado, é necessário pegar o id na Model Images pelo método findOrFail, pega ou 404 error
        $old_product_image = Images::findOrFail($id);

        unlink($old_product_image->photo_name);

        // após achar imagem pelo Id, deler pela função delete
        Images::findOrFail($id)->delete();

        // Mostrar notificação (toaster message) de exclusão bem sucedida.
        $notification = array(
            'message' => 'Imagem Excluída com Sucesso',
            'alert-type' => 'success'
        );
        // Após exclusão, simplesmente retornar.
        return redirect()->back()->with($notification);
    }

    // Método para desativar Produto pelo ID
    public function InactivateProduct($id)
    {
        // Lógica simples: achar o produto pelo ID, chamar a função update e alterar o status para zero (inativo)
        Product::findOrFail($id)->update(['product_status' => 0]);

        // Mostrar notificação (toaster message) de desativação bem sucedida.
        $notification = array(
            'message' => 'Produto Desativado com Sucesso',
            'alert-type' => 'success'
        );
        // Após exclusão, simplesmente retornar.
        return redirect()->back()->with($notification);
    }

    // Método p/ ativar Produto pelo ID
    public function ActivateProduct($id)
    {
        // Lógica simples: achar o produto pelo ID, chamar a função update e alterar o status para um (ativo)
        Product::findOrFail($id)->update(['product_status' => 1]);

        // Mostrar notificação (toaster message) de ativação bem sucedida.
        $notification = array(
            'message' => 'Produto Ativado com Sucesso',
            'alert-type' => 'success'
        );
        // Após exclusão, simplesmente retornar.
        return redirect()->back()->with($notification);
    }

    // Método p/ Deletar Produto pelo ID
    public function DeleteProduct($id)
    {
        // Pegar os dados da classe produto e excluir thumbnail
        $product = Product::findOrFail($id);
        unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();

        // Pegar os dados da classe Images atribuidos a fk_produtos e excluir.
        $images = Images::where('product_id', $id)->get();
        foreach ($images as $image) {
            unlink($image->photo_name);
            Images::where('product_id', $id)->delete();
        }

        // Mostrar notificação (toaster message) de ativação bem sucedida.
        $notification = array(
            'message' => 'Produto Excluído com Sucesso',
            'alert-type' => 'success'
        );

        // Após exclusão, simplesmente retornar.
        return redirect()->back()->with($notification);
    }
}
