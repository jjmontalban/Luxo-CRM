<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GBC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- css -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700"
          rel="stylesheet">
    <link href="{{asset("frontend/css")}}/bootstrap.css" rel="stylesheet"/>
    <link href="{{asset("frontend/css")}}/bootstrap-responsive.css" rel="stylesheet"/>
    <link href="{{asset("frontend/css")}}/jcarousel.css" rel="stylesheet"/>
    <link href="{{asset("frontend/css")}}/flexslider.css" rel="stylesheet"/>
    <link href="{{asset("frontend/css")}}/style.css" rel="stylesheet"/>
    <!-- Theme skin -->
    <link href="{{asset("frontend")}}/skins/default.css" rel="stylesheet"/>
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="{{asset("frontend")}}/ico/apple-touch-icon-144-precomposed.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="{{asset("frontend")}}/ico/apple-touch-icon-114-precomposed.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="{{asset("frontend")}}/ico/apple-touch-icon-72-precomposed.png"/>
    <link rel="apple-touch-icon-precomposed" href="{{asset("frontend")}}/ico/apple-touch-icon-57-precomposed.png"/>
    <link rel="shortcut icon" href="{{asset("frontend")}}/ico/favicon.png"/>

</head>

<body>
<div id="app">
    <div id="wrapper">
        <admin-master></admin-master>
    </div>
</div>

{{-- <a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>
 --}}<!-- javascript
  ================================================== -->
<script src="{{ asset('js/app.js') }}"></script>
<!-- Placed at the end of the document so the pages load faster -->


<!-- Template Custom JavaScript File -->
<script src="{{asset("frontend/js")}}/custom.js"></script>


</body>
</html>
