<?php

namespace App\Http\Controllers;

use App\Models\SnapshotBackground;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BackgroundController extends Controller
{
    public function index()
    {
        $data = SnapshotBackground::all();
        return view('admin/data-background.background', compact('data'));
    }

    public function create()
    {
        return view('admin/data-background.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required',
            'deskripsi' => 'required',
            'image'     => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);


        $images = $request->file('image');
        $filename = date('Y-m-d') . $images->getClientOriginalName();
        $path = 'images-folder/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($images));

        $data = [
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'image' => $filename
        ];

        SnapshotBackground::create($data);
        return redirect()->route('list-background')->with('succes', 'Background berhasil dibuat');
    }

    public function edit(Request $request, $id)
    {
        $data = SnapshotBackground::find($id);

        if (!$data) {
            return redirect()->route('list-background')->with('error', 'Data tidak ditemukan');
        }
        return view('admin/data-background.update', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'     => 'required',
            'deskripsi' => 'required',
            'image'     => 'sometimes|mimes:png,jpg,jpeg|max:2048',
        ]);

        $data = SnapshotBackground::find($id);
        if (!$data) {
            return redirect()->route('list-background')->with('error', 'Data tidak ditemukan');
        }

        $data->title = $request->title;
        $data->deskripsi = $request->deskripsi;

        // Jika ada file gambar baru diupload, update gambar
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $filename = date('Y-m-d') . $images->getClientOriginalName();
            $path = 'images-folder/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($images));
            $data->image = $filename;
        }

        $data->save();

        return redirect()->route('list-background')->with('success', 'Background updated successfully');
    }

    public function delete(Request $request, $id)
    {
        $data = SnapshotBackground::find($id);

        if (!$data) {
            return redirect()->route('list-background')->with('error', 'Data tidak ditemukan!');
        }

        // Hapus gambar dari storage
        Storage::disk('public')->delete('images-folder/' . $data->image);

        // Hapus record dari database
        $data->delete();

        return redirect()->route('list-background')->with('success', 'Background deleted successfully');
    }
}
