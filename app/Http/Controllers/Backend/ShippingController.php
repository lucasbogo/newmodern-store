<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShippingDistrict;
use App\Models\ShippingDivision;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ShippingController extends Controller
{

    // ============================= MÉTODOS CRUD BAIRRO   ============================= //


    // Método View Bairro Envio
    public function ShippingDivisionView()
    {
        // Atribuir id da Model Shipping à variável $shipping
        $divisions = ShippingDivision::orderBy('id', 'DESC')->get();
        // Após a atribuição... retorna página view
        return view('backend.shipping.division.division_view', compact('divisions'));
    }

    // Método Guardar Bairro Envio
    public function ShippingDivisionStore(Request $request)
    {
        // Validar o nome Cidade 
        $request->validate([
            'shipping_division_name' => 'required',

        ]);

        // Inserir o nome Bairro
        ShippingDivision::insert([

            'shipping_division_name' => $request->shipping_division_name,
            'created_at' => Carbon::now(),

        ]);

        // Retornar toastr msg após inserção Bairro bem sucedida
        $notification = array(
            'message' => 'Bairro Inserido com Sucesso',
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
            'message' => 'Bairro Atualizado com Sucesso',
            'alert-type' => 'success'
        );

        return redirect()->route('division.manage')->with($notification);
    }

    // Método p/ excluir Bairro
    public function ShippingDivisionDelete($id)
    {
        // Chamar a model, achar pelo o id e passar a função excluir (delete();)
        ShippingDivision::findOrFail($id)->delete();

        //Após achar pelo id  e excluir utilzando a função, passar a toastr msg na view Bairro...
        $notification = array(
            'message' => 'Bairro excluído com Sucesso',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



    // ============================= MÉTODOS CRUD CIDADE   ============================= //



    // Método View Cidade Envio
    public function ShippingDistrictView()
    {
        // Atribuir id da Model Shipping à variável $shipping
        $divisions = ShippingDivision::orderBy('shipping_division_name', 'ASC')->get();
        // Atribuir id da Model Shipping à variável $shipping
        $districts = ShippingDistrict::with('division')->orderBy('id', 'DESC')->get();
        // Após a atribuição... retorna página view
        return view('backend.shipping.district.district_view', compact('districts', 'divisions'));
    }

    // Método Guardar Cidade Envio
    public function ShippingDistrictStore(Request $request)
    {
        // Validar o nome Cidade 
        $request->validate([

            'shipping_district_name' => 'required',
            'shipping_division_id' => 'required',

        ]);

        // Inserir o nome Cidade
        ShippingDistrict::insert([

            'shipping_district_name' => $request->shipping_district_name,
            'shipping_division_id' => $request->shipping_division_id,
            'created_at' => Carbon::now(),

        ]);

        // Retornar toastr msg após inserção Cidade bem sucedida
        $notification = array(
            'message' => 'Cidade Inserida com Sucesso',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // Método p/ editar Cidade
    public function ShippingDistrictEdit($id)
    {

        $divisions = ShippingDivision::orderBy('shipping_division_name', 'ASC')->get();
        $districts = ShippingDistrict::findOrFail($id);
        return view('backend.shipping.district.district_edit', compact('divisions', 'districts'));
    }

    // Método p/ guardar dados Cidade editados (copiei e colei a mesma lógica do Shipp...Store)
    public function ShippingDistrictUpdate(Request $request, $id)
    {

        ShippingDistrict::findOrFail($id)->update([

            'shipping_division_id' => $request->shipping_division_id,
            'shipping_district_name' => $request->shipping_district_name,
            'created_at' => Carbon::now(),
        ]);

        // Retornar toastr msg após inserção Bairro bem sucedida
        $notification = array(
            'message' => 'Cidade Atualizada com Sucesso',
            'alert-type' => 'success'
        );

        return redirect()->route('district.manage')->with($notification);
    }

    // Método p/ excluir Bairro
    public function ShippingDistrictDelete($id)
    {
        // Chamar a model, achar pelo o id e passar a função excluir (delete();)
        ShippingDistrict::findOrFail($id)->delete();

        //Após achar pelo id  e excluir utilzando a função, passar a toastr msg na view Bairro...
        $notification = array(
            'message' => 'Cidade excluída com Sucesso',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



    // ============================= MÉTODOS CRUD ESTADO   ============================= //
}
