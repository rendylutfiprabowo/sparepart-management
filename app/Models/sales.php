<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

class sales extends Model
{
    use HasFactory;
    protected $table = 'sales';

    public $timestamps = false;

    protected $fillable = [
        'id_sales',
        'nama_sales',
        'phone_sales',
        'nip_sales',
        'id_user',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function order(): HasMany
    {
        return $this->HasMany(order::class, 'id_sales', 'id_sales');
    }
}
