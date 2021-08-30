<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'sexe',
        'ville',
        'pays',
        'role',
        'adresse',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
     /** 
       * public function roles()
       * {
        *    return $this->belongsToMany(Role::class,"user_role","user_id","role_id");
       * }
        *
      ** public function permission()
    *  {
     *       return $this->belongsToMany(Permission::class,"user_permission","user_id","permission_id");
    *    }
    */  

    /**
     * Vérifier si un user a un certain role
     *
     */
    public function hasRole($role)
    {
        if(Auth::user()->role=="admin")
        {
            return $role =="admin";
        }
        
        if(Auth::user()->role=="participant")
        {
            return $role =="participant";
        }

        if(Auth::user()->role=="organisateur")
        {
            return $role =="organisateur";
        }
      //  return Auth::user()->role->where("role" , $role)->first() !==null;

    }
    public function organisateur()
    {
        return $this->hasMany(Organisateur::class);
    }
    
    public function participant()
    {
        return $this->hasMany(Participant::class);
    }
    
    /* 
   public function hasRole($role)
    {
        return Auth::user()->role->where("role" , $role)->first() !==null;

    }
  
    public function hasAnyRoles($roles)
    {
        return $this->roles()->whereIn("nom__role" , $roles)->first() !==null;
    }
    */

    

}
