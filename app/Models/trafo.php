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
        'year',
        'tegangan_hv',
        'tegangan_lv',
        'voltage',
        'vg',
        'tag_number',
        'temperatur_oil',
        'volume_oil',
        'warna_oil',
        'id_customer',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(customer::class, 'id_customer', 'id_customer');
    }
    public function samples($id_project)
    {
    }

}
