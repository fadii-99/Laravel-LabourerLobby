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
                </ul>
            </nav>
        </div>
    </header>



    <section class="showcase" style="padding:15% 0; background-image: url('{{ asset('images/bg2.jpg') }}');">
        <div class="container container-reg  mar">

            <div></div>
            <div class="box form">
                <form action="{{ URL::to('chkotp') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="data">
                        <h2>OTP CONFIRMATION TAB</h2>
                        <input type="text" placeholder="Enter 6 digit number" name="otp">
                        <input type="text" value="{{ $user->email }}" name="email" style="display: none;">
                        <input type="text" value="{{ $user->user_name }}" name="username" style="display: none;">
                    </div>
                    
                    <div class="action-btn">
                        <button class="form-btn" >CONFIRM</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div></div>
    </section>
    











    <footer>
        <p>Muhammad Fawad &copy; SP20-BCS-122</p>
        <p>Haseeb Shah &copy; SP20-BCS-123</p>
    </footer>






</body>

</html>
