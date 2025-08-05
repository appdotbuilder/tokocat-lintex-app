<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\RawMaterialTransaction
 *
 * @property int $id
 * @property int $raw_material_id
 * @property string $type
 * @property float $quantity
 * @property float $price_per_unit
 * @property float $total_cost
 * @property string|null $notes
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\RawMaterial $rawMaterial
 * @property-read \App\Models\User $user
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterialTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterialTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterialTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterialTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterialTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterialTransaction whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterialTransaction wherePricePerUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterialTransaction whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterialTransaction whereRawMaterialId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterialTransaction whereTotalCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterialTransaction whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterialTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterialTransaction whereUserId($value)
 * @method static \Database\Factories\RawMaterialTransactionFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class RawMaterialTransaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'raw_material_id',
        'type',
        'quantity',
        'price_per_unit',
        'total_cost',
        'notes',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'quantity' => 'decimal:2',
        'price_per_unit' => 'decimal:2',
        'total_cost' => 'decimal:2',
    ];

    /**
     * Get the raw material that owns the transaction.
     */
    public function rawMaterial(): BelongsTo
    {
        return $this->belongsTo(RawMaterial::class);
    }

    /**
     * Get the user that owns the transaction.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}