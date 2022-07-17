<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ShippingController extends Controller
{
    // Método View Divisão Envio
    public function ShippingDivisionView()
    {
        // Atribuir id da Model Shipping à variável $shipping
        $divisions = Shipping::orderBy('id', 'DESC')->get();
        // Após a atribuição... retorna página view
        return view('backend.shipping.division.division_view', compact('divisions'));
    }

    // Método Guardar Divisão Envio
    public function ShippingDivisionStore(Request $request)
    {
        // Validar o nome divisão 
        $request->validate([
            'shipping_division_name' => 'required',

        ]);

        // Inserir o nome divisão
        Shipping::insert([

            'shipping_division_name' => $request->shipping_division_name,
            'created_at' => Carbon::now(),

        ]);

        // Retornar toastr msg após inserção bem sucedida
        $notification = array(
            'message' => 'Division Inserido com Sucesso',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
