@extends('admin.layout.master')

@section('style')
    <link
        href="{{ asset('dashboard/assets') }}/css/dataTables.bootstrap4.css"
        rel="stylesheet"
    />

@endsection

@section('content')
    <div class="row">
        <div class="col-12">
        <div class="card">
        @if (Session::has('msg'))
            <div class="alert alert-success">{{Session::get('msg')}}</div>
        @endif
            <div class="card-body">
                <h5 class="card-title">Basic Datatable</h5>
                <div class="table-responsive">
                <table
                    id="zero_config"
                    class="table table-striped table-bordered"
                >
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $student)
                    <tr>
                        <td>{{ $student->code }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->department->department_name }}</td>
                        <td>
                            <a href="{{ route('students.show', $student->code) }}" class="btn btn-primary">Show</a>
                            <a href="{{ route('students.edit', $student->code) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('students.destroy', $student->code) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('dashboard/assets') }}/js/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $("#zero_config").DataTable();
    </script>
@endsection

