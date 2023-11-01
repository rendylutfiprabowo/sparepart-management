<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class project extends Model
{
    use HasFactory;
    protected $table = 'project';

    public $timestamps = false;

    protected $fillable = [
        'id_project',
        'nama_project',
        'namapic_project',
        'nopic_project',
        'email_project',
        'alamat_project',
        'id_customer'
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(customer::class, 'id_customer', 'id_customer');
    }
    public function solab(): HasOne
    {
        return $this->hasOne(solab::class, 'id_project', 'id_project');
    }

    public function trafo(): HasMany
    {
        return $this->hasMany(trafo::class, 'id_project', 'id_project');
    }
    public function history(): HasMany
    {
        return $this->hasMany(history::class, 'id_project', 'id_project');
    }
}
