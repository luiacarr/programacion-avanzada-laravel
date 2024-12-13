php artisan make:model Master -mfs<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pallet extends Model
{
    /** @use HasFactory<\Database\Factories\PalletFactory> */
    use HasFactory;

   
    public function pallet()
    {
        return $this->belongsTo(Pallet::class, 'id_pallet'); 
    }
}