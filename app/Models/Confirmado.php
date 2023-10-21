<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Confirmado extends Model
{
    use HasFactory;
    protected $table = 'upload_confirmados_20230919201140';
    protected $primarykey = 'estado_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $attributes = ['estado_id','fecha','casos']; 

    public function estados():BelongsTo
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }
}
