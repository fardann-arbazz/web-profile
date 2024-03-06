<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JurusanController extends Controller
{
    public function index()
    {
        $data = Jurusan::all();
        return view('admin/jurusan.index', compact('data'));
    }

    public function create()
    {
        return view('/admin/jurusan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_singkat' => 'required',
            'nama_panjang' => 'required',
            'images' => 'required|mimes:png,jpg,jpeg|max:2048',
            'deskripsi' => 'required'
        ]);

        $images = $request->file('images');
        $filename = date('Y-m-d') . $images->getClientOriginalName();
        $path = 'images-folder/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($images));

        $data = [
            'nama_singkat' => $request->nama_singkat,
            'nama_panjang' => $request->nama_panjang,
            'images' => $filename,
            'deskripsi' => $request->deskripsi
        ];

        Jurusan::create($data);
        return redirect()->route('list-jurusan')->with('success', 'Jurusan berhasil dibuat!!');
    }

    public function edit(Request $request, $id)
    {
        $data = Jurusan::find($id);
        return view('admin/jurusan.update', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_singkat' => 'required',
            'nama_panjang' => 'required',
            'images' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'deskripsi' => 'nullable'
        ]);

        $data = Jurusan::find($id);
        if (!$data) {
            return redirect()->route('list-jurusan')->with('error', 'Data jurusan tidak ditemukan');
        }

        $data->nama_singkat = $request->nama_singkat;
        $data->nama_panjang = $request->nama_panjang;
        $data->deskripsi = $request->deskripsi ?? $data->deskripsi;

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $filename = date('Y-m-d') . $images->getClientOriginalName();
            $path = 'images-folder/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($images));
            $data->images = $filename;
        }

        $data->save();

        return redirect()->route('list-jurusan')->with('success', 'Jurusan updated successfully');
    }

    public function delete(Request $request, $id)
    {
        $data = Jurusan::find($id);
        if (!$data) {
            return redirect()->route('list-jurusan')->with('error', 'Data jurusan tidak ditemukan');
        }

        Storage::disk('public')->delete('images-folder/' . $data->images);

        $data->delete();
        return redirect()->route('list-jurusan')->with('success', 'Jurusan delete successfully');
    }
}
