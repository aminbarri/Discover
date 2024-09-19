<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voyage extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'voyage';

    // Specify the primary key column
    protected $primaryKey = 'id_voy';

    // Set auto-incrementing to true (default behavior)
    public $incrementing = true;

    // Define the data type of the primary key
    protected $keyType = 'int';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'ville_depart',
        'ville_arrive',
        'trajet',
        'date_depart',
        'heure_depart',
        'dure',
        'img',
        'carte',
        'prix',
        'id_user',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Define the relationships if needed
    
}
