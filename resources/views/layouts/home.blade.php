<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bislat - Multi-purpopse E-commerce</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="description" content="big-deal">
  <meta name="keywords" content="big-deal">
  <meta name="author" content="big-deal">
  <link rel="icon" href="{{ asset('images/favicon/favicon.ico') }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{ asset('images/favicon/favicon.ico') }}" type="image/x-icon">

  <!--Google font-->
  <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

  <!--icon css-->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/themify.css') }}">

  <!--Slick slider css-->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}">

  <!--Animate css-->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
  <!-- Bootstrap css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">

  <!-- Theme css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/color2.css') }}" media="screen" id="color">

  <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
</head>
<body class="bg-light ">

<!-- loader start -->
<div class="loader-wrapper">
  <div>
    <img src="{{ asset('images/loader.gif')}}" alt="loader">
  </div>
</div>
<!-- loader end -->

<!--header start-->
@include('partials.header')
<!--header end-->

@yield('content')

@include('partials.footer')

<!-- latest jquery-->
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

<!-- slick js-->
<script src="{{ asset('js/slick.js') }}"></script>

<!-- popper js-->
<script src="{{ asset('js/popper.min.js') }}" ></script>

<!-- Timer js-->
<script src="{{ asset('js/menu.js') }}"></script>

<!-- Bootstrap js-->
<script src="{{ asset('js/bootstrap.js') }}"></script>

<!-- Bootstrap js-->
<script src="{{ asset('js/bootstrap-notify.min.js') }}"></script>

<!-- Theme js-->
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/slider-animat.js') }}"></script>
<script src="{{ asset('js/timer.js') }}"></script>
<script src="{{ asset('js/modal.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script>
  @if(Session::has('success'))
      toastr.success("{{ Session::get('success') }}")
  @endif

  @if(Session::has('info'))
      toastr.info("{{ Session::get('info') }}")
  @endif
</script>
<script>
  $(document).ready(function(){
    @php
      if (@$_SESSION["is_shipping_address_same"] == "yes") {
    @endphp
    $("#shipping :input").prop("disabled", true);
    $("#shipping").hide();
    @php
      }
    @endphp
    $("input[name='is_shipping_address_same']").click(function() {
      var radio_value = $(this).val();
      if(radio_value == "yes"){
        $("#shipping :input").prop("disabled", true);
        $("#shipping").hide();
      }else if(radio_value == "no"){
        $("#shipping :input").prop("disabled", false);
        $("#shipping").show();
      }
    });
  })
</script>
</body>
</html>
