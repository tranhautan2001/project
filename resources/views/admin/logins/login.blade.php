
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Signin Template · Bootstrap v5.0</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .container1{
        width: 100%;
        max-width: 300px;
        height: auto;
        margin: auto;
      }
      main{
        margin-top: 30%;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
<div class="container1">  
<main class="form-signin">
  <form method="POST" action="">
  <div class="form-outline mb-4">
    @if ($message = Session::get('error'))

<div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
</div>
@endif
  </div>
  <div class="form-outline mb-4">
    @if ($message = Session::get('message'))

<div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
</div>
@endif
  </div>
  @csrf   
  <img class="mb-4" src="https://s101.chanh.in/uploads/2023/10/logo.png.webp" alt="" width="200" height="200">
    <h1 class="h3 mb-3 fw-normal">Login Admin</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    <div class="form-floating">
      <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">

        <input class="form-check-input" type="checkbox" name="remember" id="remember"  {!! old('remember') ? 'checked' : '' !!} >
        <label class="form-check-label" for="remember">
            Ghi nhớ đăng nhập
        </label>
      </div>
    </div>
    <div class="col">
      <!-- Simple link -->
      <a href=" ">Forgot password?</a>
    
    </div>
  </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>

</div>
    
  </body>
</html>
