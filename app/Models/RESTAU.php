<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RESTAU extends Model
{
    use HasFactory;
    protected $table = 'restau';

    // Specify the fields that are mass assignable.
    protected $fillable = [
        'id_rest',      // Restaurant ID
        'nom',          // Name
        'ville',        // City
        'province',     // Province
        'description',  // Description
        'location',     // Location
        'img1',         // Image 1
        'img2',         // Image 2
        'img3',         // Image 3
        'carte',        // Map/Carte
        'user_id',           // ID
        'date_add',     // Date added
           // Updated at timestamp
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
