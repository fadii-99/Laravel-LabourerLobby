<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmation Mail</title>
</head>
<body>
    <h1>Hiring Request</h1>
    <br>
    <hr>
    <p>Hello {{$worker->name}}, Someone wants to hire you please login to your profile and go to request tab to confirm request.</p>
    <br>
    <br>
    <h2>Hirer Details</h2>
    <p>Name    : {{$hirer->name}}</p>
    <p>Address : {{$hirer->address}}</p>
    <p>Pnone No: {{$hirer->phone_no}}</p>
<hr>
    
    <br>
    <br>
    <p>Regards: <br> Labour Lobby PVT (LTD)</p>
</body>
</html>