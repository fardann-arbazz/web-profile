<?php

namespace App\Http\Controllers;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $data = News::all();

        foreach ($data as $row) {
            $row->formatted_tanggal = Carbon::parse($row->tanggal)->format('d M Y');
        }

        return view('admin/news.index', compact('data'));
    }

    public function create()
    {
        return view('admin/news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'deskripsi' => 'required',
            'images' => 'required|mimes:png,jpg,jpeg|max:2048',
            'tanggal' => 'required'
        ]);

        $images = $request->file('images');
        $filename = date('Y-m-d') . $images->getClientOriginalName();
        $path = 'images-folder/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($images));

        $data = [
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'images' => $filename,
            'tanggal' => $request->tanggal
        ];

        News::create($data);
        return redirect()->route('list-news')->with('succes', 'News berhasil dibuat!!');
    }

    public function edit(Request $request, $id)
    {
        $data = News::find($id);
        if (!$data) {
            return redirect()->route('list-news')->with('error', 'Data news tidak ditemukan');
        }
        return view('admin/news.update', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'deskripsi' => 'nullable',
            'images' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'tanggal' => 'required'
        ]);

        $data = News::find($id);
        if (!$data) {
            return redirect()->route('list-news')->with('error', 'Data news tidak ditemukan');
        }

        $data->title = $request->title;
        $data->deskripsi = $request->deskripsi ?? $data->deskripsi;
        $data->tanggal = $request->tanggal;

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $filename = date('Y-m-d') . $images->getClientOriginalName();
            $path = 'images-folder/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($images));
            $data->images = $filename;
        }

        $data->save();

        return redirect()->route('list-news')->with('success', 'News updated successfully');
    }

    public function delete(Request $request, $id)
    {
        $data = News::find($id);
        if (!$data) {
            return redirect()->route('list-news')->with('error', 'Data news tidak ditemukan');
        }

        Storage::disk('public')->delete('images-folder/' . $data->images);

        $data->delete();
        return redirect()->route('list-news')->with('success', 'News delete successfully');
    }
}
