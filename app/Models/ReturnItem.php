<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\ReturnItem
 *
 * @property int $id
 * @property int $sale_id
 * @property int $product_id
 * @property int $quantity
 * @property string $reason
 * @property float $refund_amount
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Sale $sale
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\User $user
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnItem whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnItem whereRefundAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnItem whereSaleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnItem whereUserId($value)
 * @method static \Database\Factories\ReturnItemFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class ReturnItem extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'returns';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'sale_id',
        'product_id',
        'quantity',
        'reason',
        'refund_amount',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'quantity' => 'integer',
        'refund_amount' => 'decimal:2',
    ];

    /**
     * Get the sale that owns the return item.
     */
    public function sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }

    /**
     * Get the product that owns the return item.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the user that owns the return item.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}