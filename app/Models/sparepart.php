<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\stockSparepart;

class sparepart extends Model
{
    use HasFactory;
    protected $table = 'sparepart';

    protected $fillable = [
        'codematerial_sparepart',
        'nama_sparepart',
        'spesifikasi_sparepart',
        'satuan'
    ];



    public function stock(): HasMany
    {
        return $this->hasMany(stockSparepart::class, 'codematerial_sparepart', 'id_sparepart');
    }
}
