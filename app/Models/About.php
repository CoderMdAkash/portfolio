<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'name',
        'title',
        'location',
        'bio',
        'exp_years',
        'completed_projects',
        'happy_clients',
        'email',
        'phone',
        'cv_link',
        'image',
    ];
}
