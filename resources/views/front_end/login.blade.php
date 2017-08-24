<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Day 001 Login Form</title>
  <base href="{{asset('')}}">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
  <link rel="stylesheet" href="public/css/style.css">
  <script src="public/js/jquery-3.2.1.min.js" charset="utf-8"></script>
  <script src="public/js/script.js" charset="utf-8"></script>
</head>
<body>
  <div class="login-wrap">
    @if(count($errors)>0)
     <div class="alert alert-danger">
         @foreach($errors->all() as $error)
            {{$error}} <br>
         @endforeach
     </div>
   @endif
   @if(session('mess'))
     <div class="alert alert-success">
         {{session('mess')}}
     </div>
   @endif
    <div class="login-html">
      <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
      <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
      <div class="login-form">

        <div class="sign-in-htm">
          <form action="login" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="group">
              <label for="user" class="label">Email</label>
              <input id="user" type="text" class="input" name = "email">
              <p class="error_mes_email">*Email is not valid</p>
            </div>
            <div class="group">
              <label for="pass" class="label">Password</label>
              <input id="pass" type="password" class="input" data-type="password" name = "pass">
              <p class="error_mes_pass">*pass is not valid</p>
            </div>
            <div class="group">
              <input type="submit" class="button" value="Sign In">
            </div>
            <div class="hr"></div>
            <div class="foot-lnk">
              <a href="#forgot">Forgot Password?</a>
            </div>
          </form>
        </div>
			</div>
		</div>
	</div>
</div>


</body>
</html>
