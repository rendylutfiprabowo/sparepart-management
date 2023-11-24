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
        'tanggal_sampling',
        'tanggal_kedatangan',
        'tanggal_pengujian',
        'id_scope',
        'id_history'
    ];

    public function formReport(): HasOne
    {
        return $this->hasOne(formReport::class, 'id_sample', 'id_sample');
    }
    public function soLab(): BelongsTo
    {
        return $this->belongsTo(solab::class, 'no_so_solab', 'np_so_solab');
    }

    public function scope(): BelongsTo
    {
        return $this->belongsTo(scope::class, 'id_scope', 'id_scope');
    }
    public function history(): BelongsTo
    {
        return $this->belongsTo(history::class, 'id_history', 'id');
    }
    


}
