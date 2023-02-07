<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Hirer Profile</title>
    <script>
        function hidesecp2() {
            document.getElementById("secp2").style.display = "none";
            document.getElementById("secp1").style.display = "block";
        }

        function hidesecp1() {
            document.getElementById("secp1").style.display = "none";
            document.getElementById("secp2").style.display = "block";
        }
    </script>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">

</head>

<body onload="hidesecp2()">

    <header>
        <div class="container">
            <div class="logo">
                <h1>LABOUR LOBBY</h1>
            </div>
            <nav>
                <ul>
                    <li><a class="effect" href="/profileh">{{ $userD->name }}</a></li>
                    <li><a class="effect" href="{{ URL::to('lobby') }}">LOBBY</a></li>
                    <li><a class="effect" href="{{ URL::to('complain') }}">COMPLAIN</a></li>
                    <li><a class="effect" href="{{ URL::to('logout') }}">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>



    <section class="showcase" style="background-image:url('images/bg2.jpg');opacity:1;">
        <div class=" container container-profile mar" style="opacity:1;">
            <div class="left">
            </div>

            <div class="right">

                <section id="secp1">
                    <h1>Personal Information</h1><br><br>
                    <div class="secp1">
                        <table cellspacing=0>
                            <tr>
                                <td>Name:</td>
                                <td>{{ $userD->name }}</td>

                            </tr>
                            <tr>
                                <td>CNIC:</td>
                                <td>{{ $userD->cnic }}</td>

                            </tr>
                            <tr>
                                <td>Date Of birth </td>
                                <td>{{ $userD->dob }}</td>
                            </tr>
                            <tr>
                                <td>Gender:</td>
                                <td>{{ $userD->gender }}</td>
                            </tr>
                            <tr>
                                <td>City:</td>
                                <td>{{ $userD->city->city_name }}</td>
                            </tr>
                            <tr>
                                <td>Address: </td>
                                <td>{{ $userD->address }}</td>
                            </tr>
                            <tr>
                                <td>Phone No:</td>
                                <td>{{ $userD->phone_no }}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>{{ $userD->email }}</td>
                            </tr>
                        </table>
                    </div>
                </section>


            </div>
        </div>
    </section>














</body>

</html>
