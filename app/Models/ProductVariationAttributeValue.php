<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductVariationAttributeValue extends Pivot
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The table associated with the pivot.
     *
     * @var string
     */
    protected $table = 'product_variation_attribute_value';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'product_variation_id',
        'attribute_value_id',
    ];
}
