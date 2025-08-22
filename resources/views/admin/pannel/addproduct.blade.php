@extends('admin.pannel.app')

@section('style')

<style>
#is_active{
    border: solid 1px rgba(174, 173, 173, 0.404);
    padding: 5px;
    border-radius: 5px;
}
.Previewimg{
  width: 100%;
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
              <h1 class="m-0">Product</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <a href="{{url('/admin/product_list') }}"><button class="btn btn-primary">View Product</button></a>
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
                <h3 class="card-title">Add New Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('/admin/add_product')}}" method='POST' enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Name <span style="color: red;">*</span></label>
                    <div style="color:red">{{ $errors->first('product')}}</div>
                    <input type="text" name="product" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Product SKU <span style="color: red;">*</span></label>
                    <div style="color:red">{{ $errors->first('sku')}}</div>
                    <input type="text" name="sku" class="form-control" id="exampleInputEmail3" placeholder="Enter SKU Number">
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="category">Select Category <span style="color: red;">*</span></label>
                        <br>
                        
                        <select class="form-select" aria-label="Default select example" name="category" id="is_active">
                          @foreach($cat as $cat)
                          <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                          @endforeach
                      </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="category">Select Sub Category <span style="color: red;">*</span></label>
                        <br>
                        
                        <select class="form-select" aria-label="Default select example" name="subcategory" id="is_active">

                          @foreach($subcat as $subcat)
                          <option value="{{$subcat->id}}">{{$subcat->subcategory_name}}</option>
                          @endforeach
                      </select>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">USA Price (US$)</label>
                        <div style="color:red">{{ $errors->first('US price')}}</div>
                        <input type="number" name="us_price" class="form-control" id="exampleInputEmail1" placeholder="Enter US$">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">USA Cut Price (AU$)</label>
                        <div style="color:red">{{ $errors->first('US cut price')}}</div>
                        <input type="number" name="us_cut_price" class="form-control" id="exampleInputEmail1" placeholder="Enter Cut US$">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">UK Price (&#163;)</label>
                        <div style="color:red">{{ $errors->first('UK price')}}</div>
                        <input type="number" name="UK_price" class="form-control" id="exampleInputEmail1" placeholder="Enter UK Price">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">UK Cut Price (&#163;)</label>
                        <div style="color:red">{{ $errors->first('UK cut price')}}</div>
                        <input type="number" name="UK_cut_price" class="form-control" id="exampleInputEmail1" placeholder="Enter Cut UK Price">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Canadian Price (CA$)</label>
                        <div style="color:red">{{ $errors->first('CAN price')}}</div>
                        <input type="number" name="CAN_price" class="form-control" id="exampleInputEmail1" placeholder="Enter CA$">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Canadian Cut Price (CA$)</label>
                        <div style="color:red">{{ $errors->first('CAN cut price')}}</div>
                        <input type="number" name="CAN_cut_price" class="form-control" id="exampleInputEmail1" placeholder="Enter Cut CA$">
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Product Description <span style="color: red;">*</span></label>
                    <textarea name="description" class="form-control" id="exampleInputPassword1" placeholder="Product Description"> </textarea>
                  </div>
                  <div class="form-group">
                    <label for="is_active">Is Featured Image</label>
                    <br>
                    
                    <select class="form-select" aria-label="Default select example" name="is_featured" id="is_active">
                      <option value="1">Yes</option>
                      <option value="0" selected>No</option>
                  </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="is_active">Is Active</label>
                    <br>
                    
                    <select class="form-select" aria-label="Default select example" name="is_active" id="is_active">
                      <option value="1">Active</option>
                      <option value="0">Non Active</option>
                  </select>
                  </div>

                  <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="img1">Main Image<span style="color: red;">*</span></label>
                            <input type="file" name="img1" class="form-control" id="img1" accept="image/*" onchange="previewImage(event, 'imgPreview1')">
                            <input type="text" class="form-group mt-2" placeholder=" Main Image alt text" name="img1_alt">
                            <img id="imgPreview1" class="Previewimg" src="#" alt="Main Image Preview" style="display:none; margin-top:10px;" />
                            <button type="button" class="btn btn-danger" onclick="clearFile('img1', 'imgPreview1')" style="display:none; margin-top:10px;" id="clearBtn1">X</button>
                        </div>
                    </div>
                    <div class="col-md-3">  
                        <div class="form-group">
                            <label for="img2">Image 2</label>
                            <input type="file" name="img2" class="form-control" id="img2" accept="image/*" onchange="previewImage(event, 'imgPreview2')">
                            <input type="text" class="form-group mt-2" placeholder="Image 2 alt text" name="img2_alt">

                            <img id="imgPreview2" class="Previewimg" src="#" alt="Image 2 Preview" style="display:none; margin-top:10px;" />
                            <button type="button" class="btn btn-danger" onclick="clearFile('img2', 'imgPreview2')" style="display:none; margin-top:10px;" id="clearBtn2">X</button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="img3">Image 3</label>
                            <input type="file" name="img3" class="form-control" id="img3" accept="image/*" onchange="previewImage(event, 'imgPreview3')">
                            <input type="text" class="form-group mt-2" placeholder="Image 3 alt text" name="img3_alt">

                            <img id="imgPreview3" class="Previewimg" src="#" alt="Image 3 Preview" style="display:none; margin-top:10px;" />
                            <button type="button"  class="btn btn-danger" onclick="clearFile('img3', 'imgPreview3')" style="display:none; margin-top:10px;" id="clearBtn3">X</button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="img4">Image 4</label>
                            <input type="file" name="img4" class="form-control" id="img4" accept="image/*" onchange="previewImage(event, 'imgPreview4')">
                            <input type="text" class="form-group mt-2" placeholder="Image 4 alt text" name="img4_alt">

                            <img id="imgPreview4" class="Previewimg" src="#" alt="Image 4 Preview" style="display:none; margin-top:10px;" />
                            <button type="button" class="btn btn-danger" onclick="clearFile('img4', 'imgPreview4')" style="display:none; margin-top:10px;" id="clearBtn4">X</button>
                        </div>
                    </div>
                </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Meta Tittle</label>
                    <input type="text" name="pmeta_tittle" class="form-control" id="exampleInputPassword1" placeholder="Meta Tittle">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword2">Meta Description</label>
                    <input type="text" name="pmeta_desc" class="form-control" id="exampleInputPassword2" placeholder="Meta Description">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword3">Meta Keywords</label>
                    <input type="text" name="pmeta_keywords" class="form-control" id="exampleInputPassword3" placeholder="Meta Keywords">
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
  function previewImage(event, previewId) {
      var reader = new FileReader();
      reader.onload = function(){
          var output = document.getElementById(previewId);
          output.src = reader.result;
          output.style.display = 'block';
          
          // Show the clear button
          document.getElementById('clearBtn' + previewId.charAt(previewId.length - 1)).style.display = 'block';
      };
      reader.readAsDataURL(event.target.files[0]);
  }
  
  function clearFile(inputId, previewId) {
      var input = document.getElementById(inputId);
      var preview = document.getElementById(previewId);
  
      // Clear the file input
      input.value = '';
  
      // Hide the image preview
      preview.src = '#';
      preview.style.display = 'none';
      
      // Hide the clear button
      document.getElementById('clearBtn' + previewId.charAt(previewId.length - 1)).style.display = 'none';
  }
  </script>
@endsection



