<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class lab extends Model
{
    use HasFactory;
    protected $table = 'lab';

    public $timestamps = false;

    protected $fillable = [
        'id_lab',
        'nama_lab',
        'phone_lab',
        'nip_sales_lab',
        'id_user'
    ];

    public function formreport(): HasMany
    {
        return $this->hasMany(formReport::class, 'id_formreport', 'id_formreport');
    }
}
