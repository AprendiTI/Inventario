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
        'User1',
        'Amount1',
        'Lote1',
        'DateExpiration1',
        'User2',
        'Amount2',
        'Lote2',
        'DateExpiration2',
        'User3',
        'Amount3',
        'Lote3',
        'DateExpiration3',
        'Difference',
        'DateAsign',
        'State',
    ];
    
    public $timestamps = true;
}
