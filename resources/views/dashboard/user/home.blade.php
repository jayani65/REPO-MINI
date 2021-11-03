<!DOCTYPE html>
<html lang="en">
    <head>
       <meta Charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie-edge">
       <title>Home</title>
       <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body class="antialiased">
      <div class="container">
        <div class="row">
         <a href="{{route('user.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
         <form action="{{route('user.logout')}}" method="post" clas="d-none" id="logout-form">@csrf</form>
          
        </div> 
      </div>  
    </body>
</html>