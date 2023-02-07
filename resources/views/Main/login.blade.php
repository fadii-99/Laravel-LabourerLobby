<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>User Login Form</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">

</head>

<body>

    <header>
        <div class="container">
            <div class="logo">
                <h1>LABOUR LOBBY</h1>
            </div>
            <nav>
                <ul>
                    <li><a class="effect" href="{{ URL::to('index') }}">Home</a></li>
                    <li><a class="effect" href="{{ URL::to('lobby') }}">LOBBY</a></li>
                    <li><a class="effect" href="{{ URL::to('signup') }}">REGISTER</a></li>
                    <li><a class="effect" href="{{ URL::to('complainout') }}">COMPLAIN</a></li>

                </ul>
            </nav>
        </div>
    </header>






    <section class="showcase" style="background-image:url('images/bg2.jpg');opacity:1;">
        <div class="container container-reg  mar">
            <div class="box img">
                <img src="{{ asset('images/user.png') }}">
            </div>


            <div class="box form">
                <form action="{{ URL::to('Login') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="data">
                        <h2>LOGIN CREDENTIALS</h2>
                        <div>&nbsp;</div>
                        <div>&nbsp;</div>
                        <input type="text" name="user_name" placeholder="username" style="min-width: 250px;">
                        <div>&nbsp;</div>
                        <input type="password" name="pass" placeholder="Password" style="min-width: 250px;">
                        <div>&nbsp;</div>
                    </div>

                    <button class="signup-btn">
                        LOGIN
                    </button>
                </form>
            </div>
        </div>
    </section>






    <footer>
        <p>Muhammad Fawad &copy; SP20-BCS-122</p>
        <p>Haseeb Shah &copy; SP20-BCS-123</p>
    </footer>



</body>

</html>
