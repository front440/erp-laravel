<?php

namespace App\Http\Controllers;

use App\Models\Negocio;
use Illuminate\Http\Request;

class NegocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("negocios.crear-negocio");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNegocioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Negocio::create([
            'nombre' => $request->nombre,
            
        ]);
        return redirect("/negocios")->with("status", "Negocio añadida correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $negocios = Negocio::all();
        return view("negocios.negocio", compact('negocios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Negocio  $negocio
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $negocio = Negocio::find($request->id);
        return view('negocios.editar-negocio', compact('negocio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Negocio  $negocio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $negocio = Negocio::find($id);
        $negocio->nombre = $request->nombre; 
        $negocio->save();
        return redirect("/negocios")->with("status", "Negocio modificado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Negocio  $negocio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $negocio = Negocio::find($request->id);
        $negocio->delete();
        return redirect("/negocios")->with("status", "Producto borrado correctamente");

    }

    public function pdf()
    {
        $negocios = Negocio::all();

        $hoy = date("d_m_Y_H_i");      // Guardamos la fecha para añadirsela al nombre del pdf
        $hoyPDF = date("d/m/Y H:i");
        $pdf = \PDF::loadView('negocios.pdf-negocios', compact('negocios', 'hoyPDF'));

        return $pdf->download("negocios-".$hoy.".pdf");
        
    }
}
