@extends('layouts.user')
<style>
    .paragraph {
  white-space: pre-wrap;
}
</style>
@section('content')
      <section class="blog-detail">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
              <div class="post-block">
                <h1 class="post-title">{{$post->header}}</h1>
                <div class="blog-credit">
                  <div class="blog-credit_wrapper">
                    <h5>{{$post->user->name}}</h5>
                    <p>{{$post->created_at->format('F j, Y')}}</p>
                  </div>
                </div>
                <img class="blog-cover img-fluid" src="/storage/{{$post->image}}" alt="blog image">
                <p class="blog-pragraph"> <span></span>{{str_limit($post->content, $limit = 200, $end = '...')}}</p>
                <div class="row">
                  <div class="col-12 col-sm-6">
                      {{-- <img class="img-fluid" src="storage/{{$post->image}}" alt="post image"> --}}
                      <video controls loop poster="/storage/{{$post->video}}" width="400" height="400">
                        <source src="/storage/{{$post->video}}" type="video/mp4" >
                        <!--<source srcset="/storage/{{$post->video}}">-->
                      </video>
                  </div>
                </div>
                <h3 class="post-title">{{$post->header}}</h3>
                <p class="blog-pragraph paragraph">{{$post->content}}</p>
              </div>
              <div class="post-footer">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="post-tags">
                        <a href="#">Entertainment</a>
                        <a href="#">News</a>
                        <a href="#">Celebrity</a></div>
                  </div>
                  <div class="col-sm-6 text-sm-right">
                    <div class="post-share">
                      <p>Share: </p>
                      <div class="socials">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-dribbble"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="another-posts"><a class="arrow-control arrow-prev" href="#"><i class="arrow_left"></i></a><a class="arrow-control arrow-next" href="#"><i class="arrow_right"></i></a>
                <div class="row no-gutters">
                    @foreach ($descPosts as $descPost)
                  <div class="col-12 col-md-6"><a href=""></a>
                    <div class="another-post_block prev-post">
                      <div class="post-mini-img text-left"><a href="/posts/{{$descPost->uuid}}"><img src="/storage/{{$descPost->image}}" alt="post image"></a></div>
                      <div class="post-title">
                        <p>Previous post</p><a href="/posts/{{$descPost->uuid}}">{{$descPost->header}}</a>
                      </div>
                    </div>
                  </div>
                  @break
                  @endforeach
                  @foreach($posts as $posts)
                  <div class="col-12 col-md-6">
                    <div class="another-post_block text-right next-post">
                      <div class="post-title">
                        <p>Next post</p><a href="/posts/{{$posts->uuid}}">{{$posts->header}}</a>
                      </div>
                      <div class="post-mini-img text-right"><a href="#"><img src="/storage/{{$posts->image}}" alt="post image"></a></div>
                    </div>
                  </div>
                  @break
                  @endforeach
                </div>
              </div>
              <h1>Display Comments</h1>
              <div class="post-author-detail">
                  {{-- Comment Block --}}
                {{-- @include('partials._comment_replies', ['comments' => $posts->comments, 'post_id' => $post->id]) --}}
                {{-- <div class="row no-gutters align-items-center">
                    @foreach($post->comments as $comment)
                  <div class="col-sm-7 col-md-9">
                    <div class="author-info">
                      <h5>{{$comment->name}}</h5>
                      <p>{{$comment->body}}</p>
                    </div>
                  </div>
                  @endforeach
                </div> --}}
              </div>
              <div class="post-comment">
                <h2>Leave a comment</h2>
                {{-- <form action="{{ route('comment.add') }}" method="POST">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <input class="input-form trans-bg" name="name" type="text" placeholder="Name" required>
                    </div>
                    <div class="form-group col-md-6">
                      <input class="input-form trans-bg" name="email" type="email" placeholder="Email" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <textarea class="textarea-form trans-bg" id="messages" name="comment_body" cols="30" rows="6" placeholder="Your Comment"></textarea>
                  </div>
                  <button class="normal-btn">Add Comment</button>
                </form> --}}
              </div>
            </div>
          </div>
        </div>
      </section><!--End posts-->
@endsection