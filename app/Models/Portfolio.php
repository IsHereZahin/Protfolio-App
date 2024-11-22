<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $table = 'portfolios';
    protected $fillable = [
        'title',
        'description',
        'category',
        'client',
        'project_date',
        'project_url',
        'testimonial',
        'testimonial_author',
        'testimonial_role',
        'testimonial_author_image'
    ];

    public function images()
    {
        return $this->hasMany(PortfolioImage::class);
    }

    public function featuredImage()
    {
        return $this->hasOne(PortfolioImage::class)->where('is_featured', true);
    }
}
