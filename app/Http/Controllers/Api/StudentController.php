<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = student::with("major")->paginate(5);

        return response()->json([
            "succes" => true,
            "messege" => "succes get data student",
            "data" => $students
        ], 200);

        //return response()->json($students);
        // return view('admin.student.index',compact("students"));
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'adress' => 'required',
            'major_id' => 'required',
        ]);

        $stundent = student::create($request->all());
        return response()->json([
            "succes" => true,
            "messege" => "succes store data student",
            "data" => $stundent
        ], 200);

        // return redirect()->route("student-index")->with('status', 'Sukses Tambah Data Siswa');
    }

    public function destroy($id){
        $student = student::where("id", $id)->first();
        $student->delete();
        
        return response()->json([
            "succes" => true,
            "messege" => "succes store data student"
        ], 200);
    }
}
