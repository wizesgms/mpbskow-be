@extends('layouts.main')
@section('panel')
    <div class="row">
        <div class="col-lg-4">
            @if (Route::is('admin.list.edit'))
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Admin Edit</h4>
                        <form class="form p-t-20" method="POST" action="{{ route('admin.list.update',$admin->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Username</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="username" class="form-control" placeholder="Username"
                                        required="" aria-label="Username" value="{{ $admin->username }}" aria-describedby="basic-addon11">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Fullname</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="fullname" class="form-control"
                                        placeholder="Fullname" required="" aria-label="Fullname"
                                        aria-describedby="basic-addon11" value="{{ $admin->fullname }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group mb-3">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="email" required="" aria-label="email"
                                        aria-describedby="basic-addon11" value="{{ $admin->email }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group mb-3">
                                    <input type="passsword" name="password" class="form-control"
                                        placeholder="passsword" aria-label="passsword"
                                        aria-describedby="basic-addon11">
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label">Level :</label>
                                <select name="level" class="form-control select2" required>
                                    <option value=""> Select </option>
                                    <option value="master" {{ $admin->level == 'master'  ? 'selected' : ''}}> Super Admin </option>
                                    <option value="admin" {{ $admin->level == 'admin'  ? 'selected' : ''}}> Admin </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary m-r-10">Submit</button>
                            <a href="{{ route('admin.list') }}" class="btn btn-dark">Cancel</a>
                        </form>
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Admin Create</h4>
                        <form class="form p-t-20" method="POST" action="{{ route('admin.list.create') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Username</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="username" class="form-control" placeholder="Username"
                                        required="" aria-label="Username" aria-describedby="basic-addon11">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Fullname</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="fullname" class="form-control"
                                        placeholder="Fullname" required="" aria-label="Fullname"
                                        aria-describedby="basic-addon11">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group mb-3">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="email" required="" aria-label="email"
                                        aria-describedby="basic-addon11">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group mb-3">
                                    <input type="passsword" name="password" class="form-control"
                                        placeholder="passsword" required="" aria-label="passsword"
                                        aria-describedby="basic-addon11">
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label">Level :</label>
                                <select name="level" class="form-control select2" required>
                                    <option value=""> Select </option>
                                    <option value="master"> Super Admin </option>
                                    <option value="admin"> Admin </option>
                                </select>
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
                    <h4 class="card-title">Admin List</h4>
                </div>
                <div class="card-datatable table-responsive">
                    <table id="default-datatable" class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">#</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Username</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Fullname</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Email</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">level</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $item)
                                <tr>
                                    <th class="text-center" style="vertical-align: middle; font-size: 13px;">{{ $loop->iteration }}</th>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">{{ $item->username }}
                                    </td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">{{ $item->fullname }}
                                    </td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">{{ $item->email }}
                                    </td>
                                    <td class="text-center"
                                        style="vertical-align: middle; white-space: normal; font-size: 13px;">{{ $item->level }}
                                    </td>
                                    <td class="text-center" style="vertical-align: middle; font-size: 13px;">
                                        <a href="{{ route('admin.list.edit',$item->id) }}" class="btn btn-xs btn-primary"><span
                                                class="mdi mdi-pencil"></span></a>
                                        <a href="{{ route('admin.list.delete',$item->id) }}" class="btn btn-xs btn-danger"
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
