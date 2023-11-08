<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class solab extends Model
{
    use HasFactory;
    protected $table = 'solab';

    public $timestamps = false;

    protected $fillable = [
        'no_so_solab',
        'no_spk_solab',
        'alamat_solab',
        'tahun_solab',
        'id_project',
        'id_sales'
    ];

    public function samples(): HasMany
    {
        return $this->hasMany(sample::class, 'no_so_solab', 'no_so_solab');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(project::class, 'id_project', 'id_project');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(customer::class, 'id_customer', 'id_customer');
    }

    public function sales(): BelongsTo
    {
        return $this->belongsTo(sales::class, 'id_sales', 'id_sales');
    }

    // public function reportsample(): BelongsTo
    // {
    //     return $this->belongsTo(reportSample::class, 'id_reportsample', 'id_reportsample');
    // }

    // public function reportSamples()
    // {
    //     return $this->hasMany(reportSample::class, 'no_so_solab', 'no_so_solab');
    // }

    public function trafo()
    {
        return $this->hasMany(trafo::class, 'id_project', 'id_project');
    }
}
