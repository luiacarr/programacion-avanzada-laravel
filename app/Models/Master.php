<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    /** @use HasFactory<\Database\Factories\MasterFactory> */
    use HasFactory;

    protected $fillable = ['id_master', 'id_pallet', 'codigo'];
}
