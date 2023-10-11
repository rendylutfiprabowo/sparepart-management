<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class sample extends Model
{
    use HasFactory;
    protected $table = 'sample';

    public $timestamps = false;

    protected $fillable = [
        'id_sample',
        'jumlah_sample',
        'status_sample',
        'no_so_solab',
        'id_scope'
    ];

    public function formReport(): HasOne
    {
        return $this->hasOne(formReport::class, 'id_form', 'id_form');
    }
    public function soLab(): BelongsTo
    {
        return $this->belongsTo(solab::class, 'no_so_solab', 'np_so_solab');
    }
}
