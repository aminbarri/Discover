<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLAT extends Model
{
     use HasFactory;

    // Specify the table name if it's not the plural of the model name
    protected $table = 'plat';

    // Specify the primary key if it does not follow Laravel's naming convention
    protected $primaryKey = 'id_plat';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'nom',
        'description',
        'img1',
        'img2',
        'img3',
    ];

    // Disable auto-incrementing if primary key is not an integer
    public $incrementing = true;

    // Specify the data type of the primary key if it's not an integer
    protected $keyType = 'int';
}
