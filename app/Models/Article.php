<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Article extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['title','sub_title','user_id','body','category'];


    protected $hidden = [
       // 'password',
       // 'remember_token',
       //'updated_at','created_at'
    ];



}
