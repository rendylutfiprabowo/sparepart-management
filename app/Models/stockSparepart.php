<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class stockSparepart extends Model
{
    use HasFactory;
    protected $table = 'stock';

    protected $fillable = [
        'id_sparepart',
        'qty_stock',
        'id_store',
        'id_stock',
        'safety_stock'
    ];

    public function sparepart(): BelongsTo
    {
        return $this->belongsTo(sparepart::class, 'id_sparepart', 'codematerial_sparepart');
    }
    public function revisi(): HasMany
    {
        return $this->HasMany(revisi::class, 'id_stock', 'id_stock');
    }
    public function store_sparepart(): BelongsTo
    {
        return $this->belongsTo(storeSparepart::class, 'id_store', 'id_store');
    }
    public function isBelowSafetyStock()
    {
        if ($this->qty_stock <= $this->safety_stock)
            return true;
    }
}
