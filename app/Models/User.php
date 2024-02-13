<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_name',
        'first_name',
        'last_name',
        'password',
        'profile_picture',
        'phone',
        'mail',
        'facebook_link',
        'instagram_link',
        'about_me'
    ];
}
