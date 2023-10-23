<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class category extends Model
{
    use HasFactory;
    protected $table = 'category';

    protected $fillable = [
        'id_category',
        'nama_category',
    ];



    public function sparepart(): HasOne
    {
        return $this->HasOne(sparepart::class, 'id_category', 'id_category');
    }
}
