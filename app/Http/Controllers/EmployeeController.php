<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Employee::where('nama', 'LIKE', '%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Employee::paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }
        
        return view('datapegawai', compact('data'));
    }
    public function tambahpegawai()
    {
        return view('tambahdata');
    }
    public function insertdata(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:7|max:20',
            'notelpon' => 'required|min:7|max:20',
        ]);
        $data = Employee::create($request->all());
        if ($request->hasfile('foto')) {
            $request->file('foto')->move('fotopegawai/' ,$request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('success', 'Data Berhasil di Tambahkan');
    }
    public function tampilkandata($id)
    {
        $data = Employee::find($id);
        return view('tampildata', compact('data'));
    }
    public function updatedata(Request $request, $id)
    {
        $data = Employee::find($id);
        $data->update($request->all());
        if (Session('halaman_url')) {
            return redirect(session('halaman_url'))->with('success', 'Data Berhasil di Update'); 
        }
        return redirect()->route('pegawai')->with('success', 'Data Berhasil di Update');
    }
    public function deletedata($id)
    {
        $data = Employee::find($id);
        $data->delete();

        return redirect()->route('pegawai')->with('success', 'Data Berhasil di Hapus');
    }
}
