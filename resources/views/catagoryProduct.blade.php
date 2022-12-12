@extends('master')
@section('userCategoryProduct')


<body class="pattern-bg">

    <!--=======Filter section start==========-->

    <!--<section class="main-content">
        <div class="container container-xxl filter">
            <div class="left-filter">
                <div class="filter-group hide-on-mobile">
                    <form action="#">
                        <select>
                            <option data-display="Sort By">Clear</option>
                            <option value="1">Best Selling</option>
                            <option value="2">Price High to Low</option>
                            <option value="3">Price Low to High</option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="right-filter">
                <p class="filter-label">
                    <strong>Filter by: </strong>
                </p>
                <div class="filter-group hide-on-desktop">
                    <select>
                        <option data-display="Sort By">Clear</option>
                        <option value="1">Best Selling</option>
                        <option value="2">Price High to Low</option>
                        <option value="3">Price Low to High</option>
                    </select>
                </div>
                <div class="filter-group">
                    <select>
                        <option data-display="Size">Clear</option>
                        <option value="1">XS</option>
                        <option value="2">S</option>
                        <option value="3">M</option>
                        <option value="4">L</option>
                        <option value="5">XL</option>
                    </select>
                </div>
                <div class="filter-group">
                    <select class="product-color">
                        <option data-display="Color">Clear</option>
                        <option value="1">Black</option>
                        <option value="2">Yellow</option>
                        <option value="3">Blue</option>
                        <option value="4">Floral Prints</option>
                        <option value="5">Green</option>
                        <option value="6">Pink</option>
                        <option value="7">Red</option>
                        <option value="8">Solid</option>
                    </select>
                </div>
            </div>
            
            
        </div>
    </section>-->


    <section class="main-content pb-60">
        <div class="container container-xxl">

            <div class="heading">
                <h2>
                    Fragrance
                </h2>
            </div>


            <!-- Shop Page Content Start -->

            <div class="shop-page-content-wrap">
                <div class="shop-page-products-wrap">
                    <div class="products-wrapper">
                        <div class="row">
                            @foreach($catagoryProducts as $item)
                            <div class="col-lg-3 col-sm-6 col-6 p-x-5">
                                <!-- Single Product Item -->
                                <div class="single-product-item text-center mb-3">
                                    <figure class="product-thumb">
                                        <a href="product_details.html"><img src="{{asset('images/'. $item['image1'])}}"
                                                alt="Products" class="img-fluid"></a>
                                    </figure>

                                    <div class="product-details">
                                        <h2><a href="product_details.html">{{$item->productName}}</a></h2>
                                        <div class="product-code">
                                            <span class="code-title">Product Code: </span>
                                            <span class="code-no">S-3254</span>
                                        </div>
                                        <div class="price-div">
                                            <span class="price">BDT {{$item->price}}</span>
                                            <span class="discount-price line-through">BDT 1500</span>
                                        </div>

                                        <button type="button" class="btn-add-to-cart"> <a href="{{'/add-to-cart/'.$item['id']}}">+ Add to
                                            Cart </a></button>
                                    </div>

                                    <div class="product-meta">
                                        <!--<button type="button" data-toggle="modal" data-target="#quickView">
                                                    <span data-toggle="tooltip" data-placement="left"
                                                        title="Quick View"><i class="fas fa-eye"></i>
                                                </button>
                                                
                                                <a href="#" data-toggle="tooltip" data-placement="left"
                                                    title="Compare"><i class="fas fa-tag"></i></a>-->

                                        <a href="#" data-toggle="tooltip" data-placement="left"
                                            title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                    </div>
                                    <span class="product-bedge">New</span>
                                </div>
                                <!-- Single Product Item -->
                            </div>
                            @endforeach
                           
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shop Page Content End -->



            <div class="row pt-5">
                <div class="col-md-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </section>

    <!--=======Filter section end==========-->





    <script type="text/Javascript">
        $(".button-qty").on("click", function() {
    
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        $button.blur();
        if ($button.hasClass("inc")) {
        var newVal = parseFloat(oldValue) + 1;
      } else {
     // Don't allow decrementing below zero
      if (oldValue > 1) {
        var newVal = parseFloat(oldValue) - 1;
      } else {
        newVal = 1;
      }
    }
    
    $button.parent().find("input").val(newVal);
    
    });
      </script>
    <script>
        /* Set the width of the side navigation to 250px */
        function openNav() {
            if ($(window).width() > 600) {
                document.getElementById("mySidenav").style.width = "23vw";

            } else {
                document.getElementById("mySidenav").style.width = "90vw";
            }
        }
        /* Set the width of the side navigation to 0 */
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";

        }
    </script>



    <script>
        $(document).ready(function () {
            // product Gallery and Zoom
            // activation carousel plugin
            var galleryThumbs = new Swiper('.gallery-thumbs', {
                spaceBetween: 5,
                freeMode: true,
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
                on: {
                    init: function () {
                        console.log('swiper initialized');
                        // activation zoom plugin
                        var $easyzoom = $('.easyzoom').easyZoom();
                    },
                },
                breakpoints: {
                    0: {
                        slidesPerView: 3,
                    },
                    992: {
                        slidesPerView: 4,
                    },
                }
            });
            var galleryTop = new Swiper('.gallery-top', {
                spaceBetween: 10,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                thumbs: {
                    swiper: galleryThumbs
                },
            });
            // change carousel item height
            // gallery-top
            let productCarouselTopWidth = $('.gallery-top').outerWidth();
            $('.gallery-top').css('height', productCarouselTopWidth);

            // gallery-thumbs
            let productCarouselThumbsItemWith = $('.gallery-thumbs .swiper-slide').outerWidth();
            $('.gallery-thumbs').css('height', productCarouselThumbsItemWith);

        })
    </script>

@endsection
