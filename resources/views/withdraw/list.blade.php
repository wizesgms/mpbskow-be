@extends('layouts.main')
@section('panel')
<h4 class="fw-bold py-3 mb-2">
    Withdraw Transaction
</h4>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-datatable table-responsive">
                <table id="data-table" class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">#</th>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">Trx ID</th>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">Username</th>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">Amount</th>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">Bank Users</th>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">Note</th>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">Date</th>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">Transaction By</th>
                            <th class="text-center" style="vertical-align: middle; font-size: 12px;">Status</th>
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
              {data: 'trx_id', name: 'trx_id', orderable: false},
              {data: 'username', name: 'username', orderable: false},
              {data: 'total', name: 'total', orderable: false},
              {data: 'bank_user', name: 'bank_user', orderable: false},
              {data: 'keterangan', name: 'keterangan', orderable: false},
              {data: 'created_at', name: 'created_at', orderable: false},
              {data: 'transaction_by', name: 'transaction_by', orderable: false},
              {data: 'status', name: 'status', orderable: false, searchable: false},
          ] ,
          columnDefs: [
        { className: 'text-center text-sm', targets: '_all' }]
      });

    });
</script>
@endpush
