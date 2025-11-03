<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductVariation extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'product_id',
        'sku',
        'price',
        'stock_quantity',
        'image',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'decimal:2',
        'stock_quantity' => 'integer',
    ];

    /**
     * Product relation.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Attribute values relation.
     */
    public function attributeValues(): BelongsToMany
    {
        return $this->belongsToMany(
            AttributeValue::class,
            'product_variation_attribute_value'
        )->using(ProductVariationAttributeValue::class)->withTimestamps();
    }

    /**
     * Order items relation.
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
