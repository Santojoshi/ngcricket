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
              <h1 class="m-0">Banner</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <a href="{{url('/admin/banner_list') }}"><button class="btn btn-primary">View Banner</button></a>
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
                <h3 class="card-title">Add New Banner</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('/admin/add_banner')}}" method='POST' enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Banner Name</label>
                    <div style="color:red">{{ $errors->first('banner_name')}}</div>
                    <input type="text" name="banner_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Banner Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Banner Image</label>
                    <div style="color:red">{{ $errors->first('banner_image') }}</div>
                    
                    <input type="file" name="banner_image" class="form-control" id="exampleInputEmail3" placeholder="Choose Image" accept="image/*" onchange="previewImage(event)">
                    <!-- Image Preview Section -->
                    <div>
                      <img id="imagePreview" src="#" alt="Your Image" style="display: none; max-width: 200px; max-height: 200px; margin-top: 10px;" />
                    </div>
                    <button type="button" class="btn btn-warning mt-2" onclick="clearImage()">Clear Image</button>
                </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Banner Image Alt text</label>
                    <div style="color:red">{{ $errors->first('cname')}}</div>
                    <input type="text" name="banner_alt" class="form-control" id="exampleInputEmail1" placeholder="Enter Banner alt text">
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

<script>
  function previewImage(event) {
      var input = event.target;
      var reader = new FileReader();
      
      reader.onload = function() {
          var imagePreview = document.getElementById('imagePreview');
          var clearImageBtn = document.getElementById('clearImageBtn');
          imagePreview.src = reader.result;
          imagePreview.style.display = 'block';
          clearImageBtn.style.display = 'inline-block';  // Show the clear button when an image is selected
      };
      
      if(input.files && input.files[0]) {
          reader.readAsDataURL(input.files[0]);
      } else {
          clearImage();  // If no image is selected, clear the preview and hide the button
      }
  }

  function clearImage() {
      var inputFile = document.getElementById('exampleInputEmail3');
      var imagePreview = document.getElementById('imagePreview');
      var clearImageBtn = document.getElementById('clearImageBtn');
      
      inputFile.value = "";  // Clear the file input
      imagePreview.style.display = 'none';  // Hide the image preview
      imagePreview.src = "#";  // Reset the image preview src
      clearImageBtn.style.display = 'none';  // Hide the clear button
  }
</script>

@endsection



