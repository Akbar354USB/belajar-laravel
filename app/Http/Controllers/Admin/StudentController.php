<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create(){
        $major = Major::all();
        return view('admin.student.create', compact("major"));
    }

    public function index(Request $request){
        $students = student::paginate(5);

        $filterKeyword = $request->get('nama');
        if($filterKeyword){
        $students = student::where("nama", "LIKE",
        "%$filterKeyword%")->paginate(5);
        }


        //return response()->json($students);
        return view('admin.student.index',compact("students"));
    }

    

    public function store(Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'adress' => 'required',
            'major_id' => 'required',
        ],[
            'nama.required' => 'nama belum di masukkan',
            'major_id.required' => 'jurusan belum di masukkan',
            'adress.required' => 'alamat belum di masukkan'
        ]);

        student::create($request->all());

        return redirect()->route("student-index")->with('status', 'Sukses Tambah Data Siswa');
    }

    public function destroy($id){
        $student = student::where("id", $id)->first();
        $student->delete();
        
        return redirect()->route("student-index")->with('status', 'Sukses Hapus Data Siswa');
    }

    public function edit($id){
        $student = student::where("id", $id)->first();
        $major = Major::all();
        return view("admin.student.edit", compact("student","major"));
    }

    public function update(Request $request, $id){
        $student = student::where("id", $id)->first();
        $student->update($request->all());

        return redirect()->route("student-index")->with('status', 'Sukses Update Data Siswa');;
        

    }
    
}
