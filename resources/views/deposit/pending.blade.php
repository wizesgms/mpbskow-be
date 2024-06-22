@extends('layouts.main')
@section('panel')
    <h4 class="fw-bold py-3 mb-3">
        Deposit Pending
    </h4>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-datatable table-responsive">
                    <table id="default-datatable" class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">#</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Trx ID</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Username</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Amount</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Invoice</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Bank Users</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Bank Admin</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Bonus</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Note</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Date</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Status</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaction as $trx)
                                <tr>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                        {{ $loop->iteration }}</td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                        {{ $trx->trx_id }}</td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                        {{ $trx->username }}</td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                        {{ number_format($trx->total, 2) }}</td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                        <a href="{{ $trx->gambar }}" target="_blank"
                                            class="btn btn-info btn-sm">Invoice</a>
                                    </td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                        {{ $trx->BankUser->nama_pemilik }} /  {{ $trx->BankUser->nama_bank }} / {{ $trx->BankUser->nomor_rekening }}
                                        </td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                        {{ $trx->metode }}</td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                        {{ $trx->bonus_amount }}</td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                        {{ $trx->keterangan }}</td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                        {{ $trx->created_at }}</td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                        @if ($trx->status == 'Pending')
                                            <span class="badge bg-label-warning rounded-pill">Pending</span>
                                        @elseif($trx->status == 'Ditolak')
                                            <span class="badge bg-label-danger rounded-pill">Rejected</span>
                                        @else
                                            <span class="badge bg-label-success rounded-pill">Active</span>
                                        @endif
                                    </td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                        <a href="{{ route('deposits.approve',$trx->id) }}" class="btn btn-success btn-sm"
                                            onclick="return confirm('Are you sure want to Confirm this Transaction?');">Approve</a>
                                        <a href="{{ route('deposits.reject',$trx->id) }}" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure want to Reject this Transaction?');">Reject</a>
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
