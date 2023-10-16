<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tools extends Model
{
    use HasFactory;

    protected $table = 'tools';
    public $timestamps = false;

    protected $fillable = [
        'id_tools',
        'id_store',
        'nama_tools',
        'qty_tools',
    ];

    public function store(): BelongsTo
    {
        return $this->BelongsTo(storeSparepart::class, 'id_store', 'id_store');
    }
    public function technician_tools(): HasMany
    {
        return $this->HasMany(technician_tools::class, 'id_tools', 'id_tools');
    }
}
