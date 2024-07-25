<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index() {
        $inventario = Inventario::with('proveedores')->get();
        
        return view('inventario.index', compact('inventario'));
    }
}
