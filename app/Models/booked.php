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
        'id_order',
        'id_revisi',
        'qty_booked',
        'status_booked',
    ];

    public function order(): BelongsTo
    {
        return $this->BelongsTo(order::class, 'id_order', 'id_order');
    }
    public function stock(): BelongsTo
    {
        return $this->BelongsTo(stockSparepart::class, 'id_stock', 'id_stock');
    }
    public function revisi(): BelongsTo
    {
        return $this->BelongsTo(revisi::class, 'id_revisi', 'id_revisi');
    }
}
