@extends('layouts.app')

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
        <section class="featured-posts-section pb-4 mb-4">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                        <div class="blog-post-thumbnail-wrapper">
                            <img src="{{ asset('storage/' . $post->preview_image) }}" alt="{{ $post->title }}">
                        </div>
                        <p class="blog-post-category">{{ $post->category->title }}</p>
                        <a href="#" class="blog-post-permalink">
                            <h6 class="blog-post-title">{{ $post->title }}</h6>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="mx-auto" style="margin-top: -80px;" data-aos="fade-up">{{ $posts->links() }}</div>
            </div>
        </section>
        <div class="row">
            <div class="col-md-8">
                <section>
                    <div class="row blog-post-row">
                        @foreach ($randomPosts as $post)
                            <div class="col-md-6 blog-post" data-aos="fade-up">
                                <div class="blog-post-thumbnail-wrapper">
                                    <img src="{{ asset('storage/' . $post->preview_image) }}" alt="{{ $post->title }}">
                                </div>
                                <p class="blog-post-category">{{ $post->category->title }}</p>
                                <a href="#!" class="blog-post-permalink">
                                    <h6 class="blog-post-title">{{ $post->title }}</h6>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    
                </section>
            </div>
            <div class="col-md-4 sidebar" data-aos="fade-left">
                {{-- 
                <div class="widget widget-post-carousel">
                    <h5 class="widget-title">Featured Posts</h5>
                    <div class="post-carousel">
                        <div id="carouselId" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselId" data-slide-to="1"></li>
                                <li data-target="#carouselId" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <figure class="carousel-item active">
                                    <img src="assets/images/blog_widget_carousel.jpg" alt="First slide">
                                    <figcaption class="post-title">
                                        <a href="#!">Front becomes an official Instagram Marketing Partner</a>
                                    </figcaption>
                                </figure>
                                <figure class="carousel-item">
                                        <img src="assets/images/blog_7.jpg" alt="First slide">
                                        <figcaption class="post-title">
                                            <a href="#!">Front becomes an official Instagram Marketing Partner</a>
                                        </figcaption>
                                </figure>
                                <div class="carousel-item">
                                        <img src="assets/images/blog_5.jpg" alt="First slide">
                                        <figcaption class="post-title">
                                            <a href="#!">Front becomes an official Instagram Marketing Partner</a>
                                        </figcaption>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                --}}              
                <div class="widget widget-post-list">
                    <h5 class="widget-title">Popular Posts</h5>
                    <ul class="post-list">
                        @foreach ($likedPost as $post)
                            <li class="post">
                                <a href="#!" class="post-permalink media px-2">
                                    <div
                                        class="rounded mr-2 image-list-container"
                                        style="background-image: url('{{ asset('storage/' . $post->preview_image) }}')"
                                    ></div>
                                    <div class="media-body">
                                        <h6 class="post-title">{{ $post->title }}</h6>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                {{--  
                <div class="widget">
                    <h5 class="widget-title">Categories</h5>
                    <img src="assets/images/blog_widget_categories.jpg" alt="categories" class="w-100">
                </div>
                --}}
            </div>
        </div>
    </div>
</main>
@endsection