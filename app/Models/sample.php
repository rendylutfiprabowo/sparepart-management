<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class sample extends Model
{
    use HasFactory;
    protected $table = 'sample';

    public $timestamps = false;

    protected $fillable = [
        'id_sample',
        'jumlah_sample',
        'status_sample',
        'id_solab',
        'id_scope'
    ];

    public function solab(): BelongsTo
    {
        return $this->belongsTo(solab::class, 'id_solab', 'id_solab');
    }
}
