@extends('layouts.main')
@section('panel')
<div class="row">
    <div class="col-sm-5 mb-3">
        <div class="card">
            <div class="card-body">
                @if(Route::is('website.promotion.edit'))
                <form role="form" action="{{ route('website.promotion.update',$edb->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label class="form-label">Image : (Optional)</label>
                        <a href="{{ $edb->gambar }}" target="_blank"><img class="input-group mb-3" style="width: 150px;" src="{{ $edb->gambar }}"></a>
                        <input class="form-control" type="file" name="file">
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Promotion Title :</label>
                        <input class="form-control" type="text" name="judul" value="{{ $edb->judul }}" required>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Description :</label>
                        <textarea class="form-control summernoteEditor" type="text" name="deskripsi">{!! $edb->text !!}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Minimal Deposit :</label>
                        <input class="form-control" type="number" value="{{ $edb->minimal_deposit }}" name="minimal_depo" required>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Bonus Persentase :</label>
                        <input class="form-control" type="number" name="bonus" value="{{ $edb->bonus }}" required>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Turnover :</label>
                        <input class="form-control" type="number" name="to" value="{{ $edb->turnover }}" required>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Status :</label>
                        <select name="status" class="form-control" required>
                            <option> Pilih </option>
                            <option value="active" {{ $edb->status == 'active'  ? 'selected' : ''}}>Active</option>
                            <option value="not" {{ $edb->status == 'not'  ? 'selected' : ''}}>Not Actived</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Publish</button>
                    <a href="{{ route('website.promotion') }}" class="btn btn-dark mt-3">Cancel</a>
                </form>
                @else
                <form role="form" action="{{ route('website.promotion.create') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label class="form-label">Upload Image :</label>
                        <input class="form-control" type="file" name="file">
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Promotion Title :</label>
                        <input class="form-control" type="text" name="judul" required>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Description :</label>
                        <textarea class="form-control summernoteEditor" type="text" name="deskripsi"></textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Minimal Deposit :</label>
                        <input class="form-control" type="number" value="0" name="minimal_depo" required>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Bonus Persentase :</label>
                        <input class="form-control" type="number" name="bonus" value="0" required>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Turnover :</label>
                        <input class="form-control" type="number" name="to" value="0" required>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Status :</label>
                        <select name="status" class="form-control" required>
                            <option> Pilih </option>
                            <option value="active">Active</option>
                            <option value="not">Not Actived</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Publish</button>
                </form>
                @endif
            </div>
        </div>
    </div>
    <div class="col-sm-7 mb-3">
        <!-- Invoice List Table -->
        <div class="card">
            <div class="card-datatable table-responsive">
                <table id="default-datatable" class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">#</th>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">Judul</th>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">Image</th>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">Minimal Deposit
                            </th>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">Bonus</th>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">Turnover</th>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">Status</th>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($promotion as $item)
                        <tr>
                            <td class="text-center" style="vertical-align: middle; font-size: 14px;">
                                {{ $loop->iteration }}
                            </td>
                            <td class="text-left" style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                {{ $item->judul }}
                            </td>
                            <th class="text-center" style="vertical-align: middle; font-size: 14px;"><img
                                    style="width: 120px;" src="{{ $item->gambar }}" loading="lazy"></th>
                            <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 14px;">Rp.
                                {{ number_format($item->minimal_deposit) }}
                            </td>
                            <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 14px;">Rp.
                                {{ number_format($item->bonus) }}
                            </td>
                            <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 14px;">Rp.
                                {{ number_format($item->turnover) }}
                            </td>
                            <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 14px;">
                                {{ $item->status }}
                            </td>
                            <td class="text-center" style="vertical-align: middle; font-size: 14px;">
                                <a href="{{ route('website.promotion.edit',$item->id) }}" class="btn btn-xs btn-primary"><span
                                        class="mdi mdi-pencil"></span></a>
                                <a href="{{ route('website.promotion.delete',$item->id) }}"
                                    class="btn btn-xs btn-danger"
                                    onclick="return confirm('Are you sure want to delete this Banks?');"><span
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
