<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class managerSparepart extends Model
{
    use HasFactory;
    protected $table = 'nama_tabel_yang_berbeda';

    public function sparepart(): HasOne
    {
        return $this->hasOne(Phone::class, 'id_user', 'id_');
    }
}
