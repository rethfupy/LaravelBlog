@extends('layouts.app')

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">My account</h1>
        <div class="row mt-4 mb-4 pb-4">
            <nav class="col-md-3 mb-4 mb-md-0" data-aos="fade-right">
                <div class="list-group">
                    <a href="{{ route('personal.main.index') }}" class="list-group-item list-group-item-action">Overview</a>
                    <a href="{{ route('personal.comment.index') }}" class="list-group-item list-group-item-action">Comments</a>
                    <a href="{{ route('personal.like.index') }}" class="list-group-item list-group-item-action active">Likes</a>
                    <form action="{{ route('logout') }}" method="post" class="list-group-item list-group-item-action">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </div>
            </nav>

            <div class="col-md-9" data-aos="fade-up">
                <div class="card">
                    <div class="card-body">
                        <div class="widget widget-post-list">
                            <h5 class="widget-title">Liked posts List</h5>
                            <ul class="post-list my-account-page">
                                @if ($posts->isNotEmpty())
                                    @foreach ($posts as $post)
                                        <li class="post">
                                            <a href="{{ route('post.show', $post->id) }}" class="post-permalink media px-4 rounded">
                                                <img src="{{ asset('storage/' . $post->preview_image) }}" class="rounded" alt="{{ $post->title }}">
                                                <div class="media-body d-flex justify-content-between align-items-center">
                                                    <h6 class="post-title">{{ $post->title }}</h6>
                                                    <form action="{{ route('personal.like.delete', $post->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="rounded border-0 bg-transparent personal-remove-btn">
                                                            <i class="fas fa-thumbs-down text-danger"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </a>
                                        </li>  
                                    @endforeach
                                @else
                                    <h6>You didn't like any post yet.</h6>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection