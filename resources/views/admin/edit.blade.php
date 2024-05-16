@extends('/admin.layouts.master')
@section('title', 'Edit Staff Information')


@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('Edit Staff') }}</h1>
<p class="mb-4"><b><i>{{ __('Profile') }}</i></b></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger d-inline float-left"><b>{{ __('TechQuest Stem Academy') }}</b></h6>
        <!-- <button class="btn btn-danger float-right"><i class="fa fa-plus mr-2"></i>{{ __('Edit Staff') }}</button> -->
    </div>
    <div class="card-body">
        <div class="">
            <h3>Edit Staff</h3>
            @if (session()->has('success'))
                <p class="alert alert-success">
                    {{ session()->get('success') }}
                </p>
            @endif

            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form action="{{ route('admin.update', $users->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 form-group">
                        <input type="text" name="name" id="name" value="{{ $users->name }}" class="form-control" placeholder="Full Name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 form-group">
                        <select name="role" id="role" class="form-control">
                            <option value="">Select role</option>
                            <option value="admin">admin</option>
                            <option value="user">user</option>
                        </select>
                    </div>
                    <div class="col-6 form-group">
                        <input type="text" name="position" value="{{ $users->position }}" id="position" class="form-control" placeholder="Position">
                    </div>
                </div>
                <div class="row">
                <div class="col-12 form-group">
                        <input type="text" name="office" id="office" value="{{ $users->office }}" class="form-control" placeholder="Office">
                    </div>
                    </div>
                <div class="row">
                    <div class="col-6 form-group">
                        <input type="number" name="age" value="{{ $users->age }}" id="age" class="form-control" placeholder="Age">
                    </div>
                    <div class="col-6 form-group">
                        <input type="date" name="startdate" value="{{ $users->startdate }}" id="startdate" class="form-control" placeholder="Start Date">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 form-group">
                        <input type="text" name="salary" value="{{ $users->salary }}" id="salary" class="form-control" placeholder="Salary">
                    </div>
                    <div class="col-12 form-group">
                        <input type="email" name="email" value="{{ $users->email }}" disabled id="email" class="form-control" placeholder="Email Address">
                    </div>
                    <div class="col-12 form-group">
                        <input type="password" name="password" value="{{ $users->password }}" disabled id="password" class="form-control" placeholder="Password">
                    </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-danger">Update Staff Information</button>
                    </div>
            </form>
        </div>
    </div>
</div>

</div>
@endsection
