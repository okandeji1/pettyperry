@foreach($comments as $comment)
    <div class="display-comment">
        <strong>{{ $comment->name }}</strong>
        <p>{{ $comment->body }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('reply.add') }}">
            @csrf
            <div class="form-group">
                <textarea class="textarea-form trans-bg" name="comment_body" placeholder="Your Comment" required></textarea>
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="input-form trans-bg" name="name" required placeholder="Your name">
            </div>
            <div class="form-group col-md-6">
                <input type="email" class="input-form trans-bg" name="email" required placeholder="Your Email">
            </div>
            <div class="form-group">
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
            </div>
            <div class="form-group">
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('partials._comment_replies', ['comments' => $comment->replies])
    </div>
@endforeach
