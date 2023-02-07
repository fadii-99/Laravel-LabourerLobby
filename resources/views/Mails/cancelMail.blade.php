<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hiring Request Rejected</h1>
    <br>
    <hr>
    <br>
    <p>Hello {{$h}}, your requested to hire {{$w->name}} is <strong>REJECTED</strong>.</p>
    <p>Go to <a href="{{URL::to('lobby')}}"> labourer lobby</a> to find the Labourer of your choice.</p>
    <br>
    <hr>
    <br>
    <br>
    <p>Regards: <br> Labour Lobby PVT (LTD)</p>
    
</body>
</html>