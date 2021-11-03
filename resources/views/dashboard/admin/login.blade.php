<!DOCTYPE html>
<html lang="en">
    <head>
      
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie-edge">
       <title>Admin Login</title>
       <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" >
    </head>
    <body class="antialiased">
     
    
    <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Admin Sign In </h2>
   

    <!-- Icon -->
    

    <!-- Login Form -->
    <form action="{{route('admin.check')}}" method="post">
    @if(Session::get('fail'))
            <div class="alert alert-danger">
            {{Session::get('fail')}}
            </div>
            @endif
          @csrf
      <input type="text" id="login" class="fadeIn second" name="email" value="{{old('email')}}" placeholder="Email">
      <span class="text-danger">@error('email'){{$message}}@enderror</span>     
      <input type="password" id="password" class="fadeIn third" name="password" value="{{old('password')}}" placeholder="password">
      <span class="text-danger">@error('password'){{$message}}@enderror</span>     
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
   
  </div>
</div>




    </body>
</html>