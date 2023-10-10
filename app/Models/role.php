<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class role extends Model
{
    use HasFactory;

    protected $table = 'role';
    public $timestamps = false;

    protected $fillable = [
        'nama_role',
    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'id', 'id_role');
    }
}
