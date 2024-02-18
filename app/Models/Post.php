<?php

namespace App\Models;
use App\Events\PostCreated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['title', 'slug', 'body', 'enabled', 'published_at', 'user_id', 'image'];
    
    protected $dispatchesEvents = [
        'created' => PostCreated::class,
    ];
}


