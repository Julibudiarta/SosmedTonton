<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Logni</title>
</head>
<body class="bg-none">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                {{--Error Alert--}}
                                @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{session('error')}}
                                    
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                <div class="card-header">
                                    <h3 class="text-center font-wight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{url('proses_login')}}" method="POST" id="loginForm">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        @if($errors->has('login_gagal'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <span class="alert-inner--text"><strong>Warning!</strong>{{$errors->first('login_gagal')}}</span>
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div> 
                                    @endif

                                        <label class="small mb-1" for="inputEmailAddress">Username</label>
                                        <input type="text" class="form-control py-4" id="inputEmailAddress" name="name" placeholder="Masukan Username anda"/>
                                        @if($errors->has('username'))
                                        <span class="error">{{$errors->first('username')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassowrd" class="small mb-1">Password</label>
                                        <input type="password" class="form-control py-4" id="inputPassword" name="password" placeholder="Masukan Password anda"/>
                                        @if($errors->has('password'))
                                        <span class="error">{{$errors->first('password')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="rememberPassword">
                                            <label for="rememberPassword" class="custom-control-label">Remember Password</label>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        {{--<a class="small" href="#">Forget Password?</a>--}}
                                        <button class="btn btn-primary btn-block" type="submit">Login</button>
                                    </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small">
                                        <a href="{{url('register')}}">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
</body>
</html>