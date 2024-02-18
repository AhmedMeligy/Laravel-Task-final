<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Post;

class CheckPostOwnership
{
    public function handle($request, Closure $next)
    {
        $postId = $request->route('post');

        $post = Post::findOrFail($postId);

        if ($post->user_id !== auth()->id()) {
            return response()->json(['error' => 'You do not have permission to edit this post.'], Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
