<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class order extends Model
{
    use HasFactory;
    protected $table = 'order';


    public $timestamps = false;


    protected $fillable = [
        'id_order',
        'id_customer',
        'id_store',
        'id_sales',
        'id_technician',
        'memo_order',
        'do_order',
        'spk_order',
        'date_order',
        'jenis_layanan',
        'status',
    ];
    public function revisi(): HasMany
    {
        return $this->HasMany(revisi::class, 'id_order', 'id_order');
    }
    public function booked(): HasMany
    {
        return $this->HasMany(booked::class, 'id_order', 'id_order');
    }
    public function customer(): BelongsTo
    {
        return $this->BelongsTo(customer::class, 'id_customer', 'id_customer');
    }
    public function store(): BelongsTo
    {
        return $this->BelongsTo(storeSparepart::class, 'id_store', 'id_store');
    }
    public function sales(): BelongsTo
    {
        return $this->BelongsTo(sales::class, 'id_sales', 'id_sales');
    }
    public function technician(): BelongsTo
    {
        return $this->BelongsTo(technician::class, 'id_technician', 'id_technician');
    }
}
