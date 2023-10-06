<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class solab extends Model
{
    use HasFactory;
    protected $table = 'solab';

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
        return $this->hasMany(sample::class, 'id_sample', 'id_sample');
    }
}