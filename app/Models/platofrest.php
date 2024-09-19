<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class platofrest extends Model
{use HasFactory, SoftDeletes;

    // Disable auto-increment since you have composite primary keys
    public $incrementing = false;

    // Define the type of your keys (if needed, adjust based on the actual data type in your database)
    protected $keyType = 'int';

    // Specify the table name
    protected $table = 'platofrest';

    // Define the fillable fields (including soft deletes column)
    protected $fillable = [
        'id_plat',
        'id_rest',
        'deleted_at'
    ];

    // Disable the timestamps (since your table doesn't have `created_at` and `updated_at`)
    public $timestamps = false;

    // Define relationships with Plat and Restau
    public function plat()
    {
        return $this->belongsTo(Plat::class, 'id_plat');
    }

    public function restau()
    {
        return $this->belongsTo(Restau::class, 'id_rest');
    }
}
