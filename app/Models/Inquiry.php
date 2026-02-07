<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'country_of_interest',
        'visa_type',
        'message',
        'status',
        'admin_notes',
        'contacted_at'
    ];

    protected $casts = [
        'contacted_at' => 'datetime',
    ];

}
