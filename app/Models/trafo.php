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
        'voltage',
        'vg',
        'tag_number',
        'volume_oil',
        'id_project',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(project::class, 'id_project', 'id_project');
    }
}
