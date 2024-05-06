<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="stylee.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>

    <section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>


              <form method="POST" action="{{url('registeer')}}">
                @csrf

                @if($errors->has('password_salah'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-inner--text"><strong>Warning!</strong>{{$errors->first('password_salah')}}</span>
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> 
            @endif
            @if($errors->has('username_error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-inner--text"><strong>Warning!</strong>{{$errors->first('username_error')}}</span>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
             @endif
             @if($errors->has('kosong'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-inner--text"><strong>Warning!</strong>{{$errors->first('kosong')}}</span>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
             @endif
             @if($errors->has('email_error'))
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <span class="alert-inner--text"><strong>Warning!</strong>{{$errors->first('email_error')}}</span>
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div> 
              @endif
                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" class="form-control form-control-md" name="name" placeholder="Masukan Username" />
                  <label class="form-label" for="form3Example1cg">Your Name</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="email" id="form3Example3cg" class="form-control form-control-md" name="email" placeholder="Masukan E-mail Anda"/>
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" class="form-control form-control-md" name="password" placeholder="Buat Password" />
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="password" id="form3Example4cdg" class="form-control form-control-md" name="passwordSecond" placeholder="Konfirmasi Password"/>
                  <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                </div>



                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-success btn-block btn-md gradient-custom-4 text-body">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="{{url('login')}}"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>
