<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'status',
        'total_amount',
        'shipping_address',
        'billing_address',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'shipping_address' => 'array',
        'billing_address' => 'array',
        'total_amount' => 'decimal:2',
    ];

    /**
     * Customer relationship.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Items associated with the order.
     */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Product variations contained in the order.
     */
    public function productVariations(): BelongsToMany
    {
        return $this->belongsToMany(
            ProductVariation::class,
            'order_items'
        )->withPivot(['quantity', 'price'])->withTimestamps();
    }
}
