<?php

namespace App\Http\Controllers;

use App\Models\SnapshotTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $data = SnapshotTeam::all();
        return view('admin/data-team.index', compact('data'));
    }

    public function create()
    {
        return view('admin/data-team.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'position'     => 'required',
            'deskripsi' => 'required',
            'images'     => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);


        $images = $request->file('images');
        $filename = date('Y-m-d') . $images->getClientOriginalName();
        $path = 'images-folder/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($images));

        $data = [
            'name' => $request->name,
            'position' => $request->position,
            'deskripsi' => $request->deskripsi,
            'images' => $filename
        ];

        SnapshotTeam::create($data);
        return redirect()->route('list-team')->with('succes', 'Team berhasil dibuat');
    }

    public function edit(Request $request, $id)
    {
        $data = SnapshotTeam::find($id);

        if (!$data) {
            return redirect()->route('list-team')->with('error', 'Data tidak ditemukan');
        }
        return view('admin/data-team.update', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'     => 'required',
            'position'     => 'required',
            'deskripsi' => 'nullable',
            'images'     => 'sometimes|mimes:png,jpg,jpeg|max:2048',
        ]);

        $data = SnapshotTeam::find($id);
        if (!$data) {
            return redirect()->route('list-team')->with('error', 'Data tidak ditemukan');
        }

        $data->name = $request->name;
        $data->position = $request->position;
        $data->deskripsi = $request->deskripsi ?? $data->deskripsi;

        // Jika ada file gambar baru diupload, update gambar
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $filename = date('Y-m-d') . $images->getClientOriginalName();
            $path = 'images-folder/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($images));
            $data->images = $filename;
        }

        $data->save();

        return redirect()->route('list-team')->with('success', 'Team updated successfully');
    }

    public function delete(Request $request, $id)
    {
        $data = SnapshotTeam::find($id);

        if (!$data) {
            return redirect()->route('list-team')->with('error', 'Data tidak ditemukan!');
        }

        // Hapus gambar dari storage
        Storage::disk('public')->delete('images-folder/' . $data->images);

        // Hapus record dari database
        $data->delete();

        return redirect()->route('list-team')->with('success', 'Team deleted successfully');
    }
}
