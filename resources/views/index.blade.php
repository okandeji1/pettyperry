@extends('layouts.user')
@section('content')
@if(count($posts) > 0)
<section class="posts blog-news">
  <div class="container">
    <div class="blog-news_bundle">
      <div class="row no-gutters">
       @foreach($descPosts as $descPost)
        <div class="col-12 col-lg-6">
          <div class="post-classic-tib big-post" style="background-image: url('storage/posts/{{$descPost->image}}')">
            <div class="post-detail">
              <div class="post-credit">
                <div class="post-tag"><a href="#">{{$descPost->category->name}}</a></div>
              </div><a class="post-title title" href="/posts/{{$descPost->uuid}}">{{$descPost->header}}</a>
              <div class="post-credit">
                <div class="author">
                  <h5 class="author-name">{{$descPost->user->firstname}}</h5>
                </div>
              </div>
            </div>
            <div class="post-overlay"></div>
          </div>
        </div>
        @break
        @endforeach
        <div class="col-12 col-lg-6">
          <div class="row no-gutters">
            @foreach($ascPosts->chunk(2) as $row)
            @foreach($row as $ascPost)
            <div class="col-12 col-sm-6 col-lg-6">
              <div class="post-classic-tib mini-post" style="background-image: url('storage/posts/{{$ascPost->image}}')">
                <div class="post-detail">
                  <div class="post-credit">
                    <div class="post-tag"><a href="#">{{$ascPost->category->name}}</a></div>
                  </div><a class="post-title title" href="/posts/{{$ascPost->uuid}}">{{$ascPost->header}}</a>
                  <div class="post-credit">
                    <div class="author">
                      <h5 class="author-name">{{$ascPost->user->firstname}}</h5>
                    </div>
                  </div>
                </div>
                <div class="post-overlay"></div>
              </div>
            </div>
            @endforeach
            @break
            @endforeach
            @foreach($posts as $post)
            <div class="col-lg-12">
              <div class="post-classic-tib mini-post" style="background-image: url('storage/posts/{{$post->image}}')">
                <div class="post-detail">
                  <div class="post-credit">
                    <div class="post-tag"><a href="">{{$post->category->name}}</a></div>
                  </div><a class="post-title title" href="/posts/{{$post->uuid}}">{{$post->header}}</a>
                  <div class="post-credit">
                    <div class="author">
                      <h5 class="author-name">{{$post->user->firstname}}</h5>
                    </div>
                  </div>
                </div>
                <div class="post-overlay"></div>
              </div>
            </div>
            @break
            @endforeach
          </div>
        </div>
      </div>
    </div>



    <div class="blog-news_bundle lastest-post-bundle">
      <h1 class="bundle-title">Latest Posts</h1>
      <div class="row">
      @foreach($posts->chunk(2) as $row)
      @foreach($row as $post)
        <div class="col-12 col-md-6">
          <div class="post-block post-classic">
            <div class="post-img"><img src="storage/posts/{{$post->image}}" alt="post image"></div>
            <div class="post-detail"><a class="post-title regular" href="/posts/{{$post->uuid}}">{{$post->header}}</a>
              <div class="post-credit">
                <div class="author"><a class="author-avatar" href="#"><img src="user/images/avatar/avatar-1.png" alt="auhtor"></a>
                  <h5 class="author-name">{{$post->user->firstname}}</h5>
                </div>
                <h5 class="upload-day">{{$post->created_at->format('F j, Y')}}</h5>
                <div class="post-tag"><a href="#">{{$post->category->name}}</a></div>
              </div>
              <p class="post-describe">{{str_limit($post->content, $limit = 100, $end = '...')}}</p>
            </div>
          </div>
        </div>
        @endforeach
        @break
        @endforeach
        @foreach($posts->chunk(4) as $row)
        @foreach($row as $post)
        <div class="col-12 col-sm-6 col-md-3">
          <div class="post-block post-classic mini-post-classic">
            <div class="post-img"><img src="storage/posts/{{$post->image}}" alt="post image"></div>
            <div class="post-detail">
              <div class="post-credit">
                <div class="post-tag"><a href="#">{{$post->category->name}}</a></div>
              </div><a class="post-title small" href="/posts/{{$post->uuid}}">{{$post->header}}</a>
              <div class="post-credit">
                <div class="author">
                  <h5 class="author-name">{{$post->user->firstname}}</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        @break
        @endforeach
      </div>
    </div>
    <div class="blog-news_bundle recent-view-bundle">
      <h1 class="bundle-title">Recent view</h1>
      @foreach($posts->chunk(3) as $row)
      <div class="row">
         @foreach($row as $post)
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="post-mini_block"><img src="storage/posts/{{$post->image}}" alt="post image">
            <div class="post-detail">
              <div class="post-credit">
                <div class="post-tag"><a href="#">{{$post->category->name}}</a></div>
              </div><a class="post-title title-small" href="/posts/{{$post->uuid}}">{{$post->header}}</a>
              <div class="post-credit">
                <div class="author">
                  <h5 class="author-name">{{$post->user->firstname}}</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
         @endforeach
      </div>
      @endforeach
    </div>
  </div>
</section><!--End news-->
<section class="instagram">
  <div class="container">
    @foreach ($posts->chunk(6) as $row) 
    <div class="instagram-posts">
      @foreach ($row as $post) 
      <a class="instagram-img_block" href="/posts/{{$post->uuid}}">
        <img src="storage/posts/{{$post->image}}" alt="instagram post">
        <div class="instagram-post_block">
          <i class="fab fa-instagram"></i>
          <p>{{str_limit($post->content, $limit = 30, $end = '...')}}</p>
        </div>
      </a>
      @endforeach
      @break
    </div>
    @endforeach
  </div>
</section><!--End instagram-->
@else
 <p>No posts found</p>
@endif
@endsection