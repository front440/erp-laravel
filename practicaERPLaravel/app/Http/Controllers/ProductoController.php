<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Negocio;
use Illuminate\Http\Request;


class ProductoController extends Controller
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
    public function create(Request $request)
    {
        $categorias = Categoria::all();
        $negocios = Negocio::all();
        return view("productos.crear-producto", compact('categorias', 'negocios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'id_categoria' => $request->categoria,
            'id_negocio' => $request->negocio,
        ]);
        return redirect("/productos")->with("status", "Producto añadida correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show()
    {   

        $productos = Producto::all();
        $categorias = Categoria::all();
        $negocios = Negocio::all();
        return view("productos.producto", compact('productos', 'categorias', 'negocios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $producto = Producto::find($request->id);
        $categorias = Categoria::all();
        $negocios = Negocio::all();
        return view("productos.editar-producto", compact('producto', 'categorias', 'negocios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductoRequest  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        $producto->nombre = $request->nombre; 
        $producto->precio = $request->precio;
        $producto->id_categoria = $request->categoria;
        $producto->id_negocio = $request->negocio;
        $producto->save();
        return redirect("/productos")->with("status", "Producto modificado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $producto = Producto::find($request->id);
        $producto->delete();
        return redirect("/productos")->with("status", "Producto borrado correctamente");

    }

    public function pdf()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        $negocios = Negocio::all();

        $hoy = date("d_m_Y_H_i");      // Guardamos la fecha para añadirsela al nombre del pdf
        $hoyPDF = date("d/m/Y H:i");
        $pdf = \PDF::loadView('productos.pdf-productos', compact('productos', 'categorias', 'negocios', 'hoyPDF'));

        return $pdf->download("productos-".$hoy.".pdf");
        
    }
}
