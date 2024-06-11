@extends('layouts.main')
@section('panel')
<div class="row">
    <div class="col-lg-12 mb-3">
        <div class="card">
            <div class="card-datatable table-responsive">
                <table id="default-datatable" class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th class="text-center" style="vertical-align: middle;">#</th>
                            <th class="text-center" style="vertical-align: middle;">Provider</th>
                            <th class="text-center" style="vertical-align: middle;">Apikey</th>
                            <th class="text-center" style="vertical-align: middle;">Secretkey</th>
                            <th class="text-center" style="vertical-align: middle;">Endpoint</th>
                            <th class="text-center" style="vertical-align: middle;">Type</th>
                            <th class="text-center" style="vertical-align: middle;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($apiss as $item)
                        <tr>
                            <th class="text-center" style="vertical-align: middle; font-size: 13px;">
                                {{ $loop->iteration }}
                            </th>
                            <th class="text-center" style="vertical-align: middle; font-size: 13px;">
                                {{ $item->provider }}
                            </th>
                            <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                {{ $item->apikey }}
                            </td>
                            <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                {{ $item->secretkey }}
                            </td>
                            <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                {{ $item->url }}
                            </td>
                            <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                {{ $item->type }}
                            </td>
                            <td class="text-center" style="vertical-align: middle; font-size: 13px;">
                                <button type="button" class="btn btn-xs btn-primary" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasEditAP{{ $item->id }}">
                                    <span class="mdi mdi-pencil">
                                </button>
                            </td>
                        </tr>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditAP{{ $item->id }}"
                            aria-labelledby="offcanvasAddUserLabel">
                            <div class="offcanvas-header">
                                <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Edit Api {{ $item->provider }}</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body mx-0 flex-grow-0 h-100">
                                <form class="add-new-user pt-0" action="{{ route('website.api.update', $item->id) }}" method="POST">
                                    @csrf
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text" class="form-control" value="{{ $item->provider }}" disabled required/>
                                        <label for="add-user-fullname">Provider</label>
                                    </div>
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text" class="form-control" name="apikey" value="{{ $item->apikey }}" required/>
                                        <label for="add-user-email">Apikey</label>
                                    </div>
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text" class="form-control" name="secretkey" value="{{ $item->secretkey }}" required/>
                                        <label for="add-user-contact">Secretkey</label>
                                    </div>
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="url" class="form-control" name="endpoint" value="{{ $item->url }}" required/>
                                        <label for="add-user-company">Endpoint</label>
                                    </div>
                                    <button type="submit"
                                        class="btn btn-primary me-sm-3 me-1">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary"
                                        data-bs-dismiss="offcanvas">Cancel</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
