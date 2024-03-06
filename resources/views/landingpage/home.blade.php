<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    {{-- Navbar --}}
    <div class="navbar bg-base-100 shadow-md px-10 fixed z-10">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a>Beranda</a></li>
                    <li><a>Berita</a></li>
                    <li><a>Tenaga Pendidik</a></li>
                    <li><a>Gallery</a></li>
                    <li>
                        <a>Kelengkapan</a>
                        <ul class="p-2">
                            <li><a>Jurusan</a></li>
                            <li><a>Ekstrakulikuler</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <a class="text-xl font-bold font-serif">SMKN 1 SLAWI</a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a>Beranda</a></li>
                <li><a>Berita</a></li>
                <li><a>Tenaga Pendidik</a></li>
                <li><a>Gallery</a></li>
                <li>
                    <details>
                        <summary>Kelengkapan</summary>
                        <ul class="p-2">
                            <li><a>Jurusan</a></li>
                            <li><a>Ekstrakulikuler</a></li>
                        </ul>
                    </details>
                </li>
            </ul>
        </div>
        <div class="navbar-end">
            <a class=" font-bold">Login</a>
        </div>
    </div>
    {{-- Hero Section --}}
    @foreach ($background as $bg)
        <div class="hero min-h-screen"
            style="background-image: url({{ asset('storage/images-folder/' . $bg->image) }});">
            <div class="hero-overlay bg-opacity-60"></div>
            <div class="hero-content text-center text-neutral-content">
                <div class="max-w-md">
                    <h1 class="mb-5 text-5xl font-bold">{{ $bg->title }}</h1>
                    <p class="mb-5">{{ $bg->deskripsi }}</p>
                </div>
            </div>
        </div>
    @endforeach
    {{-- News Section --}}
    <div class=" bg-white">
        <div class="mt-5 mb-5">
            <h1 class="font-bold text-center m-10 text-3xl">Berita terbaru</h1>
            <div class="flex flex-wrap justify-center items-center mt-10">
                @foreach ($news as $news)
                    <div class="card card-compact w-96 rounded-none">
                        <figure><img src="{{ asset('storage/images-folder/' . $news->images) }}"
                                class="rounded-md relative" alt="News" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title font-bold text-uppercase">{{ $news->title }}</h2>
                            <p>{{ $news->deskripsi }}</p>
                        </div>
                        <hr>
                        <div class="card-footer mt-2">
                            <div class="flex justify-between items-center">
                                <p class=" text-sm font-bold text-gray-600">ADMIN</p>
                                <p class="text-sm font-extrabold text-gray-600">{{ $news->formatted_tanggal }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
