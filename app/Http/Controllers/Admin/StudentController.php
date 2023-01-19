<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create(){
        return view('admin.student.create');
    }

    public function index(){
        $students = student::all();

        //return response()->json($students);
        return view('admin.student.index',compact("students"));
    }

    

    public function store(Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'adress' => 'required',
        ],[
            'nama.required' => 'nama belum di masukkan',
            'adress.required' => 'alamat belum di masukkan'
        ]);

        student::create($request->all());

        return redirect()->route("student-index");
    }

    public function destroy($id){
        $student = student::where("id", $id)->first();
        $student->delete();
        
        return redirect()->route("student-index");
    }

    public function edit($id){
        $student = student::where("id", $id)->first();
        return view("admin.student.edit", compact("student"));
    }

    public function update(Request $request, $id){
        $student = student::where("id", $id)->first();
        $student->update($request->all());

        return redirect()->route("student-index");
        

    }
    
}
