<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'title',
        'image',
        'fb_url',
        'x_url',
        'in_url',
        'sk_url',
        'ln_url',
    ];
}
