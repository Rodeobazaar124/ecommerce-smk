<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'parent_id', 'slug'];
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
    public function parent()
    {
        return $this->belongsTo(Category::class);
    }
    public function child()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function scopeGetParent($query)
    {
        return $query->whereNull('parent_id');
    }
    /**
     * Get all of the product for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
