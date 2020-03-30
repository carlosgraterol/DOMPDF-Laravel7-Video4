<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Producto;
use Storage;

class PDFController extends Controller
{
    public function PDF(){

    	$pdf = PDF::loadView('prueba');
    	return $pdf->stream('prueba.pdf');
    }

    public function PDFProductos(){

    	$productos = Producto::all();
    	$pdf = PDF::loadView('productos', compact('productos'));
    	return $pdf->download('productos.pdf');
    }

    public function PDFProductosHorizontal(){

    	$productos = Producto::all();
    	$pdf = PDF::loadView('productoshorizontal', compact('productos'));
    	return $pdf->setPaper('a4', 'landscape')->stream('productoshorizontal.pdf');
    }

    public function guardarpdf(){

    	$productos = Producto::all();
    	$pdf = PDF::loadView('productoshorizontal', compact('productos'));
    	Storage::disk('public')->put(date('Y-m-d-H-i-s').'-productoshorizontal', $pdf);

    	return redirect()->back()->with('status', '¡PDF guardado correctamente!');
    }
}
