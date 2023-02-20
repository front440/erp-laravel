<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;


class CategoriaController extends Controller
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
        return view("categorias.crear-categoria");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Categoria::create([
            'nombre' => $request->nombre,

        ]);
        return redirect("/categorias")->with("status", "Categoría añadida correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $categorias = Categoria::all();
        return view("categorias.categoria", compact('categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $categoria = Categoria::find($request->id);
        return view("categorias.editar-categoria", compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        $categoria->nombre = $request->nombre; 
        $categoria->save();
        return redirect("/categorias")->with("status", "Categoría modificada correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $categoria = Categoria::find($request->id);
        $categoria->delete();
        return redirect("/categorias")->with("status", "Categoria borrada correctamente");

    }

    public function pdf()
    {
        $categorias = Categoria::all();

        $hoy = date("d_m_Y_H_i");      // Guardamos la fecha para añadirsela al nombre del pdf
        $hoyPDF = date("d/m/Y H:i");
        $pdf = \PDF::loadView('categorias.pdf-categorias', compact('categorias', 'hoyPDF'));

        return $pdf->download("categorias-".$hoy.".pdf");
        
    }
}
