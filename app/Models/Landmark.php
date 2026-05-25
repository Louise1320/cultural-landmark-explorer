<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Landmark extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'country', 'country_code',
        'location', 'category', 'description',
        'why_visit', 'image', 'gallery',
        'map_embed', 'fun_fact', 'featured',
    ];

    protected $casts = [
        'gallery'  => 'array',
        'featured' => 'boolean',
    ];

    public function scopeByCountry($query, string $country)
    {
        return $query->where('country', strtolower($country));
    }

    public function scopeByCategory($query, string $category)
    {
        return $query->where('category', $category);
    }

    public function scopeSearch($query, string $term)
    {
        return $query->where('name', 'like', "%{$term}%")
                     ->orWhere('location', 'like', "%{$term}%");
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}