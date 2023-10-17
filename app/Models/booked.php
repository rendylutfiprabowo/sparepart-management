<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class booked extends Model
{
    use HasFactory;
    protected $table = 'booked';

    public $timestamps = false;


    protected $fillable = [
        'id_booked',
        'id_stock',
        'qty_booked',
        'id_order'
    ];

    public function stock(): BelongsTo
    {
        return $this->BelongsTo(stockSparepart::class, 'id_stock', 'id_stock');
    }
    public function order(): BelongsTo
    {
        return $this->BelongsTo(order::class, 'id_order', 'id_order');
    }
}
