@extends('masterAdmin')
@section('adminNavbar')

                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="components-preview wide-md mx-auto">
                                    

                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="title nk-block-title">Navbar Input Section</h4>
                                                <div class="nk-block-des">
                                                    <p>You can make style out your setting related form as per below example.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-head">
                                                    <h5 class="card-title">Website Setting</h5>
                                                </div>

                                                <form class="gy-3" method="POST" action="{{ route('createNav') }}">
                                                @csrf

                                                <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="site-name">Text</label>
                                                                <span class="form-note">Text</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input class="form-control" type="text" id="title" name="title" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="site-name">URL</label>
                                                                <span class="form-note">Specify the name of your website.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                <input class="form-control" id="title" type="text" id="url" name="url" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row g-3">
                                                        <div class="col-lg-7 offset-lg-5">
                                                            <div class="form-group mt-2">
                                                                <button type="submit" class="btn btn-lg btn-primary">Upload</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

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


<!-- <form method="POST" action="{{ route('createNav') }}">
            @csrf
  <label for="title">Title</label><br>
  <input type="text" id="title" name="title" value=""><br>
  <label for="url">URL</label><br>
  <input type="text" id="url" name="url" value=""><br><br>
  <input type="submit" value="Submit">

        </form> -->