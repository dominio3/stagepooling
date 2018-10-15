<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>StagePooling</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/AdminLTE.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">

      * {
        margin: 0;
        padding: 0;
      }
      body {
        font-family: Calibri, sans-serif;
      }
      .background-wrap {
        position: fixed;
        z-index: -1000;
        width: 100%;
        height: 100%;
        overflow: hidden;
        top: 0;
        left: 0;
      }

      #video-bg-elem {
        position: absolute;
        top: 0;
        left: 0;
        min-height: 100%;
        min-width: 100%;
      }
      .content {
        position: absolute;
        width: 100%;
        min-height: 100%;
        z-index: 1000;
        background-color: rgba(0,0,0,0.7);
      }
      .content h1 {
        text-align: center;
        font-size: 65px;
        text-transform: uppercase;
        font-weight: 300;
        color: #fff;
        padding-top: 15%;
        margin-bottom: 10px;
      }
      .content p {
        text-align: center;
        font-size: 20px;
        letter-spacing: 3px;
        color: #aaa;
      }
      .login-box-body{
        border-radius: 10px;
        opacity: 0.7;
      }

    </style>
</head>
<body class="hold-transition login-page">
  <div class="background-wrap">
  <video id="video-bg-elem" preload="auto" autoplay="true" loop="loop" muted="muted" position="inherit" >
    <source src="video/stagepooling.mp4" type="video/mp4">
    Video not supported
  </video>
  </div>
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/home') }}"><b>StagePooling</b></a>
    </div>


    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Login</p>

        <form method="post" action="{{ url('/login') }}">
            {!! csrf_field() !!}

            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif

            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <a href="{{ url('/password/reset') }}">I forgot my password</a><br>
        <a href="{{ url('/register') }}" class="text-center">Register a new membership</a>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/js/app.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
