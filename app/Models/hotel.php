<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hotel extends Model
{
    use HasFactory;
    protected $table = 'hotels';
    
    // Specify the fields that are mass assignable, if needed.
    protected $fillable = ['nom', 'ville', 'carte', 'chambre', 'classe', 'location', 'prix', 'img1', 'img2', 'img3', 'user_id'];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
