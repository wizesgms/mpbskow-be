@extends('layouts.main')
@section('panel')
<div class="row">
    @if (Route::is('website.floating.edit'))
    <div class="col-lg-4 mb-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Input Gambar</h4>
                <form class="form p-t-20" enctype="multipart/form-data" action="{{ route('website.floating.update',$floats->id) }}"
                    method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Gambar</label>
                        <img class="input-group mb-3" style="width: 80px" src="{{ $floats->image }}">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="file">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Url</label>
                        <div class="input-group mb-3">
                            <input type="url" class="form-control" name="url" required="" value="{{ $floats->url }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary m-r-10" name="upload">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @else
    <div class="col-lg-4 mb-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Input Gambar</h4>
                <form class="form p-t-20" enctype="multipart/form-data" action="{{ route('website.floating.create') }}"
                    method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Gambar</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="file" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Url</label>
                        <div class="input-group mb-3">
                            <input type="url" class="form-control" name="url" required="">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary m-r-10" name="upload">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @endif
    <div class="col-lg-8 mb-3">
        <div class="card">
            <div class="card-datatable table-responsive">
                <table id="default-datatable" class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th class="text-center" style="vertical-align: middle;">#</th>
                            <th class="text-center" style="vertical-align: middle;">Gambar</th>
                            <th class="text-center" style="vertical-align: middle;">Url</th>
                            <th class="text-center" style="vertical-align: middle;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($floating as $item)
                        <tr>
                            <th class="text-center" style="vertical-align: middle; font-size: 13px;">
                                {{ $loop->iteration }}
                            </th>
                            <td class="text-center" style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                <img class="container-fluid" style="width: 100px;" src="{{ $item->image }}">
                            </td>
                            <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                {{ $item->url }}
                            </td>
                            <td class="text-center" style="vertical-align: middle; font-size: 13px;">
                                <a href="{{ route('website.floating.edit',$item->id) }}" class="btn btn-xs btn-primary"><span
                                    class="mdi mdi-pencil"></span></a>
                                <a href="{{ route('website.floating.delete',$item->id) }}" class="btn btn-xs btn-danger"
                                    onclick="return confirm('Are you sure want to delete this floating?');"><span
                                        class="mdi mdi-trash-can"></span></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4 mb-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Popup</h4>
                <form class="form p-t-20" enctype="multipart/form-data" action="{{ route('website.floating.popup') }}"
                    method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Gambar (Opsional Jika Ingin Mengubahnya)</label>
                        <img class="input-group mb-3" style="width: 100px" src="{{ $popup->gambar }}">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="file">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control select2" required>
                            <option value=""> Select </option>
                            <option value="active" {{ $popup->status == 'active'  ? 'selected' : ''}}> Active </option>
                            <option value="disable" {{ $popup->status == 'disable'  ? 'selected' : ''}}> Disable </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary m-r-10 mt-3" name="upload">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
