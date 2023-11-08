<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class reportSample extends Model
{
    use HasFactory;
    protected $table = 'report_sample';

    public $timestamps = false;

    protected $fillable = [
        'id_reportsample',
        'notes_reportsample',
        'no_so_solab'
    ];

    public function soLab(): BelongsTo
    {
        return $this->belongsTo(solab::class, 'no_so_solab', 'no_so_solab');
    }

    
}
