<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Home</title>
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
                    <li><a class="effect" href="{{ URL::to('lobby') }}">LOBBY</a></li>
                    <li><a class="effect" href="{{ URL::to('login') }}">Login</a></li>
                    <li><a class="effect" href="{{ URL::to('signup') }}">Signup</a></li>
                    <li><a class="effect" href="{{ URL::to('complainout') }}">COMPLAIN</a></li>
                </ul>
            </nav>

        </div>
    </header>



    <section class="showcase" style="background-image:url('images/bg2.jpg');opacity:1;">
        <div class="container mar indexcon">
            <h1>Platform For <br> Daily Wages Worker</h1>
            <p>GET THE WORKER OF YOUR CHOICE </p>
        </div>
    </section>


    <section class="banner-text">
        <div class="container container-banner">
            <h1>Want An Upgrade In LIFE</h1>
            <a href="{{ URL::to('signup') }}" class="form-btn">
                Create Account
            </a>
        </div>
    </section>









    <footer>
        <p>Muhammad Fawad &copy; SP20-BCS-122</p>
        <p>Haseeb Shah &copy; SP20-BCS-123</p>
    </footer>






</body>

</html>
