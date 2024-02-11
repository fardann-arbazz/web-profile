<?php

namespace App\Http\Controllers;

use App\Models\SnapshotGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $data = SnapshotGallery::all();
        return view('admin/data-gallery.index', compact('data'));
    }

    public function create()
    {
        return view('admin/data-gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required',
            'deskripsi' => 'required',
            'images'    => 'required|mimes:png,jpg,jpeg|max:2048',
            'url'       => 'required'
        ]);


        $images = $request->file('images');
        $filename = date('Y-m-d') . $images->getClientOriginalName();
        $path = 'images-folder/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($images));

        $data = [
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'images' => $filename,
            'url' => $request->url,
        ];

        SnapshotGallery::create($data);
        return redirect()->route('list-gallery')->with('succes', 'Gallery berhasil dibuat');
    }

    public function edit(Request $request, $id)
    {
        $data = SnapshotGallery::find($id);

        if (!$data) {
            return redirect()->route('list-gallery')->with('error', 'Data tidak ditemukan');
        }
        return view('admin/data-gallery.update', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'     => 'required',
            'deskripsi' => 'nullable',
            'images'     => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'url'     => 'required',
        ]);

        $data = SnapshotGallery::find($id);
        if (!$data) {
            return redirect()->route('list-gallery')->with('error', 'Data tidak ditemukan');
        }

        $data->title = $request->title;
        $data->deskripsi = $request->deskripsi ?? $data->deskripsi;
        $data->url = $request->url;

        // Jika ada file gambar baru diupload, update gambar
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $filename = date('Y-m-d') . $images->getClientOriginalName();
            $path = 'images-folder/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($images));
            $data->images = $filename;
        }

        $data->save();

        return redirect()->route('list-gallery')->with('success', 'Gallery updated successfully');
    }

    public function delete(Request $request, $id)
    {
        $data = SnapshotGallery::find($id);

        if (!$data) {
            return redirect()->route('list-gallery')->with('error', 'Data tidak ditemukan!');
        }

        // Hapus gambar dari storage
        Storage::disk('public')->delete('images-folder/' . $data->images);

        // Hapus record dari database
        $data->delete();

        return redirect()->route('list-gallery')->with('success', 'Gallery deleted successfully');
    }
}
