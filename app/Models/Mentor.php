<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    protected $fillable = [
        'name',
        'profession',
        'industry',
        'expertise',
        'bio',
        'language',
        'social_links',
        'location',
        'experience_level',
        'availability',
        'profile_photo',
    ];

}
