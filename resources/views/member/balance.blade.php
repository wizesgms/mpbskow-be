@extends('layouts.main')
@section('panel')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Transaction /</span> Balance Member
    </h4>
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <form role="form" action="{{ route('members.balance.update') }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label class="form-label">User :</label>
                            <select name="extplayer" class="form-control select2" required>
                                <option value=""> Selecrt User </option>
                                @foreach ($user as $mem)
                                    <option value="{{ $mem->extplayer }}"> {{ $mem->username }} ( {{ $mem->nama_lengkap }} )
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label">Amount</label>
                            <input type="number" name="amount" min="1" step="1" placeholder="1000"
                                class="form-control" required>
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label">Action :</label>
                            <select name="action" class="form-control select2" required>
                                <option value=""> Select </option>
                                <option value="1"> Add Balance </option>
                                <option value="2"> Subtract Balance </option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <!-- Invoice List Table -->
            <div class="card">
                <div class="card-datatable table-responsive">
                    <table id="default-datatable" class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">#</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Username</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Full Name</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                                <tr>
                                    <td class="text-center" style="vertical-align: middle; white-space: normal;">
                                        {{ $loop->iteration }}</td>
                                    <td class="text-center" style="vertical-align: middle; white-space: normal;">{{ $item->username }}</td>
                                    <td class="text-center" style="vertical-align: middle; white-space: normal;">{{ $item->nama_lengkap }}</td>
                                    <td class="text-right" style="vertical-align: middle; white-space: normal;">Rp. {{ number_format($item->balance ,2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
