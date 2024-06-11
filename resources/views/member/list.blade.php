@extends('layouts.main')
@section('panel')
    <h4 class="fw-bold py-3 mb-3">
        User Manage
    </h4>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-datatable table-responsive">
                    <table id="default-datatable" class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">#</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Username</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Fullname</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Phone Number</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Email</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Balance</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Register Date</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Status</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $member)
                                <tr>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                        {{ $loop->iteration }}</td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                        {{ $member->username }}</td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                        {{ $member->nama_lengkap }}</td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                        {{ $member->no_hp }}</td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                        {{ $member->email }}</td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                        {{ number_format($member->balance, 2) }}</td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                        {{ $member->created_at }}</td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">
                                        @if ($member->status == 1)
                                            <span class="badge bg-label-success rounded-pill">Active</span>
                                        @else
                                            <span class="badge bg-label-danger rounded-pill">Suspend</span>
                                        @endif
                                    </td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;"><a
                                            href="{{ route('members.list.details',$member->extplayer) }}"
                                            class="btn rounded-pill btn-sm btn-icon btn-primary btn-fab demo waves-effect waves-light"><i
                                                class="tf-icons mdi mdi-eye-outline"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
