<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class destin extends Model
{
    use HasFactory;
    protected $table = 'destination';

    // Specify the primary key for the table
    protected $primaryKey = 'id_des';

    // Specify the fields that can be mass-assigned
    protected $fillable = [
        'nom',
        'ville',
        'province',
        'description',
        'location',
        'img1',
        'img2',
        'img3',
        'id_user',
    ];

    // Specify the fields that should be treated as dates
    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
