<!DOCTYPE html>
<html lang="en">
    <head>
       <meta Charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie-edge">
       <title>User Register</title>
       <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" >
    </head>
    <body class="antialiased">
    <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> User Sign In </h2>
   

    <!-- Icon -->
    

    <!-- Login Form -->
    <form action="{{route('user.create')}}" method="post">
     @if(Session::get('fail'))
            <div class="alert alert-danger">
            {{Session::get('fail')}}
            </div>
            @endif
      @csrf
      <input type="text" id="name" class="fadeIn second" name="name" value="{{old('name')}}" placeholder="Name">
      <span class="text-danger">@error('name'){{$message}}@enderror</span>  
      <input type="text" id="login" class="fadeIn second" name="email" value="{{old('email')}}" placeholder="Email">
      <span class="text-danger">@error('email'){{$message}}@enderror</span>     
      <input type="password" id="password" class="fadeIn third" name="password" value="{{old('password')}}" placeholder="password">
      <span class="text-danger">@error('password'){{$message}}@enderror</span>     
     
      <input type="password" id="cpassword" class="fadeIn second" name="cpassword" value="{{old('cpassword')}}" placeholder="Confirm password">
      <span class="text-danger">@error('cpassword'){{$message}}@enderror</span>  
      <input type="submit" class="fadeIn fourth" value="Register">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
    <a href="{{route('user.login')}}">Sign in</a>
    </div>

   
  </div>
    </body>
</html>