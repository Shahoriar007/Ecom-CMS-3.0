    <!--===============Footer start=============-->
    <footer class="d-flex-column" style="border-top: 1px solid #c5c5c5;">
        <div class="container container-xxl text-left p-tb-60 ">
            <div class="row   text-center">
                <hr class="clearfix w-100 d-md-none mb-0">
                <div class="col-md-3 m-tb-10 shfooter">
                    <div class="footer-heading">
                        <h3 class="my-2 font-footer font-weight-bold d-none d-md-block">CUSTOMER CARE</h3>
                    </div>
                    <div class="d-md-none title" data-target="#Product" data-toggle="collapse">
                        <div class="mt-3 font-weight-bold center-text">CUSTOMER CARE
                            <div class="float-right navbar-toggler">
                                <i class="fas fa-angle-down"></i>
                                <i class="fas fa-angle-up"></i>
                            </div>
                        </div>
                    </div>
                    <div class="footer-link d-md-block list-unstyled collapse" id="Product">
                        <ul class="center-text">
                            <li>
                                <a href="#">Contact Us</a>
                            </li>
                            <li>
                                <a href="#">FAQS</a>
                            </li>
                            <li>
                                <a href="#">Size guide</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <hr class="clearfix w-100 d-md-none mb-0">

                <div class="col-md-3 m-tb-10 shfooter">
                    <div class="footer-heading">
                        <h3 class="my-2 font-footer font-weight-bold d-none d-md-block">SHIPPING INFO</h3>
                    </div>
                    <div class="d-md-none title" data-target="#Company" data-toggle="collapse">
                        <div class="mt-3 font-weight-bold center-text">SHIPPING INFO
                            <div class="float-right navbar-toggler">
                                <i class="fas fa-angle-down"></i>
                                <i class="fas fa-angle-up"></i>
                            </div>
                        </div>
                    </div>
                    <div class="footer-link list-unstyled collapse" id="Company">
                        <ul class="center-text">
                            <li>
                                <a href="#">Shipping information</a>
                            </li>
                            <li>
                                <a href="#">return policy</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <hr class="clearfix w-100 d-md-none mb-0">

                <div class="col-md-3 m-tb-10 shfooter">
                    <div class="footer-heading">
                        <h3 class="my-2 font-footer font-weight-bold d-none d-md-block">ABOUT</h3>
                    </div>
                    <div class="d-md-none title" data-target="#Resources" data-toggle="collapse">
                        <div class="mt-3 font-weight-bold center-text">ABOUT
                            <div class="float-right navbar-toggler">
                                <i class="fas fa-angle-down"></i>
                                <i class="fas fa-angle-up"></i>
                            </div>
                        </div>
                    </div>
                    <div class="footer-link list-unstyled collapse" id="Resources">
                        <ul class="center-text">
                            <li>
                                <a href="#">our story</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <hr class="clearfix w-100 d-md-none mb-0">

                <div class="col-md-3 m-tb-10 shfooter">
                    <div class="footer-heading">
                        <h3 class="center-text font-footer my-2">FOLLOW US</h3>

                    </div>

                    <div class="pt-2 center-text">
                        <ul class="list-unstyled list-inline">
                            @foreach($socialMedia as $item)
                            <li class="list-inline-item">
                                <a href="{{$item->link}}" class="sbtn btn-large mx-1" title="Facebook">
                                @if($item->name == "facebook")
                                <i class= "fab fa-facebook-f" ></i>
                                @elseif($item->name == "instagram")
                                <i class="fab fa-instagram"></i>
                                @elseif($item->name == "pinterest")
                                <i class="fab fa-pinterest-p"></i>
                                @endif
                                </a>
                            </li> 
                            @endforeach
                            <!---------------<li class="list-inline-item">
                                <a href="#!" class="sbtn btn-large mx-1" title="Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!" class="sbtn btn-large mx-1" title="Linkedin">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a href="#!" class="sbtn btn-large mx-1" title="Youtube">
                                    <i class="fab fa-pinterest-p"></i>
                                </a>
                            </li>
                            ---------------------->
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright">
            <p class="mb-0">© All Right Reserved 2021. Developed By <a href="https://aveenirit.com/">Aveenir IT</a></p>
        </div>
    </footer>

    <!--===============Footer end=============-->