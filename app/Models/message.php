<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    use HasFactory;
    protected $table = 'messages'; // Optional, only if the table name doesn't follow Laravel's convention

    protected $primaryKey = 'id_mess'; // Specify the primary key if it's not `id`

    protected $fillable = [
        'name',
        'email',
        'sujet',
        'content',
    ];
}
