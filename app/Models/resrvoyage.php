<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resrvoyage extends Model
{
    use HasFactory;
    protected $table = 'travelres';

    // Specify the primary key if it's not 'id'.
    protected $primaryKey = 'id_vor';

    // Define the fillable properties
    protected $fillable = [

        	'id_voyage',
            	'id_client',
                	'phone',
                    	'nmbre_perssone'
    ];

    /**
     * Get the hotel associated with the reservation.
     */
    public function voyage()
    {
        return $this->belongsTo(voyage::class, 'id_voyage');
    }

    /**
     * Get the user (client) associated with the reservation.
     */
    public function client()
    {
        return $this->belongsTo(User::class, 'id_client');
    }
}
