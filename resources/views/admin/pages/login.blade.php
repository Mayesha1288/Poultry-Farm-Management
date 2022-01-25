
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<link rel="stylesheet" type="text/css" href="{{url('assets/css/login.css')}}">
<!------ Include the above in your HEAD tag ---------->

<!--author:starttemplate-->
<!--reference site : starttemplate.com-->



@if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>
                <p class="alert alert-danger">{{$error}}</p>
            </div>
        @endforeach
    @endif

    @if(session()->has('msg'))
        <p class="alert alert-success">{{session()->get('msg')}}</p>
    @endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords"
          content="unique login form,leamug login form,boostrap login form,responsive login form,free css html login form,download login form">
    <meta name="author" content="leamug">
    <title>My POULTRY Farm| Where we get the fresh products</title>
    <link href="css/style.css" rel="stylesheet" id="style">
    <!-- Bootstrap core Library -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <!-- Font Awesome-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-4 text-center">
            <h1 class='text-white'>My Poultry Farm !!!!!!</h1>
              <div class="form-login"></br>
                <h4>Secure Login</h4>
                </br>
                <form action="{{route('admin.doLogin')}}" method="post">
                    @csrf
                    <input type="email" name="email" class="form-control input-sm chat-input" placeholder="email"/>
                    </br></br>
                    <input type="password" name="password" class="form-control input-sm chat-input" placeholder="password"/>
                    </br></br>
                    <div class="wrapper">
                            <span class="group-btn">
                                
                                <button type="submit" class="btn btn-primary">LOGIN</button>
                            </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </br></br></br>
</div>
</body>
</html>