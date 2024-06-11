@extends('layouts.main')
@section('panel')
<div class="row">
    <div class="col-lg-4 mb-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Input Gambar</h4>
                <form class="form p-t-20" enctype="multipart/form-data" action="{{ route('website.banner.create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Gambar</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="file" required="">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary m-r-10" name="upload">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8 mb-3">
        <div class="card">
            <div class="card-datatable table-responsive">
                <table id="default-datatable" class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th class="text-center" style="vertical-align: middle;">#</th>
                            <th class="text-center" style="vertical-align: middle;">Gambar</th>
                            <th class="text-center" style="vertical-align: middle;">Status</th>
                            <th class="text-center" style="vertical-align: middle;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banner as $item)
                        <tr>
                            <th class="text-center" style="vertical-align: middle; font-size: 14px;">
                                {{ $loop->iteration }}
                            </th>
                            <td class="text-left" style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                <img class="container-fluid" style="width: 400px" src="{{ $item->gambar }}">
                            </td>
                            <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                {{ $item->status }}
                            </td>
                            <td class="text-center" style="vertical-align: middle; font-size: 14px;">
                                <a href="{{ route('website.banner.delete',$item->id) }}" class="btn btn-xs btn-danger"
                                    onclick="return confirm('Are you sure want to delete this banner?');"><span
                                        class="mdi mdi-trash-can"></span></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
