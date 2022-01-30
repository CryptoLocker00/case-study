<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoDetail extends Model
{
    use HasFactory;

    protected $table = 'seo_details';
    protected $fillable = [
        'title',
        'description',
    ];
}
