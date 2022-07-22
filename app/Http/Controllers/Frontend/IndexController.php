<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Images;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Brand;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class IndexController extends Controller
{
    // [HOME]
    public function index()
    {
        // 'Baixar' as informações admin backend categorias no menu vertical esquerdo da HOME
        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        // 'Baixar' os dados admin backend sliders no SliderHome e mostrar apenas 3 sliders.
        $sliders = Slider::where('slider_status', 1)->orderBy('id', 'DESC')->limit(3)->get();

        // 'Baixar' os dados admin backend products no NovosProdutosHome se ativar o produto no painel, então ele irá aparecer no front Novos Produtos
        $products = Product::where('product_status', 1)->orderBy('id', 'DESC')->get();

        // 'Baixar' os dados admin backend products no FeaturedProductsHome  se ativar o produto no painel, então ele irá aparecer no front Featured Products
        $featured = Product::where('product_featured', 1)->orderBy('id', 'DESC')->get();

        // 'Baixar' os dados admin backend products no HotDealsProductsHome  se ativar o produto no painel, então ele irá aparecer no front Hot Deals Products. Só deve aparece produtos com o campo desconto.
        $hotdeals = Product::where('product_hot_deals', 1)->where('product_discount_price', '!=', null)->orderBy('id', 'DESC')->limit(6)->get();

        // 'Baixar' os dados admin backend products no SpecialDealsProductsHome  se ativar o produto no painel, então ele irá aparecer no front Special Deals Products
        $specialdeals = Product::where('product_special_deals', 1)->orderBy('id', 'DESC')->limit(3)->get();

        // 'Baixar' os dados admin backend products no SpecialDealsProductsHome  se ativar o produto no painel, então ele irá aparecer no front Special Deals Products
        $specialoffers = Product::where('product_special_offer', 1)->orderBy('id', 'DESC')->limit(4)->get();

        // Função nativa do Laravel skip(), serve p/ pular categorias e mostrar, dinamicamente, todos os produtos da categoria desejada.
        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('product_status', 1)->where('category_id', $skip_category_0->id)->orderBy('id', 'DESC')->get();

        $skip_category_1 = Category::skip(1)->first();
        $skip_product_1 = Product::where('product_status', 1)->where('category_id', $skip_category_1->id)->orderBy('id', 'DESC')->get();

        $skip_brand_1 = Brand::skip(1)->first();
        $skip_brand_product_1 = Product::where('product_status', 1)->where('brand_id', $skip_brand_1->id)->orderBy('id', 'DESC')->get();


        return view('frontend.index', compact(
            'categories',
            'sliders',
            'products',
            'featured',
            'hotdeals',
            'specialdeals',
            'specialoffers',
            'skip_category_0',
            'skip_product_0',
            'skip_category_1',
            'skip_product_1',
            'skip_brand_1',
            'skip_brand_product_1'


        ));
    }

    // [LOGOUT]
    public function UserLogout()
    {

        // Auth::logout acessa o método logout default do jetstream
        //Auth::logout();
        // Estava com erros ao realizar logout, isso ajudou a resolver...
        auth()->guard('web')->logout();

        // Após logout, o usuario é redirecionado para a pagina login
        return Redirect()->route('index');
    }

    //  [PROFILE]
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
            @unlink(public_path('upload/user_images/' . $data->profile_photo_path));
            $filename = date('Ymdhi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        //Toaster message
        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('index')->with($notification);
    }

    // Método para atualizar senha usuario
    public function UserChangePassword()
    {

        return view('frontend.profile.change_password');
    }

    // Método para atualizar e guardar a senha usuario ao mudar senha - Mesma lógica do Admin.
    public function  UserPasswordUpdate(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        } else {

            return redirect()->back();
        }
    }

    // Método redirecionamento para página detalhes produto
    public function ProductDetails($id, $slug)
    {
        // Achar o produto pelo o ID
        $product = Product::findOrFail($id);

        // Achar o produto pela Cor Inglês
        $color = $product->product_color_en;
        $product_color_en = explode(',', $color);

        // Achar o produto pela Cor PTBR
        $cor = $product->product_color_pt;
        $product_color_pt = explode(',', $cor);

        // Achar o produto pelo tamanho Inglês
        $size = $product->product_size_en;
        $product_size_en = explode(',', $size);

        // Achar o produto pelo tamanho Inglês
        $tamanho = $product->product_size_pt;
        $product_size_pt = explode(',', $tamanho);

        // 'Baixar' as imagens da Model Images quando o id do produto combinar, apóis isso, pegar pela função get()
        $images = Images::where('product_id', $id)->get();

        // Pegar a ID Categoria relacionado com o produto clickado pelo cliente
        $category_id = $product->category_id;

        // Mostrar produtos relacionados na página descrição produto (produtos da mesma categoria). Codição, se o produto 
        // ja estiver selecionado, ele não deve aparecer no campo produto relacionado ->where('id', '!=', $id)
        $related = Product::where('category_id', $category_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->get();

        // Retornar view detalhes do produto com os dados produto compactado
        return view('frontend.product.product_details', compact('product', 'images', 'product_color_en', 'product_color_pt', 'product_size_en', 'product_size_pt', 'related'));
    }

    // Método Tags Dinâmicos Produto IMPLEMENTAR FUTURAMENTE
    public function ProductTags($tag)
    {
        // 'Pegar' 'Baixar' (verificar) o produto ativo
        $products = Product::where('product_status', 1)->where('product_tags_en', $tag)->where('product_tags_pt', $tag)->orderBy('id', 'DESC')->paginate(3);

        //'Baixar' as informações admin backend categorias no menu vertical esquerdo da HOME
        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        // retornar view tags com a variável compactada
        return view('frontend.tags.tags_view', compact('products', 'categories'));
    }

    // Método redirecionamento para página detalhes produto
    public function ProductSubDetails($subcategory_id, $slug)
    {
        // 'Pegar' 'Baixar' (verificar) o produto ativo
        $products = Product::where('product_status', 1)->where('subcategory_id', $subcategory_id)->orderBy('id', 'DESC')->paginate(4);

        //'Baixar' as informações admin backend categorias no menu vertical esquerdo da HOME
        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        // retornar view tags com a variável compactada
        return view('frontend.product.subcategory_view', compact('products', 'categories'));
    }

    // Método redirecionamento para página detalhes produto
    public function ProductSubSubDetails($subsubcategory_id, $slug)
    {
        // 'Pegar' 'Baixar' (verificar) o produto ativo
        $products = Product::where('product_status', 1)->where('subsubcategory_id', $subsubcategory_id)->orderBy('id', 'DESC')->paginate(4);

        //'Baixar' as informações admin backend categorias no menu vertical esquerdo da HOME
        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        // retornar view tags com a variável compactada
        return view('frontend.product.subsubcategory_view', compact('products', 'categories'));
    }

    // Método p/ pegar os dados do produto em json e passar p/ a bootstrap modal utilizando AJAX
    public function ProductViewAjax($id)
    {
        // Achar o produto pelo o ID
        $product = Product::with('category', 'brand')->findOrFail($id);

        $color = $product->product_color_en;
        $product_color = explode(',', $color);

        $size = $product->product_size_en;
        $product_size = explode(',', $size);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,

        ));
    }
}
