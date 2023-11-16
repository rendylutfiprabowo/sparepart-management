<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class distribution
extends Model

{
    use HasFactory;
    protected $table = 'distribution';
    public $timestamps = false;

    protected $fillable = [
        'id_distribution',
        'id_stock',
        'qty_distribution',
        'order_date',
        'recieved_date',
        'status'
    ];

    public function stock(): BelongsTo
    {
        return $this->belongsTo(stockSparepart::class, 'id_stock', 'id_stock');
    }
}
