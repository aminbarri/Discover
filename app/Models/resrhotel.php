<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resrhotel extends Model
{
    use HasFactory;

    protected $table = 'reservation_hotel';

    // Specify the primary key if it's not 'id'.
    protected $primaryKey = 'id_resh';

    // Define the fillable properties
    protected $fillable = [
        'id_hotel',
        'id_client',
        'phone',
        'type',
        'nmbre_perssone',
        'date_debut',
        'date_fin',
        'date_reservartion',
        'statu'
    ];

    /**
     * Get the hotel associated with the reservation.
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'id_hotel');
    }

    /**
     * Get the user (client) associated with the reservation.
     */
    public function client()
    {
        return $this->belongsTo(User::class, 'id_client');
    }
}
