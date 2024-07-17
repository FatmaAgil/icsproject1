<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>RecycleConnect index page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    #navbar {
      margin-left: auto;
      margin-right: 20px; /* Adjust this value to move it more or less to the left */
    }
  </style>
</head>

<body>

  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div id="logo">
      <h1><a href="welcome.blade.php">RecycleConnect</a></h1>
    </div>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto active" href="/adminDashboard">Home</a></li>
        <li><a class="nav-link scrollto" href="/profile">Profile</a></li>
        <li><a class="nav-link scrollto" href="/events">Events & News</a></li>
        <li><a class="nav-link scrollto" href="/community">Community</a></li>
        <li><a class="nav-link scrollto" href="/guide">Guide</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
  </header>

  @yield('content')
  {{$slot}}

</body>

</html>
