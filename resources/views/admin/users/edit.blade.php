@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Edit {{ $user->title }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Users</a></li>
                <li class="breadcrumb-item active">Edit {{ $user->title }}</li>
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
                    <form action="{{ route('admin.user.update', $user->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label>Select role</label>
                            <select name="role_id" class="form-control">
                                @foreach ($roles as $id => $role)
                                    <option value="{{ $id }}" {{ $id == $user->role_id ? ' selected' : '' }}>{{ $role }}</option>    
                                @endforeach
                            </select>
                            @error('role_id')
                                <div class="text-danger pl-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Enter user name" value="{{ $user->name }}">
                            @error('name')
                                <div class="text-danger pl-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Enter user email" value="{{ $user->email }}">
                            @error('email')
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