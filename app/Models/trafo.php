<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class trafo extends Model
{
    use HasFactory;
    protected $table = 'trafo';

    public $timestamps = false;

    protected $fillable = [
        'id_trafo',
        'serial_number',
        'kva',
        'merk',
        'pabrikan',
        'year',
        'area',
        'voltage',
        'vg',
        'tag_number',
        'temperatur_oil',
        'volume_oil',
        'warna_oil',
        'kapasitas_minyak',
        'catatan',
        'umur_trafo',
        'id_customer',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(customer::class, 'id_customer', 'id_customer');
    }
    public function histories(){
        return $this->hasMany(history::class,'id_trafo','id_trafo');
    }

}
