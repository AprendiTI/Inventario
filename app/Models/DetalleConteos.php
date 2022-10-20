<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleConteos extends Model
{
    use HasFactory;
    public $table = 'DetalleConteos';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'Conteo_id',
        'Copia_id',
    ];
    
    public $timestamps = true;
}
