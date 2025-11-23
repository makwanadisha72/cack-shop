<?php
    $customers = DB::table('customers')->get();
    // dd($customers);
?>
@extends('admin.adminTheme.default')
<?php
// echo "<pre>";
//   print_r($_SERVER);
// echo "</pre>";
//   EXIT();
?>
@section('style')
<meta name="csrf-token" content="{{csrf_token()}}">
  <link rel="stylesheet" href="{{asset('adminTheme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminTheme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminTheme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Customer</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Customers</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Sub-Category</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Id</th>
          <th>name</th>
          <th>E-mail Id</th>
        </tr>
        </thead>
        <tbody>
          @foreach($customers as $key=>$value)
          <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->name}}</td>
            <td>{{$value->email}}</td> 
          </tr>
          @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Id</th>
            <th>name</th>
            <th>E-mail Id</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.content -->
</div>
<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document" >
    <div class="modal-content">
      <div class="modal-body">
        <div class="form-content p-2">
          <h4 class="modal-title">Delete</h4>
          <p class="mb-4">Are you sure want to delete ?</p>
          <button type="button" class="btn btn-primary" id="modal-confirm_delete">Confirm</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')

<!-- jQuery -->
<script src="{{asset('adminTheme/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminTheme/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('adminTheme/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminTheme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminTheme/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminTheme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminTheme/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('adminTheme/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminTheme/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('adminTheme/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('adminTheme/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('adminTheme/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('adminTheme/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('adminTheme/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminTheme/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminTheme/dist/js/demo.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>

  function loadDeleteModal(id) {
    $('#modal-confirm_delete').attr('onclick', 'confirmDelete('+id+')');
    $('#delete_modal').modal('show');
      }
  function confirmDelete(id) {
    $.ajax({
            url: '{{ url('admin/subcategory') }}/' + id,
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                '_method': 'delete',
            },
            success: function (data) {
                // Success logic goes here..!
          $('#delete_modal').modal('hide');
    location.reload();
            },
            error: function (error) {
                // Error logic goes here..!
            }
        });
      }
  function refreshTable() {
  $('.datatable').each(function() {
    dt = $(this).dataTable();
    dt.fnDraw();
  })
  }
</script>
@endsection