@extends('layouts.app')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{ $date->format('F d') }} • {{ $date->format('Y') }} • {{ $date->format('h:m') }} • {{ $post->comments->count() }} Comments</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('storage/' . $post->main_image) }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>

            <div class="row">
                <div class="col-lg-9 mx-auto">
                    @auth
                        <form action="{{ route('post.like.store', $post->id) }}" class="py-3 d-flex justify-content-end align-items-center" method="post">
                            @csrf
                            <button class="border-0 bg-transparent">
                                <span>{{ $post->liked_users_count }}</span>
                                <i class="{{ auth()->user()->likedPosts->contains($post->id) ? "fas" : "far" }} fa-heart pl-2"></i>
                            </button>
                        </form>
                    @else
                        <div class="py-3 d-flex justify-content-end align-items-center">
                            <span>{{ $post->liked_users_count }}</span>
                            <i class="far fa-heart pl-2"></i>
                        </div>
                    @endauth  
                    

                    @if ($relatedPosts->isNotEmpty())
                        <section class="related-posts">
                            <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                            <div class="row">
                                @foreach ($relatedPosts as $relatedPost)
                                    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                        <div class="related-posts-image mb-2" style="background-image: url('{{ asset('storage/' . $relatedPost->preview_image) }}')"></div>
                                        <p class="post-category">Blog post</p>
                                        <h5 class="post-title"><a href="{{ route('post.show', $relatedPost->id) }}" style="color: black;">{{ $relatedPost->title }}</a></h5>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif
                    
                    <section class="mb-4">
                        <h2 class="section-title mb-5" data-aos="fade-up">Comments</h2>
                        @foreach ($post->comments as $comment)
                            <div class="card mb-3" data-aos="fade-up">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1">{{ $comment->user->name }}</h6>
                                        <small class="text-muted">{{ $comment->dateAsCarbon->diffForHumans() }}</small>
                                    </div>
                                    <p class="mb-0">{{ $comment->content }}</p>
                                </div>
                            </div>
                        @endforeach
                    </section>

                    @auth
                       <section class="comment-section pt-4">
                            <h2 class="section-title mb-5" data-aos="fade-up">Leave a Comment</h2>
                            <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up">
                                        <label for="content" class="sr-only">Comment</label>
                                        <textarea name="content" id="content" class="form-control" placeholder="Comment" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12" data-aos="fade-up">
                                        <input type="submit" value="Leave a Comment" class="btn btn-warning">
                                    </div>
                                </div>
                            </form>
                        </section> 
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection