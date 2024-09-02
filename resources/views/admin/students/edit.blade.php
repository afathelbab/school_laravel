@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
        <div class="card">

        @if($errors->any())
            <alert class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>                        
                    @endforeach
                </ul> 
            </alert>
            @endif
            @if (Session::has('msg'))
                <div class="alert alert-success">{{Session::get('msg')}}</div>
             @endif
            <form class="form-horizontal" action="{{ route('students.update', $student->code) }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row">
                <label
                    for="name"
                    class="col-sm-3 text-end control-label col-form-label"
                    >Name</label>
                <div class="col-sm-9">
                    <input
                    type="text"
                    class="form-control"
                    id="name"
                    placeholder="Enter Name Here"
                    name="name"
                    value="{{ $student->name }}"
                    />
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                </div>
                <div class="form-group row">
                <label
                    for="email"
                    class="col-sm-3 text-end control-label col-form-label"
                    >Email</label
                >
                <div class="col-sm-9">
                    <input
                    type="email"
                    class="form-control"
                    id="email"
                    placeholder="Email Here"
                    name="email"
                    value="{{ $student->email }}"
                    />
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                </div>
                <div class="form-group row">
                <label
                    for="phone"
                    class="col-sm-3 text-end control-label col-form-label"
                    >Phone</label
                >
                <div class="col-sm-9">
                    <input
                    type="text"
                    class="form-control"
                    id="phone"
                    placeholder="Phone Here"
                    name="phone"
                    value="{{ $student->phone }}"
                    />
                    @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                </div>
                
                <div class="form-group row">
                <label
                    for="department_id"
                    class="col-sm-3 text-end control-label col-form-label"
                    >Department</label
                >
                <div class="col-sm-9">
                    <select class="form-control" name="department_id">
                        @foreach ($departments as $department)
                            <option value="{{ $department->department_id }}" {{ $student->department_id == $department->department_id ? 'selected' : '' }}>{{ $department->department_name }}</option>
                        @endforeach
                    </select>
                </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                <button type="submit" class="btn btn-primary">
                    Update
                </button>
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>
@endsection
