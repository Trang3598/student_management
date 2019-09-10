<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">

        <div class="main" style="padding: 10px;border-radius: 10px;margin-top: 200px">

            <h3>Please Log In, or <a href="students/create">Sign Up</a></h3>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <a href="#" class="btn btn-lg btn-primary btn-block">Facebook</a>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <a href="#" class="btn btn-lg btn-info btn-block">Google</a>
                </div>
            </div>

            <div class="login-or">
                <hr class="hr-or">
                <span class="span-or">or</span>
            </div>

            {!! Form::open(['method' => 'POST', 'route' => ['users.login']]) !!}
                <div class="form-group">
                    <label for="inputUsernameEmail">Username or email</label>
                    {!! Form::text('email',old('email'),['class'=>"form-control",'id'=>"inputUsernameEmail"]) !!}
                </div>
                <div class="form-group">
                    <a class="pull-right" href="#">Forgot password?</a>
                    <label for="inputPassword">Password</label>
                    <input name="password" type="password" class="form-control" id="inputPassword">
                </div>
                <div class="checkbox pull-right">
                    <label>
                        <input type="checkbox">
                        Remember me </label>
                </div>
                <button type="submit" class="btn btn btn-primary">
                    Log In
                </button>
            {!! Form::close() !!}
            @if(session('login'))
                <div class="alert alert-success">
                    {{ session('login') }}
                </div>
            @endif
            @if(count($errors))
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif
            @endif
        </div>

    </div>
</div>
<style>
    body {
        padding-top: 15px;
        font-size: 12px
    }

    .main {
        max-width: 320px;
        margin: 0 auto;
    }

    .login-or {
        position: relative;
        font-size: 18px;
        color: #aaa;
        margin-top: 10px;
        margin-bottom: 10px;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .span-or {
        display: block;
        position: absolute;
        left: 50%;
        top: -2px;
        margin-left: -25px;
        background-color: #fff;
        width: 50px;
        text-align: center;
    }

    .hr-or {
        background-color: #cdcdcd;
        height: 1px;
        margin-top: 0px !important;
        margin-bottom: 0px !important;
    }

    h3 {
        text-align: center;
        line-height: 300%;
    }
</style>
