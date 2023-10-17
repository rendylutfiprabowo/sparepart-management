<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class technician extends Model
{
    use HasFactory;
    protected $table = 'technician';

    public $timestamps = false;


    protected $fillable = [
        'id_technician',
        'nama_technician',
        'phone_technician',
        'nip_technician',
        'id_user',
    ];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'id_user', 'id_user');
    }
    public function revisi(): HasOne
    {
        return $this->HasOne(User::class, 'id_technician', 'id_technician');
    }
    public function order(): HasMany
    {
        return $this->hasMany(order::class, 'id_technician', 'id_technician');
    }
    public function technician_tools(): HasMany
    {
        return $this->hasMany(technician_tools::class, 'id_technician', 'id_technician');
    }
}
