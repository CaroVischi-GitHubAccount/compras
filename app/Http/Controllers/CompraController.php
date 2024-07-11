<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Proveedore;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CompraController extends Controller
{
    public function create()
    {
        $compra = new Compra();
        $proveedores=DB::table('proveedores')
        ->select('proveedores.id as id', 'proveedores.nombre as nombre')
        ->get();
        return view('compras.createCompra', compact('compra', 'proveedores'));
    }

}