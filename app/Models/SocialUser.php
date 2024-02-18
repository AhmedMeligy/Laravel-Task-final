<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'provider' , 
        'provider_user_id',
        'token'
    ];
    public function user(){
        return $this->belongsto(User::class);
    }


}
