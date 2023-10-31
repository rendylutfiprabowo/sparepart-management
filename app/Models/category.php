<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class category extends Model
{
    use HasFactory;
    protected $table = 'category';
    public $timestamps = false;

    protected $fillable = [
        'id_category',
        'nama_category',
    ];



    public function sparepart(): HasMany
    {
        return $this->HasMany(sparepart::class, 'id_category', 'id_category');
    }
}
