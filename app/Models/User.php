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
    protected $fillable = [
        'name',
        'email',
        'password',
        'img',
        'phone',
        'country_id',
        'job_id',
        'role_id',
        'hospital_id',
        'type',
        'email_verified_at'
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
    protected $guard = 'web';
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    function country()
    {
        return $this->belongsTo(Country::class);
    }
    function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    function job()
    {
        return $this->belongsTo(Job::class);
    }
    function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
    function operations()
    {
        return $this->hasMany(Operation::class);
    }
    function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    function role() {
         return $this->belongsTo(Role::class);
    }
}
