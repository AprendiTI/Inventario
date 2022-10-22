<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CopiaWMS extends Model
{
    use HasFactory;
    public $table = 'CopiaWMS';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'ItemCode',
        'Description',
        'BarCode',
        'Amount',
        'Lote',
        'DateExpiration',
        'Zone',
        'Hallway',
        'Location',
        'Compartment',
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
        'DateCopy',
    ];
    
    public $timestamps = true;
}
