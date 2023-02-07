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
                <div class="user-dp">
                        <img src="/uploads/{{$userD->dp}}"  alt="">
                        <h2>{{ $userD->name }}</h2>
                </div>
                <div class="sec-btns">
                    <p onclick="hidesecp2()">PROFILE</p>
                    <p onclick="hidesecp1()">HIRED </p>
                    <a href="{{ URL::to('history') }}">
                        <p>HISTORY </p>
                    </a>
                </div>
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
                                {{-- <td>{{Session('userD')['city']->city_name}}</td> --}}
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
                            {{-- <tr>
                            <td>User Name : </td>
                            <td>{{Session('userD')['user_name']}}</td>
                        </tr> --}}
                            {{-- <tr>
                        <td>Password : </td>
                        <td id="pass"><input type="password" onfocusout="this.type='password'"
                            onfocus="this.type='text'"
                                value="{{$userD->user_pass->password}}" readonly></td>
                        </tr> --}}
                        </table>
                    </div>
                    <div class="action-btn">
                        <a class="form-btn" href="{{ URL::to('edit-user-profile/' . $userD->id) }}">UPDATE</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="form-btn" href="{{ URL::to('delete/' . $userD->email) }}">DELETE</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="form-btn" href="{{ URL::to('exporthirer/' . $userD->id) }}">EXPORT</a>

                    </div>
                </section>

                <section id="secp2">
                    <br>
                    <br>
                    <h1>Hired Worker</h1>
                    <div class="secp2">
                        <div class="labour-deail">
                            @if ($hired != null)
                            <br>
                            <br>
                            <br>
                                <table align="center">
                                    <tr>
                                        <td>Worker Name : </td>
                                        <td>{{ $hired->worker->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address : </td>
                                        <td>{{ $hired->worker->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Work Detail : </td>
                                        <td>{{ $hired->worker->prof->profession_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Contact : </td>
                                        <td>{{ $hired->worker->phone_no }}</td>
                                    </tr>
                                </table>
                                <div class="action-btn">
                                    <a class="form-btn" href="{{ URL::to('complete/') }}">COMPLETE</a>
                                </div>
                            @endif
                            @if ($hired == null)
                                You didn't hire anyone yet
                            @endif

                        </div>

                    </div>
                </section>

            </div>
        </div>
    </section>








    <footer>
        <p>Muhammad Fawad &copy; SP20-BCS-122</p>
        <p>Haseeb Shah &copy; SP20-BCS-123</p>
    </footer>






</body>

</html>
