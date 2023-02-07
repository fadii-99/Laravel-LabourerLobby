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
                    <li><a class="effect" href="{{ URL::to('adhirer') }}">HIRERS</a></li>
                    <li><a class="effect" href="{{ URL::to('adworker') }}">WORKERS</a></li>
                    <li><a class="effect" href="{{ URL::to('adhistory') }}">HISTORY</a></li>
                    <li><a class="effect" href="{{ URL::to('adcomplain') }}">COMPLAINS</a></li>
                </ul>
            </nav>

        </div>
    </header>



    <section class="showcase" style="background-image:url('images/bg2.jpg');opacity:1;">
        <div class="container mar indexcon">
            <h1>Admin Control Pannel</h1>
            <br>
            <br>
            <br>
            <a class="form-btn" href="{{ URL::to('adhirer') }}">HIRERS</a>
            <a class="form-btn" href="{{ URL::to('adworker') }}">WORKERS</a>
            <a class="form-btn" href="{{ URL::to('adhistory') }}">HISTORY</a>
            <a class="form-btn" href="{{ URL::to('adcomplain') }}">COMPLAINS</a>
            <div id="divmargin"></div>
    </section>











    <footer>
        <p>Muhammad Fawad &copy; SP20-BCS-122</p>
        <p>Haseeb Shah &copy; SP20-BCS-123</p>
    </footer>






</body>

</html>
