<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\stockSparepart;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class sparepart extends Model
{
    use HasFactory;
    protected $table = 'sparepart';
    public $timestamps = false;
    protected $fillable = [
        'id_category',
        'codematerial_sparepart',
        'spesifikasi_sparepart',
        'satuan'
    ];



    public function stock(): HasMany
    {
        return $this->hasMany(stockSparepart::class, 'id_sparepart','codematerial_sparepart');
    }
    public function category(): BelongsTo
    {
        return $this->BelongsTo(category::class, 'id_category', 'id_category');
    }
}
