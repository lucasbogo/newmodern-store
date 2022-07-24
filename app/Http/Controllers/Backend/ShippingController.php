<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShippingDistrict;
use App\Models\ShippingDivision;
use App\Models\ShippingState;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ShippingController extends Controller
{

    // ============================= MÉTODOS CRUD ESTADO   ============================= //


    // Método View Estado Envio
    public function ShippingDivisionView()
    {
        // Atribuir id da Model Shipping à variável $shipping
        $divisions = ShippingDivision::orderBy('id', 'DESC')->get();
        // Após a atribuição... retorna página view
        return view('backend.shipping.division.division_view', compact('divisions'));
    }

    // Método Guardar Estado Envio
    public function ShippingDivisionStore(Request $request)
    {
        // Validar o nome Estado 
        $request->validate([
            'shipping_division_name' => 'required',

        ]);

        // Inserir o nome Estado
        ShippingDivision::insert([

            'shipping_division_name' => $request->shipping_division_name,
            'created_at' => Carbon::now(),

        ]);

        // Retornar toastr msg após inserção Bairro bem sucedida
        $notification = array(
            'message' => 'Estado Inserido com Sucesso',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    // Método p/ editar Bairro
    public function ShippingDivisionEdit($id)
    {
        // Achar or retornar 404 id shipping division (bairro) e atribuir à variável $divisions
        $divisions = ShippingDivision::findOrFail($id);
        // Após a atribuição, retornar a páginaa view editar Bairro
        return view('backend.shipping.division.division_edit', compact('divisions'));
    }


    // Método p/ guardar dados Bairro editados (copiei e colei a mesma lógica do Shipp...Store)
    public function ShippingDivisionUpdate(Request $request, $id)
    {

        ShippingDivision::findOrFail($id)->update([

            'shipping_division_name' => $request->shipping_division_name,
            'created_at' => Carbon::now(),

        ]);

        // Retornar toastr msg após inserção Bairro bem sucedido
        $notification = array(
            'message' => 'Estado Atualizado com Sucesso',
            'alert-type' => 'success'
        );

        return redirect()->route('division.manage')->with($notification);
    }

    // Método p/ excluir Estado
    public function ShippingDivisionDelete($id)
    {
        // Chamar a model, achar pelo o id e passar a função excluir (delete();)
        ShippingDivision::findOrFail($id)->delete();

        //Após achar pelo id  e excluir utilzando a função, passar a toastr msg na view Bairro...
        $notification = array(
            'message' => 'Estado excluído com Sucesso',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



    // ============================= MÉTODOS CRUD CIDADE   ============================= //



    // Método View Cidade Envio
    public function ShippingDistrictView()
    {
       
        $divisions = ShippingDivision::orderBy('shipping_division_name', 'ASC')->get();
        $districts = ShippingDistrict::with('division')->orderBy('id', 'DESC')->get();
      
        return view('backend.shipping.district.district_view', compact('districts', 'divisions'));
    }

   
    public function ShippingDistrictStore(Request $request)
    {
    
        $request->validate([

            'shipping_district_name' => 'required',
            'shipping_division_id' => 'required',

        ]);

      
        ShippingDistrict::insert([

            'shipping_district_name' => $request->shipping_district_name,
            'shipping_division_id' => $request->shipping_division_id,
            'created_at' => Carbon::now(),

        ]);

     
        $notification = array(
            'message' => 'Cidade Inserida com Sucesso',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

  
    public function ShippingDistrictEdit($id)
    {

        $divisions = ShippingDivision::orderBy('shipping_division_name', 'ASC')->get();
        $districts = ShippingDistrict::findOrFail($id);
        return view('backend.shipping.district.district_edit', compact('divisions', 'districts'));
    }

   
    public function ShippingDistrictUpdate(Request $request, $id)
    {

        ShippingDistrict::findOrFail($id)->update([

            'shipping_division_id' => $request->shipping_division_id,
            'shipping_district_name' => $request->shipping_district_name,
            'created_at' => Carbon::now(),
        ]);

       
        $notification = array(
            'message' => 'Cidade Atualizada com Sucesso',
            'alert-type' => 'success'
        );

        return redirect()->route('district.manage')->with($notification);
    }

 
    public function ShippingDistrictDelete($id)
    {
    
        ShippingDistrict::findOrFail($id)->delete();

       
        $notification = array(
            'message' => 'Cidade excluída com Sucesso',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



    // =========== MÉTODOS CRUD BAIRRO (MUITO TRABALHO, INTEGRAÇÃO CORREIOS CUIDARÁ DISSO)  =========== //


    // public function ShippingStateView()
    // {
     
    //     $divisions = ShippingDivision::orderBy('shipping_division_name', 'ASC')->get(); 
    //     $districts = ShippingDistrict::orderBy('shipping_district_name', 'ASC')->get();
    //     $states = ShippingState::with('division','district')->orderBy('id', 'DESC')->get();
   
    //     return view('backend.shipping.state.state_view', compact('districts', 'divisions','states'));
    // }

   
    // public function ShippingStateStore(Request $request)
    // {
         
    //     $request->validate([

    //         'shipping_division_id' => 'required',
    //         'shipping_district_id' => 'required',
    //         'shipping_state_name'  => 'required',

    //     ]);

        
    //     ShippingState::insert([

    //         'shipping_division_id' => $request->shipping_division_id,
    //         'shipping_district_id' => $request->shipping_district_id,
    //         'shipping_state_name'  => $request->shipping_state_name,
    //         'created_at' => Carbon::now(),

    //     ]);

        
    //     $notification = array(
    //         'message' => 'Estado Inserido com Sucesso',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->back()->with($notification);
    // }


    // public function ShippingStateEdit($id)
    // {

    //     $divisions = ShippingDivision::orderBy('shipping_division_name', 'ASC')->get();
    //     $districts = ShippingDistrict::orderBy('shipping_district_name', 'ASC')->get();
    //     $states = ShippingState::findOrFail($id);

    //     return view('backend.shipping.state.state_edit', compact('divisions', 'districts', 'states'));
    // }


    // public function ShippingStateUpdate(Request $request, $id)
    // {

    //     ShippingState::findOrFail($id)->update([

    //         'shipping_division_id' => $request->shipping_division_id,
    //         'shipping_district_id' => $request->shipping_district_id,
    //         'shipping_state_name'  => $request->shipping_state_name,
    //         'created_at' => Carbon::now(),
    //     ]);

    //     $notification = array(
    //         'message' => 'Estado Atualizado com Sucesso',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->route('state.manage')->with($notification);
    // }


    // public function ShippingStateDelete($id)
    // {
 
    //     ShippingState::findOrFail($id)->delete();
 
    //     $notification = array(
    //         'message' => 'Estado excluído com Sucesso',
    //         'alert-type' => 'success'
    //     );
    //     return redirect()->back()->with($notification);
    // }
}
