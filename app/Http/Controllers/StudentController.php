<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();

        $data = ['student' => $student];

        return view('student.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classroom = Classroom::all();

        $data = ['classroom' => $classroom];

        return view('student.manage',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'classroom' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:student',
            'parent_number' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = $request->except('_token');
            $data['id_classroom'] = $request->classroom;
            Student::create($data);

            return redirect('student');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->withErrors(['message' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $classroom = Classroom::all();

        $data = [
            'student' => $student,
            'classroom' => $classroom,
        ];
        
        return view('student.manage',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'classroom' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:student',
            'parent_number' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = $request->except('_token');
            $data['id_classroom'] = $request->classroom;
            $student = Student::findorFail($id);
            $student->update($data);

            return redirect('student');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->withErrors(['message' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $student = Student::find($id);
        $student->delete();

        return redirect('student');
    }
}
