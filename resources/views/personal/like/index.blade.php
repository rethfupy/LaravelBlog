@extends('layouts.app')

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">My account</h1>
        <div class="row mt-4 mb-4 pb-4">
            <nav class="col-md-3 mb-4 mb-md-0">
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

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <!-- -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection