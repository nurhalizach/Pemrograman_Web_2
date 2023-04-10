<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/personalStyle.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" style="background-color: #002B5B; height:70px;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#" style="color: #EA5455; font-size:2em;">Art Gallery</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" style="color: #EA5455; padding-top:15px;" aria-current="page" href="{{route('gallery')}}">Home</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <div class="kiri">
      <div class="sidebar">
        <a href="{{ route('lukisan.showDataLukisan') }}"><i class="fa fa-fw fa-wrench"></i>Data Lukisan</a>
        <a href="{{ route('user.showDataUser') }}"><i class="fa fa-fw fa-user"></i> Data User</a>
        <a href="{{ route('login.logout') }}"><i class="fa fa-fw fa-envelope"></i> Logout</a>
      </div>
    </div>
    <div class="kanan">
          <div class="container mt-4">
            @yield('container')
        </div>
    </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>