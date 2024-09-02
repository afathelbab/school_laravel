<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Department;
use App\Models\student;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = student::get(); // SELECT * FROM students
        
        return view('admin.students.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::get();
        return view('admin.students.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        $student = new student();
        $student->code = $request->code;
        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->department_id = $request->department_id;
        $student->save();
        return redirect()->back()->with('msg', 'Added Successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student=student::findOrFail($id);
        //return $data->department->department_name;
        return view('admin.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student=student::findOrFail($id);
        $departments=Department::get();
        return view('admin.students.edit', compact('student','departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, $id)
    {
        $student=student::findOrFail($id);

        $student->update(
            [
                'name'=>$request->name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'department_id'=>$request->department_id,
            ]
            );
        //dd($request->all());
            return redirect()->back()->with('msg', 'Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student=student::findOrFail($id);
        $student->delete();
        return redirect()->back()->with('msg', 'Deleted Successfully!');
    }

    public function archive()
    {
        $data=student::onlyTrashed()->get();
        return view('admin.students.archive', compact('data'));
    }

    public function forceDelete($id)
    {
        $student = student::withTrashed()->where('code',$id);
        $student->forceDelete();
        return redirect()->back()->with('msg', 'Deleted Permenantly!');
    }

    public function restore($id)
    {
        $student = student::withTrashed()->where('code',$id);
        $student->restore();
        return redirect()->route('students.index')->with('msg', 'Restored Successfully!');
    }
}
