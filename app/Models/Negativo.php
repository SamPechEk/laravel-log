<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negativo extends Model
{
    use HasFactory;
    protected $table = 'upload_negativos_20230919201405';
    // protected $primarykey = 'estado_id';
    // public $incrementing = false;
    public $timestamps = false;
    protected $attributes = ['fecha','casos']; 
}
