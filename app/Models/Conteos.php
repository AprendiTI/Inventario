<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conteos extends Model
{
    use HasFactory;

    public $table = 'Conteos';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'Model_id',
        'Difference',
    ];
    
    public $timestamps = true;
}
