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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">List Data Background</a></li>
                </ol>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card" style="width: 950px">
                <div class="card-body">
                    <div class="card-title">
                        <h4>Table Hover</h4>
                    </div>
                    <a href="{{ route('create') }}" class="btn btn-primary text-white btn-xs my-2">Tambah Data</a>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Deskripsi</th>
                                    <th>Images</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->deskripsi }}</td>
                                    <td><img src="{{ asset('storage/images-folder/'.$row->image) }}" alt="images background" width="100"></td>
                                    <td>
                                        <a href="{{ route('edit', ['id' => $row->id]) }}" class="btn btn-primary btn-xs">Edit</a>
                                        <a data-toggle="modal" data-target="#exampleModalCenter{{ $row->id }}" class="btn btn-danger btn-xs text-white">Delete</a>
                                    </td>
                                </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter{{ $row->id }}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus data</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin menghapus data {{ $row->title }}?</p>
                                                </div>
                                                <form action="{{ route('delete', ['id' => $row->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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