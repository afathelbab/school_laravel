@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
        <div class="card">

            <form class="form-horizontal" action="{{ route('students.index') }}" enctype="multipart/form-data" method="get">
            @csrf
            
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
                    disabled
                    />
                    
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
                    disabled
                    />
                    
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
                    disabled
                    />
                    
                </div>
                </div>
                
                <div class="form-group row">
                <label
                    for="department"
                    class="col-sm-3 text-end control-label col-form-label"
                    >Department</label
                >
                <div class="col-sm-9">
                    <input
                    type="text"
                    class="form-control"
                    id="department"
                    name="department"
                    value="{{ $student->department->department_name }}"
                    disabled
                    />
                    
                </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                <button type="submit" class="btn btn-primary">
                    Back to Main Students Page
                </button>
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>
@endsection
