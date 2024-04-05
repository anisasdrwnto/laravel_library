<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<strong><div>Perpus<span>&nbsp;24</span></span></div></strong>
		</div>
		<br>
		<div class="login">
            <form action="{{route('login')}}" method="POST">
                @csrf
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <input type="text" placeholder="username" name="username"><br>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                             <input type="password" placeholder="password" name="password"><br>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <button class="button-login" type="submit">Login</button>
                        </div>
                    </div>
            </form>			
		</div>
    </div>
   
</body>
</html>
