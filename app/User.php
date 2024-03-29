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
        'name', 'email', 'password',
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

    public function isAdmin(){
        return $this->admin;
    }
    public function endereco(){
        return $this->hasMany(Endereco::class);
    }
    public function pedidos(){
        return $this->hasMany(Pedidos::class);
    }
    public function scopeofFilters($query){
        if(request('codigo')){
            $query->where('id',request('codigo'));
        }
        if(request('nome')){
            $query->where('name','like','%'.request('name').'%');
        }
        if(request('email')){
            $query->where('email','like','%'.request('email').'%');
        }
        return $query;
    }
}
