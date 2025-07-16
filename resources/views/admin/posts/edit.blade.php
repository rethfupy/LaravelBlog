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
                    <form action="{{ route('admin.post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Enter post name" value="{{ old('title', $post->title) }}">
                            @error('title')
                                <div class="text-danger pl-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="content" id="summernote">{{ old('content', $post->content) }}</textarea>
                            @error('content')
                                <div class="text-danger pl-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Add preview image</label>
                            <div class="w-25 mb-2">
                                <img src="{{ asset('storage/' . $post->preview_image) }}" alt="preview_image" class="w-100 rounded">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="preview_image" id="preview_image">
                                    <label class="custom-file-label" for="preview_image">Choose image</label>
                                </div>
                            </div>
                            @error('preview_image')
                                <div class="text-danger pl-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Add main image</label>
                            <div class="w-25 mb-2">
                                <img src="{{ asset('storage/' . $post->main_image) }}" alt="main_image" class="w-100 rounded">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="main_image" id="main_image">
                                    <label class="custom-file-label" for="main_image">Choose image</label>
                                </div>
                            </div>
                            @error('main_image')
                                <div class="text-danger pl-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Select category</label>
                            <select name="category_id" class="form-control">
                                <option value selected>---</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? ' selected' : '' }}>{{ $category->title }}</option>    
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-danger pl-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Select tags</label>
                            <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Tags" style="width: 100%">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : '' }}>{{ $tag->title }}</option>
                                @endforeach                                                               
                            </select>
                        </div>
                        <div class="offset-10 col-2 mb-2">
                            <button type="submit" class="btn btn-primary w-100">Update</button>
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