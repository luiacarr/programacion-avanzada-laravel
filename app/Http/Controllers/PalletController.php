<?php

namespace App\Http\Controllers;

use App\Models\Pallet;
use Illuminate\Http\Request;

class PalletController extends Controller
{
    public function index(){
        $posts= Post::with(['masters'])->get();
        return $posts;
    }
}
