<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\News;
use App\Models\SnapshotBackground;
use App\Models\SnapshotGallery;
use App\Models\SnapshotTeam;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $background = SnapshotBackground::count();
        $team = SnapshotTeam::count();
        $gallery = SnapshotGallery::count();

        $dateStart = Carbon::now()->startOfYear()->format('M');
        $dateEnd = Carbon::now()->format('M Y');
        return view('admin.home', compact('background', 'team', 'gallery', 'dateStart', 'dateEnd'));
    }

    public function home()
    {
        $background = SnapshotBackground::all();
        $team = SnapshotTeam::all();
        $gallery = SnapshotGallery::all();
        $jurusan = Jurusan::all();
        $news = News::all();

        foreach ($news as $row) {
            $row->formatted_tanggal = Carbon::parse($row->tanggal)->format('d M Y');
        }
        return view('landingpage.home', compact('background', 'team', 'gallery', 'jurusan', 'news'));
    }
}