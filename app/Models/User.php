<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function students()
    {
        return $this->hasOne(Student::class);
    }
    public function teachers()
    {
        return $this->hasOne(Tecaher::class);
    }

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'name',
        'gender',
        'status',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];
}
