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
                    <table id="data-table" class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">#</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Username</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Full Name</th>
                                <th class="text-center" style="vertical-align: middle; font-size: 12px;">Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script type="text/javascript">
    $(function () {

      var table = $('#data-table').DataTable({
          processing: true,
          serverSide: true,
          lengthMenu: [[25, 50, 100, -1], [25, 50, 100, "All"]],
          ajax: '{{ route('members.list') }}',
          columns: [
              {data: 'id', name: 'id', orderable: false},
              {data: 'username', name: 'username', orderable: false},
              {data: 'nama_lengkap', name: 'nama_lengkap', orderable: false},
              {data: 'balance', name: 'balance', orderable: false},
          ] ,
          columnDefs: [
        { className: 'text-center', targets: '_all' }]
      });

    });
</script>
@endpush
