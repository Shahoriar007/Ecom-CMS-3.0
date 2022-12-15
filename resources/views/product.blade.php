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
                                    </br></br>
                                    <label for="catagory">Choose a catagory:</label>
                                    <select name="catagory" id="catagory">
                                        @foreach($catagories as $catagory )
                                        <option value="{{$catagory->catagoryName}}">{{$catagory->catagoryName}}</option>
                                        @endforeach
                                    </select>
                                    </br></br>
                                    <input type="checkbox" id="latest" name="latest" value="0">
                                    <label for="latest"> Latest</label>

                                    <input type="checkbox" id="toprated" name="toprated" value="1">
                                    <label for="toprated"> Top Rated</label><br><br>

                                    <input type="submit" value="Submit">
                                </form>

                            </div>

                        </div><!-- card -->
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="card-head">
                                    <h5 class="card-title">All Products</h5>
                                </div>
                                <div>
                                <table class="table table-bordered">
                            <thead>
                                <tr>
                                   <!-- <th class="pro-thumbnail">Thumbnail</th>
                                    <th class="pro-title">Product</th> -->
                                    <th class="pro-id">Id</th>
                                    <th class="pro-sku">SKU</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-available">Available</th>
                                    <th class="pro-remove">Delete</th>
                                    <th class="pro-update">Update</th>
                                    <th class="pro-status">status</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($allProducts as $product)
                                    <tr>
                                       
                                        <td>{{$product->product_id}}</td>
                                        <td>{{$product->sku}}</td>
                                        <td>{{$product->unitPrice}}</td>
                                        <td>{{$product->availableStock}}</td>
                                        <td><button>Delete</button></td>
                                        <td><button>Update</button></td>
                                        <td>
                                            <select name="status" id="status">
                                                <option value="enable">Enable</option>
                                                <option value="disable">Disable</option>
                                            </select>
                                        </td>
                                    </tr>

                                    @endforeach
                                </div>
                            </div>

                        </div>

                    </div><!-- .nk-block -->

                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->

@endsection



<!--  --->