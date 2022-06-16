<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(){
        return view('carrito.factura2');
    }
    public function invoice(){
        return view('carrito.invoice');
    }
}
