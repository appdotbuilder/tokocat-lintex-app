<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\RawMaterial
 *
 * @property int $id
 * @property string $name
 * @property string $unit
 * @property float $stock_current
 * @property float $stock_minimum
 * @property float $price_per_unit
 * @property int|null $supplier_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Supplier|null $supplier
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RawMaterialTransaction> $transactions
 * @property-read int|null $transactions_count
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterial query()
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterial whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterial wherePricePerUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterial whereStockCurrent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterial whereStockMinimum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterial whereSupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterial whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterial whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RawMaterial lowStock()
 * @method static \Database\Factories\RawMaterialFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class RawMaterial extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'unit',
        'stock_current',
        'stock_minimum',
        'price_per_unit',
        'supplier_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'stock_current' => 'decimal:2',
        'stock_minimum' => 'decimal:2',
        'price_per_unit' => 'decimal:2',
    ];

    /**
     * Get the supplier that owns the raw material.
     */
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Get the transactions for the raw material.
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(RawMaterialTransaction::class);
    }

    /**
     * Scope a query to only include low stock items.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLowStock($query)
    {
        return $query->whereRaw('stock_current <= stock_minimum');
    }
}