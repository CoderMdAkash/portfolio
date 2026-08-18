<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = [
        'title',
        'institution',
        'year',
        'details',
        'credential_url',
    ];
}
