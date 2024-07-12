<!-- resources/views/comments/_comment.blade.php -->
<div>
    <p>{{ $comment->body }}</p>
    <small>By: {{ $comment->user->name }}</small>
    <form method="POST" action="{{ route('comments.destroy', $comment) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Comment</button>
    </form>
</div>
