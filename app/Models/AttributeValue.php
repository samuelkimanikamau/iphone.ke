<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AttributeValue extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'value',
        'attribute_id',
    ];

    /**
     * Attribute relationship.
     */
    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }

    /**
     * Product variations displaying this value.
     */
    public function productVariations(): BelongsToMany
    {
        return $this->belongsToMany(
            ProductVariation::class,
            'product_variation_attribute_value'
        )->withTimestamps();
    }
}
