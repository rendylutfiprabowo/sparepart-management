<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\salesSparepart;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_user',
        'username',
        'email',
        'password',
        'id_role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function sales(): HasMany
    {
        return $this->hasMany(salesSparepart::class, 'id_user', 'id_user');
    }
    public function role(): BelongsTo
    {
        return $this->belongsTo(role::class, 'id_role', 'id');
    }
    public function warehouse(): HasOne
    {
        return $this->hasOne(warehouse::class, 'id_user', 'id_user');
    }

    public function findForPassport($username)
    {
        return $this->orWhere('email', $username)->orWhere('username', $username)->first();
    }
}
