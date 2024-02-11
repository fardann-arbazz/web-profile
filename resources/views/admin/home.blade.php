@extends('layouts.dashboard')

@section('content')
<div class="content-body">

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Post Background</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $background }}</h2>
                            <p class="text-white mb-0">{{ $dateStart }} - {{ $dateEnd }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Post Team</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $team }}</h2>
                            <p class="text-white mb-0">{{ $dateStart }} - {{ $dateEnd }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Post Gallery</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $gallery }}</h2>
                            <p class="text-white mb-0">{{ $dateStart }} - {{ $dateEnd }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
@endsection
