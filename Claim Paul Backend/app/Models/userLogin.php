<?php

namespace App\Models;
//use Illuminate\Foundation\Auth\userLogin as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class userLogin extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    //protected $table='user_logins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    // protected $fillable = [
        
    //     'email',
    //     'password',
    //     'role',
    //     'isDeleted'
    // ];

     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password',
        
    // ];

}
