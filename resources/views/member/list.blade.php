@extends('layouts.main')
@section('panel')
    <h4 class="fw-bold py-3 mb-3">
        User Manage
    </h4>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-datatable table-responsive">
                    <table id="data-table" class="table table-bordered table-sm">
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
          ajax: window.location.href,
          columns: [
              {data: 'id', name: 'id', orderable: false},
              {data: 'username', name: 'username', orderable: false},
              {data: 'nama_lengkap', name: 'nama_lengkap', orderable: false},
              {data: 'no_hp', name: 'no_hp', orderable: false},
              {data: 'email', name: 'email', orderable: false},
              {data: 'balance', name: 'balance', orderable: false},
              {data: 'created_at', name: 'created_at', orderable: false},
              {data: 'status', name: 'status', orderable: false, searchable: false},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ] ,
          columnDefs: [
        { className: 'text-center', targets: '_all' }]
      });

    });
</script>
@endpush
