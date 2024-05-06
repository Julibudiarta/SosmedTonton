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
    <link href="https://unpkg.com/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <title>Dashboard</title>

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-secondary" id="nav">
        <div class="container-fluid">
            <a class="navbar-brand me-auto" href="#">
                <img src="" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
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
                        <a class="nav-link" href="{{url('profile')}}">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Upload</a>
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
                        <a class="nav-link" href="{{url('profile')}}">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Upload</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}">Sign Out</a>
                    </li>
                </ul>
            </div>


            <!--card-->



            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-wight-light my-4">Postingan</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('uploads') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-4 d-flex justify-content-center">
                                            <img id="selectedImage"
                                                src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg"
                                                alt="example placeholder"
                                                style="width: 300px; border-radius: 8px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);" />
                                        </div>

                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="customFile1" name="img_post"
                                                aria-describedby="inputGroupFileAddon04" aria-label="Upload"
                                                onchange="displaySelectedImage(event, 'selectedImage')">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-text">Caption</span>
                                            <textarea class="form-control" aria-label="With textarea" name="caption"></textarea>
                                        </div>
                                        <div
                                            class="form-group d-flex align-items-center justify-content-center mt-4 mb-0 text-center">
                                            <button class="btn btn-primary btn-block" type="submit">Upload</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!--end card-->

        </div>
    </div>
    </div>


</body>
<script>
    function displaySelectedImage(event, elementId) {
        const selectedImage = document.getElementById(elementId);
        const fileInput = event.target;

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                selectedImage.src = e.target.result;
            };

            reader.readAsDataURL(fileInput.files[0]);
        }
    }

</script>

</html>
