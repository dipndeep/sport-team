<!DOCTYPE html>
<html lang="en">

<head>
   <title>@yield('title')</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="background-color: #e5e5e5;">
   <div>
      <nav class="navbar navbar-expand-lg" style="background-color: #14213d;">
         <div class="container">
            <a class="navbar-brand" href="/" style="color: #ffffff;"> <b>UTS Ganendra</b> </a>
            <button class="navbar-toggler" style="color:#ffffff" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon" style="color:#ffffff"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
               <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="/" style="color: #ffffff;">Beranda</a>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #ffffff;">
                        Informasi
                     </a>
                     <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('baskets.index') }}">Tim Basket</a></li>
                        <li><a class="dropdown-item" href="{{ route('bolas.index') }}">Tim Bola</a></li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/about" style="color: #ffffff;">Tentang</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
   </div>

   <div class="container mt-4">
      @yield('content')
   </div>
</body>

</html>