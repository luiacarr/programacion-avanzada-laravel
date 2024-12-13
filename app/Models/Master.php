<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    /** @use HasFactory<\Database\Factories\MasterFactory> */
   
    protected $primaryKey = 'id_master'; 

  
    public function pallet()
    {
        return $this->belongsTo(Pallet::class, 'id_pallet', 'id_pallet');
    }
}
