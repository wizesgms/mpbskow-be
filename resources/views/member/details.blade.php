@extends('layouts.main')
@section('panel')
<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3 gap-2 gap-lg-0">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('members.list.details*') ? 'active ' : '' }}"
                    href="{{ route('members.list.details', $user->extplayer) }}"><i
                        class="mdi mdi-account-outline mdi-20px me-1"></i>Account</a>
            </li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <h4 class="card-header">Profile</h4>
            <!-- Account -->
            <div class="card-body pt-2">
                <form method="POST" action="{{ route('members.list.update',$user->id) }}">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input class="form-control" type="text" name="username" value="{{ $user->username }}"
                                    autofocus disabled />
                                <label>Username</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input class="form-control" type="text" name="fullname" id="Full Name"
                                    value="{{ $user->nama_lengkap }}" />
                                <label for="Full Name">Full Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input class="form-control" type="email" name="email" value="{{ $user->email }}"
                                    disabled />
                                <label for="email">E-mail</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-merge">
                                <div class="form-floating form-floating-outline">
                                    <input type="number" name="phone" class="form-control" value="{{ $user->no_hp }}"
                                        disabled />
                                    <label for="phoneNumber">Phone Number</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="text" class="form-control" name="password" placeholder="........" />
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="text" class="form-control" id="balance" placeholder="Address"
                                    value="{{ number_format($user->balance, 2) }}" disabled />
                                <label for="address">Balance</label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        <a href="{{ route('members.list') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-4">
            <h4 class="card-header">Banks Account</h4>
            <!-- Account -->
            <div class="card-body pt-2">
                <form method="POST" action="{{ route('members.list.bank',$bank->id) }}">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input class="form-control" type="text" name="bankname" value="{{ $bank->nama_bank }}"
                                    autofocus />
                                <label>Bank Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input class="form-control" type="text" name="accname" id="Full Name"
                                    value="{{ $bank->nama_pemilik }}" />
                                <label for="Full Name">Account Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input class="form-control" type="number" name="accno"
                                    value="{{ $bank->nomor_rekening }}" />
                                <label for="number">Account No</label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        <a href="{{ route('members.list') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h4 class="card-header">Transaction History</h4>
            <div class="card-datatable table-responsive">
                <table id="default-datatable" class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">#</th>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">Username</th>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">Transaction</th>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">Methode</th>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">Amount</th>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">Bonus Amount</th>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">Status</th>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaction as $item)
                        <tr>
                            <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                {{ $loop->iteration }}</td>
                            <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                {{ $user->username }}</td>
                            <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                {{ $item->transaksi }}</td>
                            <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                {{ $item->metode }}</td>
                            <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                {{ number_format($item->total, 2) }}</td>
                            <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                {{ number_format($item->bonus_amount, 2) }}</td>
                            <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                @if ($item->status == 'Ditolak')
                                <span class="badge bg-label-danger rounded-pill">Ditolak</span>
                                @elseif ($item->status == 'Pending')
                                <span class="badge bg-label-warning rounded-pill">Pending</span>
                                @else
                                <span class="badge bg-label-success rounded-pill">Approved</span>
                                @endif
                            </td>
                            <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                {{ $item->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-3 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="content-left">
                        <h5 class="mb-1">{{ number_format($reffc) }}</h5>
                        <small>Total Upline</small>
                    </div>
                    <span class="badge bg-label-primary rounded-circle p-2">
                        <i class="mdi mdi-currency-usd mdi-24px"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <h4 class="card-header">Upline</h4>
            <div class="card-datatable table-responsive">
                <table id="default-datatable2" class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">#</th>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">Username</th>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">Refferal ID</th>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">Register Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reff as $reffs)
                        <tr>
                            <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                {{ $loop->iteration }}</td>
                            <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                {{ $reffs->User->username }}</td>
                            <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                {{ $reffs->reff_code }}</td>
                            <td class="text-center"
                                style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                {{ $reffs->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
