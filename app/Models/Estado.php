<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Confirmado;
use App\Models\Defuncion;
use App\Models\Sospechoso;
use App\Models\Negativo;
class Estado extends Model
{
    use HasFactory;
    protected $table = 'upload_estados_20230919201321';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
    protected $atributes = ['nombre', 'poblacion','State'];

    public function confirmados(): HasMany
    {
        return $this->HasMany(confirmado::class);
    }

    public function defunciones(): HasMany
    {
        return $this->HasMany(Defuncion::class);
    }
    
    public function sospechosos(): HasMany
    {
        return $this->HasMany(Sospechoso::class);
    }
    
    public function negativos(): HasMany
    {
        return $this->HasMany(Negativo::class);
    }
}
