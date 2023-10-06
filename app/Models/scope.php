<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class scope extends Model
{
    use HasFactory;
    protected $table = 'scope';

    protected $fillable = [
        'id_scope',
        'nama_scope',
    ];
    
    public function samples() : HasOne 
    {
        return $this-> hasOne(sample:: class, 'id_scope','id_Scope');
    }
}
