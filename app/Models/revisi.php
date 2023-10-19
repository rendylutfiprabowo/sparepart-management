<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\technician;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class revisi extends Model
{
    use HasFactory;
    protected $table = 'revisi';

    public $timestamps = false;


    protected $fillable = [
        'id_revisi',
        'id_order',
        'id_technician',
        'do_order',
        'memo_order',
        'status',
    ];

    public function order(): BelongsTo
    {
        return $this->BelongsTo(order::class, 'id_order', 'id_order');
    }
    public function technician(): BelongsTo
    {
        return $this->BelongsTo(technician::class, 'id_technician', 'id_technician');
    }
    public function booked(): HasMany
    {
        return $this->HasMany(booked::class, 'id_revisi', 'id_revisi');
    }
}
