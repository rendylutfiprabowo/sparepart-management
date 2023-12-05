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

    public $timestamps = false;

    protected $fillable = [
        'id_scope',
        'nama_scope',
    ];
    
    public function samples() : HasMany 
    {
        return $this-> hasMany(sample:: class, 'id_scope','id_Scope');
    }
    public function form() : HasOne 
    {
        return $this-> hasOne(form::class, 'id_scope','id_scope');
    }
}
