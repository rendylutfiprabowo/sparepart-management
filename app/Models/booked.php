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
        'jenis_layanan',
        'id_customer',
        'qty_booked',
        'status_booked',
    ];

    public function stock(): BelongsTo
    {
        return $this->BelongsTo(stockSparepart::class, 'id_stock', 'id_stock');
    }
    public function customer(): BelongsTo
    {
        return $this->BelongsTo(customer::class, 'id_customer', 'id_customer');
    }
}
