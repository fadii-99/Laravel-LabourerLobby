<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmation Mail</title>
</head>
<body>
    <h1>Hiring Request Confirmation</h1>
    <br>
    <hr>
    <p>Hello {{$hirer->name}}, your requested to hire {{$worker->name}} is accepted.</p>
    <br>
    <br>
    <h2>Worker Details</h2>
    <p>Name    : {{$worker->name}}</p>
    <p>Address : {{$worker->address}}</p>
    <p>Pnone No: {{$worker->phone_no}}</p>

    <hr>
    <br>
    <br>
    <p>Regards: <br> Labour Lobby PVT (LTD)</p>
</body>
</html>