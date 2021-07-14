<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Comment extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['user_id','body','articles_id'];


    protected $hidden = [
       // 'password',
       // 'remember_token',
       //'updated_at','created_at'
    ];



}
