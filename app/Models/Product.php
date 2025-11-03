<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'long_description',
        'category_id',
    ];

    /**
     * Category relation.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Variations relation.
     */
    public function variations(): HasMany
    {
        return $this->hasMany(ProductVariation::class);
    }

    /**
     * Product images relation.
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

}
