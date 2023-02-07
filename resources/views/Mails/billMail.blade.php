<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmation Mail</title>
</head>
<body>
    <h1>Billing</h1>
    <hr>
    <br>
    <p>Hirer Name    : {{$hirer->name}}</p>
    <p>Woker Name    : {{$worker->name}}</p>
    <p>Work Time     : {{$time}} Hours</p>
    <h3>Total Bill   : {{$bill}} Rs</h3>
    <hr>
    <br>
    <p>Regards: <br> Labour Lobby PVT (LTD)</p>
</body>
</html>