@extends('admin.pannel.app')

@section('style')
<!-- DataTables -->
 <style>
  .imgpreview{
    width:60%;
  }
  .table td{
    vertical-align: middle !important;
  }
 </style>
<link rel="stylesheet" href="{{ url('public/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
  href="{{ url('public/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ url('public/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      @if(!empty(session('success')))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
       {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @endif
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Product</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">
            <a href="{{url('admin/add_product')}}"><button class="btn btn-primary">Add Product</button></a>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>USA Price</th>
                    <th>UK Price</th>
                    <th>Can Price</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($record as $rec)

                  <tr>
                    <td>{{$rec->product_name}}</td>
                    <td>{{$rec->category_name}}</td>
                    <td>{{$rec->subcategory_name}}</td>
                    <td>{{$rec->us_price_actual}}</td>
                    <td>{{$rec->uk_price_actual}}</td>
                    <td>{{$rec->can_price_actual}}</td>
                    <td><img src="{{url('public/upload/product/'. $rec->img1)}}" alt="#" class="imgpreview"></td>
                    <td>{{($rec->status)==1? 'Active':'Disabled' }}</td>
                    <td><a href="{{ url('/admin/delete_product/'.$rec->id)  }}" onclick="return confirm('Are you sure! You will also LOSE THE PRODUCTS under this category')"><button class="btn btn-danger m-1" >Delete</button></a>
                        <a href="{{ url('/admin/edit_product/'.$rec->id ) }}"> <button  class="btn btn-success m-1">Edit</button></a>
                    </td>
                    
                  </tr>
                  @endforeach


                  </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->

      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection



@section('script')
<!-- DataTables  & Plugins -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.all.min.js"></script>
<script src="{{ url('public/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('public/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ url('public/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ url('public/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ url('public/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ url('public/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ url('public/assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ url('public/assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ url('public/assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ url('public/assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ url('public/assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ url('public/assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

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