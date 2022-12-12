@extends('masterAdmin')
@section('adminProduct')

<!-- content @s -->
<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="components-preview wide-md mx-auto">
                                    

                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="title nk-block-title">Product Input Section</h4>
                                                <div class="nk-block-des">
                                                    <p>You can make style out your setting related form as per below example.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-head">
                                                    <h5 class="card-title">Product Setting</h5>
                                                </div>
                                                <form enctype="multipart/form-data" method="POST" action="{{ route('createProduct') }}">
            @csrf
  <label for="productName">Product Name</label><br>
  <input type="text" id="productName" name="productName" value=""><br>

  <label for="price">Price</label><br>
  <input type="text" id="price" name="price" value=""><br><br>
  <label for="thumbnail">Thumbnail Image</label><br>
  <input type="file" id="thumbnail" name="thumbnail" value=""><br><br>

  <label for="image">images</label><br>
  <input type="file" id="image" name="images[]" multiple="multiple" />
</br>
  <label for="catagory">Choose a catagory:</label>
    <select name="catagory" id="catagory" >
        @foreach($catagories as $catagory )
        <option value="{{$catagory->catagoryName}}">{{$catagory->catagoryName}}</option>
        @endforeach
    </select>

    <input type="checkbox" id="latest" name="latest" value="0">
    <label for="latest"> Latest</label></br>

    <input type="checkbox" id="toprated" name="toprated" value="1">
    <label for="toprated"> Top Rated</label><br>

    <input type="submit" value="Submit">
        </form>
                                               <!----- <form class="gy-3" enctype="multipart/form-data" method="POST" action="{{ route('createProduct') }}">
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="site-name">Product Name</label>
                                                                <span class="form-note">Specify the name of your website.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input  class="form-control" type="text" id="productName" name="productName" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label">Price</label>
                                                                <span class="form-note">Specify the email address of your website.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input class="form-control"  type="text" id="price" name="price">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label">Images</label>
                                                                <span class="form-note">Copyright information of your website.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input class="form-control" type="file" id="image" name="images[]" multiple="multiple">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label">Catagory</label>
                                                                <span class="form-note">Copyright information of your website.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input class="form-control" type="file" id="image" name="images[]" multiple="multiple">

                                                                    <label  for="catagory">Choose a catagory:</label>
                                                                        <select class="form-control" name="catagory" id="catagory" >
                                                                            @foreach($catagories as $catagory )
                                                                            <option class="form-control" value="{{$catagory->catagoryName}}">{{$catagory->catagoryName}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" >Latest</label>
                                                                <span class="form-note">Enable to make website make offline.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                
                                                                    <input type="checkbox" id="latest" name="latest" value="0">
                                                                    <label class="custom-control-label" >Latest</label>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="site-off">Top Rated</label>
                                                                <span class="form-note">Enable to make website make offline.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                
                                                                <input type="checkbox" id="toprated" name="toprated" value="1">
                                                                    <label class="custom-control-label" for="site-off">Top Rated</label>
                                                                </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="row g-3">
                                                        <div class="col-lg-7 offset-lg-5">
                                                            <div class="form-group mt-2">
                                                                <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>--->

                                            </div>

                                        </div><!-- card -->

                                    </div><!-- .nk-block -->

                                </div><!-- .components-preview -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->

                @endsection


                
<!--  --->