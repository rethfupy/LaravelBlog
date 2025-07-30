@extends('layouts.app')

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">My account</h1>
        <div class="row mt-4 mb-4 pb-4">
            <nav class="col-md-3 mb-4 mb-md-0" data-aos="fade-right">
                <div class="list-group">
                    <a href="{{ route('personal.main.index') }}" class="list-group-item list-group-item-action">Overview</a>
                    <a href="{{ route('personal.comment.index') }}" class="list-group-item list-group-item-action active">Comments</a>
                    <a href="{{ route('personal.like.index') }}" class="list-group-item list-group-item-action">Likes</a>
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
                            <h5 class="widget-title">Comments List</h5>
                            <ul class="post-list my-account-page">
                                @if ($comments->isNotEmpty())
                                    @foreach ($comments as $comment)
                                        <li class="post mb-2">
                                            <a href="{{ route('post.show', $comment->post_id) }}" class="post-permalink media px-4 rounded">
                                                <div class="media-body d-flex justify-content-between align-items-center">
                                                    <h6 class="post-title">{{ $comment->content }}</h6>
                                                    <form action="{{ route('personal.comment.delete', $comment->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="rounded border-0 bg-transparent personal-remove-btn">
                                                            <i class="fas fa-trash text-danger"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </a>
                                        </li>  
                                    @endforeach
                                @else
                                    <h6>You don't have comments yet.</h6>
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