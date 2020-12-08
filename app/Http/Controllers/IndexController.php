<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    function index() {
        return view('index', ['cadena' => '<script>alert(1);</script><a href="https://google.es">enlace</a>', 'nombre' => 'pepe']);
    }

    function sesion() {
        $incrementar = request()->get('incrementar');
        $suma = 0;
        if(request()->session()->exists('sumacontinua')) {
            $suma = request()->session()->get('sumacontinua');
        }
        $leer = Session::get('flash');
        $leer2 = request()->session()->get('flash');
        $suma = $suma + $incrementar;
        if($incrementar == 11) {
            request()->session()->flash('flash', $incrementar);
        }
        if($incrementar == 12) {
            request()->session()->reflash();
        }
        request()->session()->put('sumacontinua', $suma);
        return view('sesion', ['incrementar' => $incrementar, 'suma' => $suma]);
    }
}
