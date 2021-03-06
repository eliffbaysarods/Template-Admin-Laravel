@extends('layouts.admin')
@section('title','Category List')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Categories</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          
          
          <a href="{{route ('admin_category_add'}}" type="button" class="btn btn-block btn-info" style="width:200px">Add Category </button>
          
        </div>
        <div class="card">
              
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Parent</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($datalist as $rs )
         
        

                  <tr>
                    <td>{{$rs->id}}</td>
                    <td>{{$rs->parent_id}}</td>
                    <td>{{$rs->title}}</td>
                    <td>{{$rs->status}}</td>
                    <td><a href="{{route('admin_category_edit' , ['id'=> $rs->id)}}">Edit</a></td>
                    <td><a href="{{route('admin_category_delete' , ['id'=> $rs->id)}}" onclick = "return confirm ('Are You Sure ?')">Delete</a>Delete</td>
                  </tr>
                  @endforeach
</table>
</div>
</div>S



   
       
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('footer')
<script src="{{asset('assets')}}/admin/plugins/jquery-knob/jquery.knob.min.jss"></script>
<script src="{{asset('assets')}}/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('assets')}}/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('assets')}}/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('assets')}}/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


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

@endsection