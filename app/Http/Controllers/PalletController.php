<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PalletController extends Controller
{


    public function index() {
        
       $pallets = Pallet::all(); 
       return response()->json($pallets);
    }
}


