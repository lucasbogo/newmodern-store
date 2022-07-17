<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ShippingController extends Controller
{
    // Método View Cidade Envio
    public function ShippingDivisionView()
    {
        // Atribuir id da Model Shipping à variável $shipping
        $divisions = Shipping::orderBy('id', 'DESC')->get();
        // Após a atribuição... retorna página view
        return view('backend.shipping.division.division_view', compact('divisions'));
    }

    // Método Guardar Cidade Envio
    public function ShippingDivisionStore(Request $request)
    {
        // Validar o nome Cidade 
        $request->validate([
            'shipping_division_name' => 'required',

        ]);

        // Inserir o nome Cidade
        Shipping::insert([

            'shipping_division_name' => $request->shipping_division_name,
            'created_at' => Carbon::now(),

        ]);

        // Retornar toastr msg após inserção Cidade bem sucedida
        $notification = array(
            'message' => 'Cidade Inserido com Sucesso',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // Método p/ editar Cidade
    public function ShippingDivisionEdit($id)
    {
        // Achar or retornar 404 id shipping division (cidade) e atribuir à variável $divisions
        $divisions = Shipping::findOrFail($id);
        // Após a atribuição, retornar a páginaa view editar Cidade
        return view('backend.shipping.division.division_edit', compact('divisions'));
    }

    // Método p/ guardar dados Cidade editados (copiei e colei a mesma lógica do Shipp...Store)
    public function ShippingDivisionUpdate(Request $request)
    {
        // Validar o nome Cidade 
        $request->validate([
            'shipping_division_name' => 'required',

        ]);

        // Inserir o nome Cidade
        Shipping::insert([

            'shipping_division_name' => $request->shipping_division_name,
            'created_at' => Carbon::now(),

        ]);

        // Retornar toastr msg após inserção Cidade bem sucedida
        $notification = array(
            'message' => 'Cidade Atualizado com Sucesso',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
