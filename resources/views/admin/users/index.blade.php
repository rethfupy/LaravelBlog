@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
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

                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary d-flex align-items-center justify-content-center">
                        Add user
                    </a>
                </div>

                <div class="col-12 mt-4">   
                    @if ($users->isNotEmpty())
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td class="text-center">{{ $user->name }}</td>
                                                <td class="text-center">{{ $user->email }}</td>
                                                <td class="text-center">{{ $user->created_at }}</td>
                                                <td class="text-center d-flex justify-content-center">
                                                    <a href="{{ route('admin.user.show', $user->id) }}" class="mr-2"><i class="far fa-eye"></i></a>
                                                    <a href="{{ route('admin.user.edit', $user->id) }}" class="mr-2"><i class="fas fa-pencil-alt"></i></a>
                                                    <form action="{{ route('admin.user.delete', $user->id) }}" method="post">
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
                        <h6 class="text-center">Users list is currently empty</h2>
                    @endif
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection