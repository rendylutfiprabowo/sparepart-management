<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class technician_tools extends Model
{
    use HasFactory;

    protected $table = 'technician_tools';
    public $timestamps = false;

    protected $fillable = [
        'id_technician_tools',
        'id_tools',
        'id_technician',
        'qty_technician_tools',
        'start_date',
        'finish_date',
        'status',
    ];

    public function tools(): BelongsTo
    {
        return $this->BelongsTo(tools::class, 'id_tools', 'id_tools');
    }
    public function technician(): BelongsTo
    {
        return $this->BelongsTo(technician::class, 'id_technician', 'id_technician');
    }
}
