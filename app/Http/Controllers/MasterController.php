<?php

namespace App\Http\Controllers;

use App\Models\Master;
use Illuminate\Http\Request;

class MasterController extends Controller
{
     // Método para obtener todos los masters
     public function index()
     {
         // Obtener todos los masters
         $masters = Master::all();
 
         // Retornar los masters en formato JSON
         return response()->json($masters);
     }
}
