<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class storeSparepart extends Model
{
    use HasFactory;
    protected $table = 'store';

    protected $fillable = [
        'id_store',
        'alamat_store',
        'nama_store'
    ];

    public function stock(): HasMany
    {
        return $this->hasMany(stockSparepart::class, 'id_store', 'id_store');
    }
    public function warehouse(): HasOne
    {
        return $this->hasOne(warehouse::class, 'id_store', 'id_store');
    }

    public function order(): HasMany
    {
        return $this->hasMany(order::class, 'id_store', 'id_store');
    }
}
