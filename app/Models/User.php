<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    // protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'level',
        'nohp'
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
    ];

    public function pengadu()
    {
        return $this->hasMany(DataPengaduan::class);
    }

    public function biodata()
    {
        return $this->hasMany(Customer::class, 'user_id');
    }

    public function order()
    {
        return $this->hasMany(Transaksi::class, 'user_id');
    }
}
