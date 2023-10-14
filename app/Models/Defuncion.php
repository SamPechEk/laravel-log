<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Defuncion extends Model
{
    use HasFactory;
    protected $table = 'upload_defunciones_20230919201302';
    // protected $primarykey = 'estado_id';
    // public $incrementing = false;
    public $timestamps = false;
    protected $attributes = ['fecha','casos']; 
}
