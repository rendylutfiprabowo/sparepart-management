<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class formReport extends Model
{
    use HasFactory;
    protected $table = 'form_report';

    protected $fillable = [
        'id_formreport',
        'field_formreport',
        'value_formreport',
        'id_solab',
        'id_lab'
    ];

    public function solab(): BelongsTo
    {
        return $this->BelongsTo(solab::class, 'id_solab', 'id_solab');
    }
    public function lab(): BelongsTo
    {
        return $this->BelongsTo(lab::class, 'id_lab', 'id_lab');
    }

}
