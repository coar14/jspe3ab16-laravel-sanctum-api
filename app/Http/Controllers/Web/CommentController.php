<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required|string',
        ]);

        $comment = Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->id(),
            'body' => $request->body,
        ]);

        return redirect()->route('web.posts.show', $post);
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'body' => 'sometimes|string',
        ]);

        $comment->update($request->only('body'));

        return redirect()->route('posts.show', $comment->post_id);
    }

    public function destroy(Comment $comment)
    {
        $postId = $comment->post_id;
        $comment->delete();

        return redirect()->route('posts.show', $postId);
    }
}
