<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class form extends Model
{
    use HasFactory;
    protected $table = 'form';

    protected $fillable = [
        'id_form',
        'field_form',
        'id_scope'
    ];

    public function scope(): BelongsTo
    {
        return $this->BelongsTo(scope::class, 'id_scope', 'id_scope');
    }
}
