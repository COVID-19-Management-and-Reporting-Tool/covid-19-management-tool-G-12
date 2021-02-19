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
        <div id="signup-page">
            <div class="signup-page-hdr">
                <span>
                    <i class="lni lni-user"></i>
                    <h2>Register</h2>
                </span>
                <a href="/"><i class="lni lni-home"></i></a>
            </div>
            <div class="signup-form">
                <form action="{{Route('auth.create')}}" method="post">
                @csrf
                <div class="results">
                @if(Session::get('success'))
                <div style="color:green;font-size:40px;">{{Session::get('success')}}</div>

                @endif
                @if(Session::get('fail'))
                <div style="color:red">{{Session::get('fail')}}</div>

                @endif
                </div>
                    <div class="input">
                        <label for="firstname">First Name</label>
                        <i class="lni lni-user"></i>
                        
                        <input type="text" name="firstname" id="firstname" placeholder="eg.John" value="{{old('firstname')}}">
                        <span style="color:red">@error('firstname'){{$message}}@enderror</span>
                    </div>
                    <div class="input">
                        <label for="second">Second Name</label>
                        <i class="lni lni-user"></i>
                        <input type="text" name="secondname" id="secondname" placeholder="eg.Doe"value="{{old('lastname')}}">
                        <span style="color:red">@error('secondname'){{$message}}@enderror</span>
                    </div>
                    <div class="input">
                        <label for="dob">Date of Birth</label>
                        <i class="lni lni-calendar"></i>
                        <input type="text" name="dob" id="dob" placeholder="eg.yyyy-mm-dd" value="{{old('dob')}}"> 
                        <span style="color:red">@error('dob'){{$message}}@enderror</span>
                    </div>
                    <div class="input">
                        <label for="gender">Gender</label>
                        <i class="lni lni-user"></i>
                        <input type="text" name="gender" id="gender" placeholder="eg.male" value="{{old('gender')}}"> 
                        <span style="color:red">@error('gender'){{$message}}@enderror</span>
                    </div>
                    <div class="input">
                        <label for="email">Email</label>
                        <i class="lni lni-user"></i>
                        <input type="email" name="email" id="email" placeholder="eg.davis@90.com"value="{{old('email')}}">
                        <span style="color:red">@error('email'){{$message}}@enderror</span>
                    </div>
                    <div class="input">
                        <label for="password">Password</label>
                        <i class="lni lni-user"></i>
                        <input type="password" name="password" id="password" placeholder="eg.@Davis90"value="{{old('password')}}">
                        <span style="color:red">@error('password'){{$message}}@enderror</span>
                    </div>
                    <div class="form-txt">
                        <p>Already have an account? <a href="login">Login</a></p>
                    </div>
                    <button type="submit">Register</button>
                </form>
                <div class="signup-img"></div>
            </div>
        </div>

    </main>
</body>

</html>