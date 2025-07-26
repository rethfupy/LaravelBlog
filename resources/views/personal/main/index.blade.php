@extends('layouts.app')

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">My account</h1>
        <div class="row mt-4 mb-4 pb-4">
            <nav class="col-md-3 mb-4 mb-md-0" data-aos="fade-right">
                <div class="list-group">
                    <a href="{{ route('personal.main.index') }}" class="list-group-item list-group-item-action active">Overview</a>
                    <a href="{{ route('personal.comment.index') }}" class="list-group-item list-group-item-action">Comments</a>
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
                        <h5 class="card-title">Welcome to Your Account</h5>
                        <p class="card-text">This is your personal dashboard where you can manage your profile and review activity.</p>
                        <div class="row mt-4">
                            <div class="col-sm-6 col-12 mb-4">
                                <div class="card text-white bg-main-color h-100">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div>
                                            <h3 class="mb-1">{{ $data['likesCount'] }}</h3>
                                            <p class="mb-0">Likes</p>
                                        </div>
                                        <i class="fas fa-thumbs-up" style="font-size: 50px;"></i>
                                    </div>
                                    <div class="card-footer text-white bg-main-color border-0">
                                        <a href="{{ route('personal.like.index') }}" class="text-white text-decoration-none">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-12 mb-4">
                                <div class="card text-white bg-main-color h-100">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div>
                                            <h3 class="mb-1">{{ $data['commentsCount'] }}</h3>
                                            <p class="mb-0">Comments</p>
                                        </div>
                                        <i class="fas fa-comments" style="font-size: 50px;"></i>
                                    </div>
                                    <div class="card-footer text-white bg-main-color border-0">
                                        <a href="{{ route('personal.comment.index') }}" class="text-white text-decoration-none">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection