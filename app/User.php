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
<<<<<<< HEAD
        'name', 'display_name'
=======
        'name', 'display_name', 'password',
>>>>>>> 304a425c657b9690d9b4f1c2a04c64345e65dac4
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
<<<<<<< HEAD
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
=======

    public function likes(){
        return $this->hasmany("App\Models\Like");
    }

    public function musics(){
        return $this->hasmany("App\Models\Music");
>>>>>>> 304a425c657b9690d9b4f1c2a04c64345e65dac4
    }
}
