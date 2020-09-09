<!DOCTYPE html>
<html>
<head>
<title>Login</title>
 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--Bootsrap 4 CDN-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{url('style.css')}}">



@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</head>
<body style="background-color: #81ecec;">
<div class="container-fluid" style="margin-top: 100px" >
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-3 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container" style="background-image:url('wikrama.png');">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <div class="p-3 mb-10 bg-white text-dark">
              <h3 class="login-heading mb-4 text-center">Selamat Datang  !</h3>
               <form action="{{url('post-login')}}" method="POST" id="logForm">
 
                 {{ csrf_field() }}

                <div class="form-label-group" >
                  <input type="text" name="name" id="inputName" class="form-control" placeholder="Username" autofocus style="background-color: rgb(228, 255, 219);">
                  <label for="inputName"></label>
 
                  @if ($errors->has('name'))
                  <span class="error">{{ $errors->first('name') }}</span>
                  @endif    
                </div> 
 
                <div class="form-label-group">
                  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password"
                  style="background-color: rgb(228, 255, 219);">
                  <label for="inputPassword"></label>
                   
                  @if ($errors->has('password'))
                  <span class="error">{{ $errors->first('password') }}</span>
                  @endif  
                </div>
 
                <button class="btn btn-lg btn-success btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Login</button>
                <div class="text-center">don't have an account?
                  <a class="small" href="{{url('registration')}}">Sign Up</a></div> 
             
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>