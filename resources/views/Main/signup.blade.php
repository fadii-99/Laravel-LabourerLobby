<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Signup</title>
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
                    <li><a class="effect" href="/">Home</a></li>
                    <li><a class="effect" href="{{ URL::to('lobby') }}">LOBBY</a></li>
                    <li><a class="effect" href="{{ URL::to('login') }}">Login</a></li>
                    <li><a class="effect" href="{{ URL::to('complain') }}">COMPLAIN</a></li>
                </ul>
            </nav>
        </div>
    </header>




    <section class="showcase" style="background-image:url('images/bg2.jpg');opacity:1;">
        <div class="container container-reg  mar">
            <div class="box img">
                <img src="{{ asset('images/user.png') }}">
                <h2>USER SIGNUP FORM</h2>
            </div>

            <div class="box form">
                <form action="{{ URL::to('add-user/') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="data">
                        <h2>
                            SIGNUP CREDENTIALS
                        </h2>

                        <input type="email" name="email" pattern="[a-zA-Z0-9./%-+]+@[a-z]+.com" placeholder="Email">
                        <input type="text" name="user_name" placeholder="User Name ">
                        <input type="password" name="password" placeholder="Password" pattern=".{8,}"><br>
                        <label style="font-size:12px;">Please Enter Atleast 8 Characters</label>

                        <br>
                        <select name="type">
                            <option>Select Your Account Type</option>
                            <option value="hirer">Hirer</option>
                            <option value="worker">Worker</option>
                        </select>
                    </div>

                    <button id="btn2" class="signup-btn">
                        SIGNUP
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
