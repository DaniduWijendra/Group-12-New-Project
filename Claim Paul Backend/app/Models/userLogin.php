<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class userLogin extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table='user_logins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        
        'email',
        'password',
        'role',
        'isDeleted'
    ];
}
