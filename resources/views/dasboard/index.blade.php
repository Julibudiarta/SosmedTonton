<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        <a class="nav-link" href="#" id="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="home">Features</a>
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
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('profile')}}">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('to_upload')}}">upload</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}">Sign Out</a>
                    </li>
                </ul>
            </div>
            <!--card-->
            <div class="col-lg-10 offset-lg-2"style="margin-top: 10px;">
                <div class="row">
                    
             @foreach ($postingan as $content)
                        @csrf
                    <div class="col-md-6 justify-content-md-center d-flex" style="margin-top: 10px; margin-right: -12%;">
                        <div class="card text-center" >
                            <div class="card-header">
                                <div class="icon row align-items-center">
                                    <div class="col-auto">
                                        <span>
                                            <img src="{{$content->foto}}" alt="Deskripsi gambar" class="img-fluid"
                                                style=" height: 40px; width: 40px; border-radius: 100%; margin-left: 80%;">
                                        </span>
                                    </div>
                                    <div class="col">
                                        <h6 style="margin-right: 60%;">{{$content->name}}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <img id="formImg" src="{{$content->gambar}}" class="card-img-top" alt="..." style="width:fit-content; height:100%;max-height:100%; max-width:100%;">
                            </div>
        
                            <div class="card-body">
                                <div class="row">
                                    <div class="col d-flex"style="font-size:2rem;" >
                                    
                                        <form method="POST" class="likeData">
                                            @csrf
                                            <input type="hidden" name="post_id" value="{{ $content->id }}">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            @csrf
                                            @php
                                            $userLike = $userLikes->where('post_id', $content->id)
                                                            ->where('user_id', Auth::id())
                                                            ->first();
                                            $statusLike = $userLike ? true : false;
                                            @endphp
                                            <button type="submit" style="margin-right:5%; color:rgb(255, 89, 116); border:none;" id="btn-like-{{$content->id}}" name="like">
                                                @if($statusLike === true)
                                                <i class="bi bi-heart-fill"></i>
                                                @else
                                                <i class="bi bi-heart"></i>
                                                @endif
                                            </button>
                                        </form> 
                                        <button onclick="commentClick({{$content->id}})" type="submit" style="margin-right:5%; color:rgb(255, 89, 116); border:none;"  name="comment-{{$content->id}}">
                                            <i class="bi bi-chat-left-text"></i>
                                        </button>
    
                                    </div>  
                                            <p class="d-flex">{{$content->caption}}</p>
                                            <p class="d-flex">Lihat Semua {{$content->comment}} Komentar</p> 
                                </div>
                            </div>
        
                            <div class="card-footer text-muted">
                                {{$content->tanggal}}
                            </div>
                        </div>
                    </div>
                {{-- comment form di hide and show --}}
                    <div class="col-md-6">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8 col-lg-6">
                       
                              <div class="card shadow-0 border" style="background-color: #2679f4; display:none; width:80vh;" id="comment-{{$content->id}}">
                                <div class="card-header">
                                    <form class="commentData" method="POST">
                                        <div data-mdb-input-init class="form-outline mt-2">
                                            @csrf
                                            <input type="hidden" name="post_id" value="{{ $content->id }}">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <input type="text" id="addANote-{{$content->id}}" name="addComment" class="form-control" placeholder="Type comment..." />
                                            <button type="submit" >
                                                <i class="bi bi-chat-left-text"></i>
                                            </button>
                                            <label class="form-label" for="addANote">+ Add Comment</label>
                                          </div>
                                    </form>
                                </div>
                                    <div class="comment card-body p-4">        {{-- content coment --}}
                                    
                                        @foreach ($comments as $comment)
                                        @if($comment->id == $content->id)
                                    <div class="card mb-4" style="margin-top:10px; max-width:500px;" >
                                        <div class="card-body">
                                        <p>{{$comment->comment}}</p>
                            
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-row align-items-center">
                                            <img src="{{$comment->foto}}" alt="avatar" width="25"
                                                height="25" />
                                            <p class="small mb-0 ms-2">{{$comment->name}}</p>
                                            </div>
                                            <div class="d-flex flex-row align-items-center">
                                            <p class="small text-muted mb-0">Replay?</p>
                                            <i class="far fa-thumbs-up mx-2 fa-xs text-body" style="margin-top: -0.16rem;"></i>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                        @endif 
                                    {{-- end content comment --}}
                                    @endforeach
                                </div>



                                
                              </div>
                            </div>
                     </div>
                          {{-- end commetn --}}
                        </div>
    
    
             @endforeach 
    
                </div>
        </div>
            
            <!--end card-->

        </div>
    </div>
    </div>

    <!--end side bar-->

    <!--content-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
// function untuk hide and show form komentar
        function commentClick(id) {
            var x = document.getElementById("comment-"+id);
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
         }
//	function untuk mengirim data ke LikeController
        $(document).ready(function(){
            $('.likeData').submit(function(e){
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('likepost') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        console.log(response.success);
                        var postId = response.post_id;
                        $('#btn-like-' + postId).find('i').toggleClass('bi-heart bi-heart-fill');
                    },
                    error:function(xhr, status, error){
                        console.log(xhr.responseJSON);
                        // Tangani error jika ada
                    }
                });
            });
        });
//	function untuk mengirim Data Commeent ke controller ComentController
        $(document).ready(function(){
            $('.commentData').submit(function(e){
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('commentdata') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        console.log(response.success_Comment);
                        var PostID =response.post_id;
                        $('#addANote-'+PostID).val('');
                        
                    },
                    error:function(response){
                        console.log(response.error_Comment);
                        // Tangani error jika ada
                    }
                });
            });
        });

    </script>
</body>

</html>