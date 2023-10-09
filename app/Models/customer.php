<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class customer extends Model
{
    use HasFactory;
    protected $table = 'customer';

    public $timestamps = false;

    protected $fillable = [
        'id_customer',
        'nama_customer',
        'phone_customer',
        'email_customer',
        'jenisusaha_customer',
        'id_user'
    ];

    public function projects(): HasMany
    {
        return $this->hasMany(project::class, 'id_project', 'id_project');
    }
}
