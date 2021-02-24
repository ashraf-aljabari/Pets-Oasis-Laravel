<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'user_email', 'user_password', 'user_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = "user";
    public $primaryKey = 'user_id';
    public $timestamps = true;

    public function posts()
    {
        return $this->hasMany(Question::class);
    }
    public function comment()
    {
        return $this->hasMany(Question_comment::class);
    }
    public function category()
    {
        return $this->hasOne(Category::class);
    }
    public function adoption()
    {
        return $this->hasMany(Adoption::class);
    }
    public function adoption_comment()
    {
        return $this->hasMany(Adoption_comment::class);
    }
    public function rescue()
    {
        return $this->hasMany(Rescue::class);
    }
    public function rescue_comment()
    {
        return $this->hasMany(Rescue_comment::class);
    }
}
