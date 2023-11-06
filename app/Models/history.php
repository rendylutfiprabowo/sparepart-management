<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class history extends Model
{
    use HasFactory;
    protected $table = 'history';

    public $timestamps = false;

    protected $fillable = [
        'id_project',
        'id_trafo',
    ];

    public function trafo(): BelongsTo
    {
        return $this->belongsTo(trafo::class, 'id_trafo', 'id_trafo');
    }
    public function project(): BelongsTo
    {
        return $this->belongsTo(project::class, 'id_project', 'id_project');
    }
    public function samples(): HasMany
    {
        return $this->hasMany(sample::class, 'id_history', 'id');
    }
}
