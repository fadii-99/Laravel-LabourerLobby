<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Already Hired</title>
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



    <section class="showcase" style="opacity:1; background-image: url('{{ asset('images/bg2.jpg') }}');">
        <div class="container confirmtab mar">
            <h1>Already Hired</h1>
            <hr>
            <br>
            <br>
            <br>

            <div class="labour-deail">
                <br>

                <h3 style="color: black">You have Already Hired <u>{{ $worker->worker->name }}</u></h3>  
                <p style="color: black"><strong>Date:</strong> {{ $worker->date }}&nbsp;&nbsp; | &nbsp;&nbsp;
                    <strong>Time:</strong> {{ $worker->hired_time }}
                </p>
                <div class="action-btn">
                    <a class="form-btn" href="{{ URL::to('profileH') }}">Profile</a>&nbsp;&nbsp;
                    &nbsp;&nbsp;  <a class="form-btn" href="{{ URL::to('lobby') }}">Lobby</a>
                </div>
            </div>

    </section>




    <footer>
        <p>Muhammad Fawad &copy; SP20-BCS-122</p>
        <p>Haseeb Shah &copy; SP20-BCS-123</p>
    </footer>






</body>

</html>
