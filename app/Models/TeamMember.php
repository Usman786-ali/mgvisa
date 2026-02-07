<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'position',
        'image',
        'bio',
        'whatsapp',
        'facebook',
        'linkedin',
        'twitter',
        'order',
        'is_active',
    ];
}
