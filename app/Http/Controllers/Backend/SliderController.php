<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Images;
use App\Models\Product;
use App\Models\Slider;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    // MÉTODO P/ ADICIONAR PRODUTO
    public function SliderView()
    {
        // Pegar todos os dados da Model Category
        $sliders = Slider::latest()->get();

        // Após pegar os dados das Models pelo compact(), retornar p a página em Backend/slider.slider_view
        return view('backend.slider.slider_view', compact('sliders'));
    }


    // Método para guardar os dados da marca,
    // Como é um método POST, é nessário chamar Request $request no método.
    public function SliderStore(Request $request)
    {
        // Validar os input fields marcar ingles, marca ptbr e a imagem da marca.
        $request->validate(
            [
                'slider_image' => 'required',
            ],

            // Customizar as mensagens de erro
            [
                'brand_image.required' => 'Foto do Slider é obrigatório',
            ]
        );

        // Pegar a imagem Marca e a atribuir a variável $image
        $image = $request->file('slider_image');
        // Criar um Id unica para a imagem e pegar a extensão da imagem
        $generate_name = hexdec(uniqid()) . '.' . $image->getClientOriginalName();
        // Gerar a imagem e redimensionar para 3000px X 300px e depois salvar na pasta brands (marcas)
        Image::make($image)->resize(870, 370)->save('upload/slider_images/' . $generate_name);
        // Salvar a imagem atualizada
        $save_url = 'upload/slider_images/' . $generate_name;

        // Salvar imagem no BD
        Slider::insert([

            'slider_title' => $request->slider_title,
            'slider_description' => $request->slider_description,
            'slider_image' => $save_url,
        ]);

        // Mensagen toaster para mostrar barra verde com a mensaagem de sucesso
        $notification = array(
            'message' => 'Slider inserido com Sucesso',
            'alert-type' => 'success'
        );

        // Retornar para pagina manter slider
        return redirect()->back()->with($notification);
    }

    // MÉTODO P/ EDITAR SLIDER
    public function SliderEdit($id)
    {
        // Buscar o Id e atribuit à variável $brand pelo find or fail, que:
        // recebe um id e retorna um único modelo. Se não existir nenhum modelo correspondente, ele gera um erro 404
        $sliders = Slider::findOrFail($id);

        // Após buscar a Id e atribuir-à variável $sliders, retornar para página edit;
        // Cria, também, um array com o slider selecionada e comppactado pelo ID, essa é a função do compact('sliders'));
        return view('backend.slider.slider_edit', compact('sliders'));
    }


    // Método para guardar as edições Marcas (nome e imagem edit); Como é POST, é necessário 'Request $request'
    public function SliderUpdate(Request $request)
    {

        // Pegar id e atribuir à variável $brand
        $slider_id = $request->id;

        // Pegar Imagem antiga
        $old_image = $request->old_image;

        // COndição: se deseja atualizar imagem, pega a imagem antiga e atualiza
        if ($request->file('slider_image')) {

            // desvincular imagem
            unlink($old_image);


            // Pegar a imagem Marca e a atribuir a variável $image
            $image = $request->file('slider_image');

            // Criar um Id unica para a imagem e pegar a extensão da imagem
            $generate_name = hexdec(uniqid()) . '.' . $image->getClientOriginalName();

            // Gerar a imagem e redimensionar para e depois salvar na pasta slider_imges
            Image::make($image)->resize(87, 370)->save('upload/slider_images/' . $generate_name);

            // Salvar a imagem atualizada
            $save_url = 'upload/slider_images/' . $generate_name;

            // ATUALIZAR imagem no BD pelo ID. acha id ou gera mens. erro 404 e, finalmente, atualiza ->update
            Slider::findOrFail($slider_id)->update([
                'slider_title' => $request->slider_title,
                'slider_description' => $request->slider_description,

                // Salva a imagem utilzando a variável $save_url
                'slider_image' => $save_url,
            ]);

            // Mensagen toaster para mostrar barra verde com a mensagem de sucesso
            $notification = array(
                'message' => 'Slider atualizado com Sucesso',
                'alert-type' => 'success'
            );

            // Retornar para pagina todas marcas
            return redirect()->route('all.sliders')->with($notification);

            // Caso contrário, se não desejar atualizar imagem, atualizar somente o inputfield desejado
        } else {



            // ATUALIZAR imagem no BD pelo ID. acha id ou gera mens. erro 404 e, finalmente, atualiza ->update
            Slider::findOrFail($slider_id)->update([
                'slider_title' => $request->slider_title,
                'slider_description' => $request->slider_description,


            ]);

            // Mensagen toaster para mostrar barra verde com a mensagem de sucesso
            $notification = array(
                'message' => 'Slider atualizado com Sucesso',
                'alert-type' => 'success'
            );

            // Retornar para pagina todos sliders
            return redirect()->route('all.sliders')->with($notification);
        } //final else       

    }

    // Método para Deletar Marca; como foi definido na rota, e nessário pegar o id da Marca. 
    public function SliderDelete($id)
    {
        // Como ja explicado, é necessário pegar o id Marca pelo método findOrFail, pega ou 404 error
        $slider = Slider::findOrFail($id);

        // Acessar a table sliders e a coluna slider_image
        $image = $slider->slider_image;

        // Após isso, desvincular image
        unlink($image);

        // Finalmente, deletar pela função delete().
        Slider::findOrFail($id)->delete();

        // Mostrar notificação (toaster message) de exclusão bem sucedida.
        $notification = array(
            'message' => 'Slider Deletado com Sucesso',
            'alert-type' => 'success'
        );
        // Após exclusão, simplesmente retornar.
        return redirect()->back()->with($notification);
    }


    public function InactivateSlider($id){
    	Slider::findOrFail($id)->update(['slider_status' => 0]);

    	$notification = array(
			'message' => 'Slider Desativado com Sucesso',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } 


    public function ActivateSlider($id){
    	Slider::findOrFail($id)->update(['slider_status' => 1]);

    	$notification = array(
			'message' => 'Slider Ativado com Sucesso',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } 
}
