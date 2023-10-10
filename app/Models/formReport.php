<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class formReport extends Model
{
    use HasFactory;
    protected $table = 'form_report';

    public $timestamps = false;

    protected $fillable = [
        'id_formreport',
        'field_formreport',
        'value_formreport',
        'id_solab',
        'id_lab'
    ];

    public function sample(): BelongsTo
    {
        return $this->BelongsTo(sample::class, 'id_sample', 'id_sample');
    }
    public function lab(): BelongsTo
    {
        return $this->BelongsTo(lab::class, 'id_lab', 'id_lab');
    }

}
