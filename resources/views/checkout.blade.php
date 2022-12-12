<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Maknoon Lifestyle</title>

    <!---===========favicon=====-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/logo/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/logo/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/logo/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/img/logo/favicon/site.webmanifest">

    <!--======== Bootstrap 4.6===-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--======== font awesome===-->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <!---======= owl carousel======-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">

    <!---======= Header css-->
    <link rel="stylesheet" href="assets/css/header-css/reset.min.css">
    <!---==========zoom css=========-->
    <link rel="stylesheet" href="assets/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/easyzoom.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">


</head>
<body>


<form>
  <div class="form-row">
  <div class="col-8">
  <div class="form-group col-md-8">
      <label for="inputName">Name</label>
      <input type="text" class="form-control" id="inputName" placeholder="Name">
    </div>
    <div class="form-group col-md-8">
      <label for="inputPhone">Phone</label>
      <input type="text" class="form-control" id="inputPhone" placeholder="Phone">
    </div>
    <div class="form-group col-md-8">
      <label for="inputEmail">Email</label>
      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
    </div>
  </div>
  <div class="form-group col-md-8">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
</div>
  <div class="form-row col-md-10">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <select id="inputCity" class="form-control">
      <option selected>Dhaka</option>
        <option>Narayanganj</option>
        <option>Demra</option>

      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
  <button type="submit" class="btn btn-primary checkout-btn">Checkout</button>
  </div>
</form>


 <!---=====jquery====-->
 <script src="assets/js/jquery-3.6.0.min.js"></script>
    <!--=====popper js=====-->
    <script src="assets/js/popper.min.js"></script>
    <!--=====bootstrap=====-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--=====Owl carousel=====-->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!--=====header script=====-->
    <script src="assets/js/script.js"></script>
    <!--=====header script=====-->
    <script src="assets/js/main.js"></script>
    <script type="text/Javascript">
       $(".checkout-btn").click(function(e){
        e.preventDefault();
        var $button = $(this);
        var name = $button.parent().siblings().find("input#inputName").val();
        var email = $button.parent().siblings().find("input#inputEmail").val();
        var phone =  $button.parent().siblings().find("input#inputPhone").val();
        var address = $button.parent().siblings().find("input#inputAddress").val();
        var city = $button.parent().siblings().find("select#inputCity").val();
        var zip = $button.parent().siblings().find("input#inputZip").val();
       console.log(name,email,phone,address,city,zip);

       
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
      $.ajax({
        type:'POST',
        url:"{{ route('checkout') }}",
        data:{name:name, email:email, phone:phone, address:address, city:city, zip:zip},
        success: function(data){
            console.log('hiiiiiiiiiii');
        }
      });



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

</body>
</html>