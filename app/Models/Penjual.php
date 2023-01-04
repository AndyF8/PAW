<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjual extends Model
{
    protected $table = 'penjual';
    protected $fillable = [
        'namapenjual',
        'nopenjual',
        'alamatpenjual'        
    ];

}
