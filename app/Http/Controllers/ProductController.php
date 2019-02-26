<?php

namespace App\Http\Controllers;

use App\Product;
use App\Bodega;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('producto');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Product();

        $producto->nombre      = $request->nombre;
        $producto->cantidad    = $request->cantidad;
        $producto->estado      = $request->estado;
        $producto->bodega_id   = $request->bodega;
        $producto->observacion = $request->observacion;

        $producto->save();

        return response()->json(['success' => 1, 'mensaje' => 'Producto guardado correctamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $productos = Product::where('nombre', 'LIKE', $request->search)
                    ->with('bodega')->paginate($request->paginate);

        $response = [
           'pagination' => [
               'total' => $productos->total(),
               'per_page' => $productos->perPage(),
               'current_page' => $productos->currentPage(),
               'last_page' => $productos->lastPage(),
               'from' => $productos->firstItem(),
               'to' => $productos->lastItem(),
           ],
           'productos' => $productos
       ];

        return response()->json($response);
    }

    public function bodegas() 
    {
        $bodegas = Bodega::all();

        return response()->json(compact('bodegas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function updateEstado(Request $request)
    {
        $producto = Product::find($request->id_producto);
        $producto->estado = $request->estado;
        $producto->save();

        return response()->json(['success' => 1, 'mensaje' => 'El estado del producto se actualizo correctamente.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
