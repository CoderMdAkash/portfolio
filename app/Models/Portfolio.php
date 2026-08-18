<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'title',
        'category',
        'image',
        'short_description',
        'full_description',
        'client_name',
        'project_url',
        'is_featured',
    ];
}
