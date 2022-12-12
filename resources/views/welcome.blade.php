@extends('master')
@section('userDashboard')

    <!---==================slider start====================-->
    <section class="slider-part">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme slider-carousel">

                        @foreach($slider as $item)
                        <div class="item">
                            <a href="#">
                                <img src="{{asset('images/'. $item->image)}}" alt="slider img not found">
                            </a>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---==================slider end====================-->


    <!--=========Product banner start===================-->
    <section class="p-tb-60 section-bg">
        <div class="container container-xxl">
            <div class="row">
                <?php $iteration = 0 ?>
                @foreach($latest as $item)
                    <?php $iteration = $iteration+1 ?>
                    @if($iteration == 2)
                    <div class="col-md-4">
                    <div class="banner banner-border">
                        <a href="exclusive_product.html">
                            <img src="{{asset('images/' . $item->image1)}}" class="img-responsive" alt="">
                        </a>
                        <div class="banner-content">
                            <div class="banner-title">
                                <h3>Exclusive collection</h3>
                            </div>
                            <a href="exclusive_product.html" class="link1">
                                Discover Now
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="banner-content-out">
                            <h3>Exclusive collection</h3>
                            <p>Grab Your Product</p>
                    </div>
                    </div>
                    
                    @else
                        <div class="col-md-4">
                    <div class="banner banner-border">
                        <a href="exclusive_product.html">
                            <img src="{{asset('images/' . $item->image1)}}" class="img-responsive" alt="">
                        </a>
                        <div class="banner-content">
                            <div class="banner-title">
                                <h3>Exclusive collection</h3>
                            </div>
                            <a href="exclusive_product.html" class="link1">
                                Discover Now
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </a>
                        </div>
                    </div>
                    </div>
                    
                    @endif

                @endforeach
            </div>
        </div>
    </section>

    <!--=========Product banner end=====================-->

    <!--===========product category slider======-->
    <section class="p-tb-60  pattern-3" style="position: relative;">
        <div class="container-fluid">
            <div class="heading">
                <h2>
                    Product category
                </h2>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="owl-carousel owl-theme product-carousel">
                        <div class="item text-center">
                            <a href="#">
                                <img src="assets/img/product/jubba/1x1/j1.png" alt="slider img not found">
                                <span>Panjabi</span>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="assets/img/product/tupi/1x1/t1.png" alt="slider img not found">
                                <span>Tupi</span>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="assets/img/product/jubba/1x1/j1.png" alt="slider img not found">
                                <span>Jubba</span>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="assets/img/product/fragrance/1x1/a1.png" alt="slider img not found">
                                <span>Fragrance</span>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="assets/img/product/tupi/1x1/t1.png" alt="slider img not found">
                                <span>Tupi</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===========product category slider======-->

    <!--===========new arrivals start============-->
    <!--== Page Content Wrapper Start ==-->
    <div id="page-content-wrapper" class="pt-60">
        <div class="container container-xxl">
            <div class="heading">
                <h2>
                    Our Products
                </h2>
            </div>

            <!-- Shop Page Content Start -->

            <div class="shop-page-content-wrap">
                <div class="shop-page-products-wrap">
                    <div class="products-wrapper">
                        <div class="row">
                        @foreach($top as $item)
                            <div class="col-lg-3 col-sm-6 col-6 p-x-5">
                                <!-- Single Product Item -->
                                <div class="single-product-item text-center mb-3">
                                    <figure class="product-thumb">
                                        <a href="{{'/product/details/' . $item->id}}"><img src="{{asset('images/'. $item->image1)}}" class="pro-img"
                                                alt="Products" class="img-fluid"></a>
                                    </figure>

                                    <div class="product-details">
                                        
                                        <h2><a href="{{'/product/details/' . $item->id}}" class="pro-name">{{$item->productName}}</a></h2>
                                        <div class="product-code">
                                            <span class="code-title">Product Code: </span>
                                            <span class="code-no">S-3254</span>
                                        </div>
                                        <div class="price-div">
                                            <span class="price">{{"BDT ". $item->price}}</span>
                                            <span class="discount-price line-through">BDT 1500</span>
                                        </div>

                                        <form>
                                        <input type="hidden" class="pro-id" value="{{$item->id}}"/>
                                        <button type="button" class="btn-add-to-cart btn-submit" >
                                            
                                                +Add to Cart
                                          
                                        </button>
                                        </form>
                                       
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

            <div class="row">
                <div class="col-md-12">
                    <div class="view-more">
                        <a href="product_list.html">
                            <i class="fas fa-eye"></i>
                            view more

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== Page Content Wrapper End ==-->
    <!--===========new arrivals end============-->

    <!--============product banner image =======-->
    <section class="p-tb-60">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="product-banner-2">
                        <a href="product_list.htmk">
                            <img src="assets/img/banner/012.jpg" class="img-responsive" alt="banner image not found">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============product banner image =======-->

    <!--=================news letter==========-->

    <section class="p-tb-60 section-bg">
        <div class="container container-xxl">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="newsletter-section">
                        <h1 class="title">Join our Newsletter</h1>
                        <div class="input-wrapper">
                            <label for="newsletter" class="label-text">Enter your Email to Join</label>
                            <input type="text" id="newsletter">
                            <button class="btn arrow-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================news letter==========-->







   
   <!---- <script type="text/Javascript">
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

   
    </script>----->
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
     
     <script type="text/javascript">
    $(".btn-submit").click(function(e){
        e.preventDefault();

        var $button = $(this);
        var productId = $button.parent().find("input").val();
        var quantity = 1;

        $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });

   $.ajax({
          type:'POST',
          url:"{{ route('addToCart') }}",
          data:{productId:productId, quantity:quantity},
          success:function(data){
             console.log(JSON.parse(data.cart));
          }
       });
  
    });
   
  
</script>

    <script>
        /******newsletter */
        let input = document.querySelector('#newsletter');
        let labelText = document.querySelector('.label-text');
        let root = document.querySelector('body');

        input.addEventListener('click', () => {
            labelText.classList.add('label-text-up');
        });

        document.addEventListener('mousedown', () => {
            if (!input.value) {
                labelText.classList.remove('label-text-up');
            }
        });
    </script>

@endsection
