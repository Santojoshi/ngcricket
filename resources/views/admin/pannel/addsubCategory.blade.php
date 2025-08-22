@extends('admin.pannel.app')

@section('style')

<style>
#is_active{
    border: solid 1px rgba(174, 173, 173, 0.404);
    padding: 5px;
    border-radius: 5px;
}
</style>
@endsection

@section('content')
<!-- Main content -->
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">SUb Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <a href="{{url('/admin/category_list') }}"><button class="btn btn-primary">View Sub Category</button></a>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

<section class="content">

      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Sub Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('/admin/add_subcategory')}}" method='POST' >
                {{csrf_field()}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">SubCategory Name</label>
                    <div style="color:red">{{ $errors->first('subcategory_name')}}</div>
                    <input type="text" name="subcategory_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Sub Category">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Meta Tittle</label>
                    <input type="text" name="cmeta_tittle" class="form-control" id="exampleInputPassword1" placeholder="Meta Tittle">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword2">Meta Description</label>
                    <input type="text" name="cmeta_desc" class="form-control" id="exampleInputPassword2" placeholder="Meta Description">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword3">Meta Keywords</label>
                    <input type="text" name="cmeta_keywords" class="form-control" id="exampleInputPassword3" placeholder="Meta Keywords">
                  </div>
                  <div class="form-group">
                    <label for="is_active">Is Active</label>
                    <br>
                    
                    <select class="form-select" aria-label="Default select example" name="is_active" id="is_active">
                      <option value="1">Active</option>
                      <option value="0">Non Active</option>
                  </select>
                  </div>

                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


          </div>
         
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    </div>

  

    @endsection


    @section('script')
<!-- bs-custom-file-input -->
<script src="{{ url('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
@endsection



