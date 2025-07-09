@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Tags</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Tags</li>
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
                <div class="col-12 d-flex align-items-stretch justify-content-between">
                    @if (session('success'))
                        <div class="alert alert-success mb-0 w-75">
                            {{ session('success') }}
                        </div>
                    @elseif (session('error'))
                        <div class="alert alert-danger mb-0 w-75">
                            {{ session('error') }}
                        </div>
                    @else
                        <div class="w-75"></div>
                    @endif

                    <a href="{{ route('admin.tag.create') }}" class="btn btn-primary d-flex align-items-center justify-content-center">
                        Add tag
                    </a>
                </div>

                <div class="col-12 mt-4">   
                    @if ($tags->isNotEmpty())
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th class="text-center">Title</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tags as $tag)
                                            <tr>
                                                <td>{{ $tag->id }}</td>
                                                <td class="text-center">{{ $tag->title }}</td>
                                                <td class="text-center">{{ $tag->created_at }}</td>
                                                <td class="text-center d-flex justify-content-center">
                                                    <a href="{{ route('admin.tag.show', $tag->id) }}" class="mr-2"><i class="far fa-eye"></i></a>
                                                    <a href="{{ route('admin.tag.edit', $tag->id) }}" class="mr-2"><i class="fas fa-pencil-alt"></i></a>
                                                    <form action="{{ route('admin.tag.delete', $tag->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="border-0 bg-transparent ml-0 pl-0"><i class="fas fa-trash text-danger" role="button"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                            </div>                            
                        </div>
                    @else
                        <h6 class="text-center">Tags list is currently empty</h2>
                    @endif
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection