@extends('layouts.main')
@section('panel')
    <div class="row">
        <div class="col-lg-4">
            @if (Route::is('website.promotion.edit'))
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Banks Edit</h4>
                        <form class="form p-t-20" method="POST" action="{{ route('bank.update',$bank->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Icon Bank</label>
                                <img class="input-group mb-3" style="width: 80px" src="{{ $bank->icon }}">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="file">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Bank Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="nama_bank" class="form-control" placeholder="Bank Name"
                                        required="" value="{{ $bank->nama_bank }}" aria-label="Username" aria-describedby="basic-addon11">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Account No</label>
                                <div class="input-group mb-3">
                                    <input type="number" name="nomor_rekening" class="form-control"
                                        placeholder="Account No" required="" aria-label="Username"
                                        value="{{ $bank->nomor_rekening }}" aria-describedby="basic-addon11">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Account Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="nama_pemilik" class="form-control"
                                        placeholder="Account Name" required="" aria-label="Username"
                                        value="{{ $bank->nama_pemilik }}" aria-describedby="basic-addon11">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-r-10">Submit</button>
                            <a href="{{ route('bank.list') }}" class="btn btn-dark">Cancel</a>
                        </form>
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Banks Create</h4>
                        <form class="form p-t-20" method="POST" action="{{ route('bank.create') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Icon Bank</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" required="" name="file">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Bank Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="nama_bank" class="form-control" placeholder="Bank Name"
                                        required="" aria-label="Username" aria-describedby="basic-addon11">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Account No</label>
                                <div class="input-group mb-3">
                                    <input type="number" name="nomor_rekening" class="form-control"
                                        placeholder="Account No" required="" aria-label="Username"
                                        aria-describedby="basic-addon11">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Account Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="nama_pemilik" class="form-control"
                                        placeholder="Account Name" required="" aria-label="Username"
                                        aria-describedby="basic-addon11">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-r-10">Submit</button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Banks Account</h4>
                </div>
                <div class="card-datatable table-responsive">
                    <table id="default-datatable" class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">#</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Bank Logo</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Bank Name</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Account No</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Account Name</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Transaction</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banks as $item)
                                <tr>
                                    <th class="text-center" style="vertical-align: middle; font-size: 13px;">{{ $loop->iteration }}</th>
                                    <th class="text-center" style="vertical-align: middle; font-size: 12px;"><img style="width: 30px" src="{{ $item->icon }}"></th>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">{{ $item->nama_bank }}
                                    </td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">{{ $item->nomor_rekening }}
                                    </td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">{{ $item->nama_pemilik }}
                                    </td>
                                    <td class="text-end"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">{{ number_format($item->amount_trx ,2) }}
                                    </td>
                                    <td class="text-center" style="vertical-align: middle; font-size: 13px;">
                                        <a href="{{ route('bank.edit',$item->id) }}" class="btn btn-xs btn-primary"><span
                                                class="mdi mdi-pencil"></span></a>
                                        <a href="{{ route('bank.delete',$item->id) }}" class="btn btn-xs btn-danger"
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
