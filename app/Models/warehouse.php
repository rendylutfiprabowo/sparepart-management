<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class warehouse extends Model
{
    use HasFactory;

    protected $table = 'warehouse';

    public $timestamps = false;


    protected $fillable = [
        'id_warehouse',
        'nama_warehouse',
        'phone_warehouse',
        'id_user',
        'id_store',
    ];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'id_user', 'id_user');
    }
    public function store(): BelongsTo
    {
        return $this->BelongsTo(storeSparepart::class, 'id_store', 'id_store');
    }
}
