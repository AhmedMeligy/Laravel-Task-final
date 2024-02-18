<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model implements Authenticatable
{
    use HasFactory, AuthenticableTrait;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    protected $fillable = [
        'name',
        'email',
        'password',
        '_token',
    ];
}
