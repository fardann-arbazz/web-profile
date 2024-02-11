@extends('layouts.dashboard')

@section('content')
    <div class="content-body">
        @if (session('success'))
         <div class="alert alert-success">
            {{ session('success') }}
         </div>
        @endif
        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">List Data Gallery</a></li>
                </ol>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card" style="width: 960px">
                <div class="card-body">
                    <div class="card-title">
                        <h4>Table Hover</h4>
                    </div>
                    <a href="{{ route('create.gallery') }}" class="btn btn-primary text-white btn-xs my-2">Tambah Data</a>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Deskripsi</th>
                                    <th>Images</th>
                                    <th>Url</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->deskripsi }}</td>
                                    <td><img src="{{ asset('storage/images-folder/'.$row->images) }}" alt="images background" width="100"></td>
                                    <td>{{ $row->url }}</td>
                                    <td>
                                        <a href="{{ route('edit.gallery', ['id' => $row->id]) }}" class="btn btn-primary btn-xs">Edit</a>
                                        <a href="" class="btn btn-danger btn-xs">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /# card -->
        </div>
    </div>
@endsection