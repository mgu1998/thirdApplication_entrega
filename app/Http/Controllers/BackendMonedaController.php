<?php

namespace App\Http\Controllers;
use App\Models\Moneda;
use Illuminate\Http\Request;

class BackendMonedaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $monedas = Moneda::all();
        return view('backend.moneda.index', ['monedas' => $monedas]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.moneda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $moneda = new Moneda($request->all());
        try {
            $result = $moneda->save();
        } catch(\Exception $e) {
            $result = 0;
        }
        if($moneda->id > 0) {
            $response = ['op' => 'create', 'r' => $result, 'id' => $moneda->id];
            return redirect('backend/moneda')->with($response);
        } else {
            return back()->withInput()->with(['error' => 'algo ha fallado']);
        }
    }


    public function show(Moneda $moneda)
    {
        return view('backend.moneda.show', ['moneda' => $moneda]);
    }


    public function edit(Moneda $moneda)
    {
        return view('backend.moneda.edit', ['moneda' => $moneda]);
    }

    public function update(Request $request, Moneda $moneda)
    {
        try {
            $result = $moneda->update($request->all());
        } catch (\Exception $e) {
            $result = 0;
        }
        if($result) {
            $response = ['op' => 'update', 'r' => $result, 'id' => $moneda->id];
            return redirect('backend/moneda')->with($response);
        } else {
            return back()->withInput()->with(['error' => 'algo ha fallado']);
        }
    }

    public function destroy(Moneda $moneda)
    {
        $id = $moneda->id;
        try {
            $result = $moneda->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        $response = ['op' => 'destroy', 'r' => $result, 'id' => $id];
        return redirect('backend/moneda')->with($response);
    }
}
