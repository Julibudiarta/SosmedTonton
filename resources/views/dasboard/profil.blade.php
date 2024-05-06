<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleP.css">
    <link href="https://unpkg.com/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="profil.css">

    <title>Dashboard</title>

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-secondary" id="nav">
        <div class="container-fluid">
            <a class="navbar-brand me-auto" href="#">
                <img src="" alt="Logo" width="30" height="24" class="d-inline-block align-text-top text-white">
                TONTON
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" data-bs-toggle="collapse">
                <ul class="navbar-nav ms-auto">
                    <!-- ms-auto untuk membuat item navbar berada di kanan -->
                    <li class="nav-item">
                        <div class="container-fluid">
                            <form class="d-flex" role="search">
                              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                              <button class="btn btn-outline-dark" type="submit">Search</button>
                            </form>
                          </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('admin.index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('to_upload')}}">Upload</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}">Sign Out</a>
                    </li>
                 
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="container">
        <div class="row">
            <div class="col-lg-2 sidebar bg-secondary text-white">
                <h2>TONTON</h2>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('admin.index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('to_upload')}}">Upload</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}">Sign Out</a>
                    </li>
                </ul>
            </div>
            <!--card-->
            <div class="padding" id="pro">
                <div class="col-md-8">
                    <!-- Column -->
                    <div class="card"> <img class="card-img-top" src="background/latar.jpeg" alt="Card image cap">
                        <div class="card-body little-profile text-center">
                            @auth
                                
                            
                            <div class="pro-img">
                                <div class="imgBack">
                                    <img id="userImg" src="{{Auth::User()->foto}}" alt="user">
                                    <form id="formPp" action="{{route('edit_profil')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="pp" id="fileInput" style="display: none;">
                                        <i id="changeBtn"><strong>Change</strong></i>
                                       
                                    </form>
                                    
                                </div>
                            </div>
                              
                            <h3 class="m-b-0 text-strong">{{Auth::User()->name}}</h3>
                            <a href="javascript:void(0)" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">Follow</a>
                            @endauth
                            <div class="row text-center m-t-20">
                                <div class="col-lg-4 col-md-4 m-t-20">
                                    <h3 class="m-b-0 font-light">{{$count_post}}</h3><small>Postingan</small>
                                </div>
                                <div class="col-lg-4 col-md-4 m-t-20">
                                    <h3 class="m-b-0 font-light">{{$data}}</h3><small>like</small>
                                </div>
                                <div class="col-lg-4 col-md-4 m-t-20">
                                    <a href="#" style="color:black;" ><i class="bi bi-plus-circle" style="font-size: 1rem;"></i> <small class="">Add</small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--end card-->

        </div>
    </div>
    </div>

    <!--end side bar-->

    <!--content-->
<script>
    var img = document.getElementById('userImg');
    var btn = document.getElementById('changeBtn');
    var fileInput = document.getElementById('fileInput');

    img.addEventListener('mouseover', function() {
        btn.style.display = 'block';
    });

    img.addEventListener('mouseout', function() {
        btn.style.display = 'none';
    });
    btn.addEventListener('mouseover', function() {
        btn.style.display = 'block';
    });
    btn.addEventListener('mouseout', function() {
        btn.style.display = 'none';
    });
    // button krlik funciton
    btn.addEventListener('click', function() {
        document.getElementById('fileInput').click();
    });
    //proses
    fileInput.addEventListener('change', function() {
        var fileName = fileInput.files[0].name;
        console.log('File dipilih:',fileName);
        document.getElementById('formPp').submit();

    });

</script>
</body>

</html>