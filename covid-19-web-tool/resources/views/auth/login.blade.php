<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COVID-19 MANAGEMENT</title>
    <link rel="stylesheet" href="css/main.css">
    <link href="your-project-dir/font-css/LineIcons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.lineicons.com/2.0/LineIcons.css">
</head>

<body>
    <main id="account">
        <div id="login-page">
            <div class="login-page-hdr">
                <span>
                    <i class="lni lni-user"></i>
                    <h2>Login</h2>
                </span>
                <a href="/"><i class="lni lni-home"></i></a>
            </div>
            <div class="login-form">
                <form action="{{route('auth.check')}}" method="post">
                    @csrf
                    <div style="color:red; font-size:20px;">
                        @if(Session::get('fail'))
                        <div  style="color:red;font-size:20px;"> 
                            {{Session::get('fail')}}
                        </div>

                        @endif
                    </div>
                    <div class="input">
                        <label for="email">Email</label>
                        <i class="lni lni-envelope"></i>
                        <input type="email" name="email" id="email" placeholder="example@email.com" value="{{old('email')}}">
                        <span style="color:red">@error('email'){{$message}} @enderror</span>
                    </div>
                    <div class="input">
                        <label for="psd">Password</label>
                        <i class="lni lni-lock-alt"></i>
                        <input type="password" name="password" id="psd" value="{{old('password')}}">
                        <span style="color:red">@error('password'){{$message}} @enderror</span>
                    </div>
                    <div class="form-txt">
                        <p>No account? <a href="register">Register</a></p>
                    </div>
                    <button type="submit">Login</button>
                </form>
                <div class="login-img"></div>
            </div>
        </div>

    </main>
</body>

</html>