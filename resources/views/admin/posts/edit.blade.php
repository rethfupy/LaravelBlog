@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Edit {{ $post->title }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Posts</a></li>
                <li class="breadcrumb-item active">Edit {{ $post->title }}</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">        
                @if (session('error'))
                    <div class="alert alert-danger mb-4">
                        {{ session('error') }}
                    </div>
                @endif        

                <div class="col-12">   
                    <form action="{{ route('admin.post.update', $post->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Enter post name" value="{{ $post->title }}">
                            @error('title')
                                <div class="text-danger pl-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="content" id="summernote">@if (old('content')) {{ old('content') }} @else {{ $post->content }} @endif</textarea>
                            @error('content')
                                <div class="text-danger pl-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="offset-10 col-2">
                            <button type="submit" class="btn btn-primary w-100">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection