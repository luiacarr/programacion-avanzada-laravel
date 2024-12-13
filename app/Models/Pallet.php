<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pallet extends Model
{
    /** @use HasFactory<\Database\Factories\PalletFactory> */
    public function master()
    {
        return $this->belongsTo(Master::class);
    }
}
