<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Worker Profile</title>
    <link rel="stylesheet" href="{{url('css/style.css')}}">

</head>

<body onload="hidesecp1()">

    <header>
        <div class="container">
            <div class="logo">
                <h1>LABOUR LOBBY</h1>
            </div>
            <nav>
                <ul>
                    <li><a class="effect" href="/profilew">{{$userD->name}}</a></li>
                    <li><a class="effect" href="{{URL::to('complain')}}">COMPLAIN</a></li>
                    <li><a class="effect" href="{{URL::to('/login')}}">Logout</a></li>
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
            <div class="sec-btns" style="border:;">
                <p onclick="hidesecp1()">PROFILE</p>
                <p onclick="hidesecp2()">REQUEST</p> 
                {{-- <h1>There are no Requests</h1> --}}
                <p onclick="hidesecp3()">HIRED BY</p>
                {{-- <h1>There are no Requests</h1> --}}
                <a href="{{ URL::to('historyw') }}"><p>WORK HISTORY</p> </a>
            </div>
        </div>

        <div class="right">

            <section id="secp1">
                <h1>Personal Information</h1><br><br>
                <div class="secp1">
                <div class="p">
                    <table cellspacing=0>
                        <tr>
                            <td>Name : </td>
                            <td>{{$userD->name}}</td>

                        </tr>
                        <tr>
                            <td>CNIC : </td>
                            <td>{{$userD->cnic}}</td>

                        </tr>
                        <tr>
                            <td>Date Of birth : </td>
                            <td>{{$userD->dob}}</td>
                        </tr>
                        <tr>
                            <td>Gender : </td>
                            <td>{{$userD->gender}}</td>
                        </tr>
                        <tr>
                            <td>City : </td>
                            <td>{{$userD->city->city_name}}</td>
                        </tr>
                        <tr>
                            <td>Address : </td>
                            <td>{{$userD->address}}</td>
                        </tr>
                        <tr>
                            <td>Phone No : </td>
                            <td>{{$userD->phone_no}}</td>
                        </tr>
                        <tr>
                            <td>Email : </td>
                            <td>{{$userD->email}}</td>
                        </tr>
                        <tr>
                                <td>Profession : </td>
                                <td>{{$userD->prof->profession_name}}</td>
                            </tr>
                            <tr>
                                <td>Work Area : </td>
                                <td>{{$userD->work_address}}</td>
                            </tr>
                            <tr>
                                <td>Timings : </td>
                                <td>{{$userD->work_time}}</td>
                            </tr>
                            <tr>
                                <td>Experience : </td>
                                <td>{{$userD->work_exp}} Years</td>
                            </tr>
                    </table>
                </div>
                </div>
                <div class="action-btn">
                    <a class="form-btn" href="{{URL::to('edit-user-profile/'.$userD->id)}}">UPDATE</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="form-btn" href="{{URL::to('deleteW/'.$userD->email)}}">DELETE</a>

                </div>
            </section>

             <section id="secp2">
                 <div class="secp2">
                     <div class="labour-deail">
                         <h1>Hiring Requests</h1>
                         @if ($hrw != null)
                            <table align="center">
                                <tr>
                                    <td>Name  </td>
                                    <td>{{ $hrw->hrq->name }}</td>
                                </tr>
                                <tr>
                                    <td>Address </td>
                                    <td>{{ $hrw->hrq->address }}</td>
                                </tr>
                                <tr>
                                   
                                </tr>
                            </table>
                            <div class="action-btn">
                                <a class="form-btn" href="{{ URL::to('confirm/'.$userD->email) }}">CONFIRM</a>
                                <a class="form-btn" href="{{ URL::to('confirmreject/'.$userD->email) }}">CANCEL</a>
                            </div>
                        @endif
                        @if ($hrw == null)
                        <h1>There are no Requests</h1>
                        <br>
                        <br>
                        @endif

                    </div>

                </div>
            </section>


            <section id="secp3">
                <br>
                <br>
                <h2 style="font-size: 32px">Hired By</h2>
                <div class="secp2">
                    <div class="labour-deail">
                        @if ($hired != null)
                        <br>
                        <br>
                        <br>
                            <table align="center">
                                <tr>
                                    <td>Worker Name : </td>
                                    <td>{{ $hired->hirer->name }}</td>
                                </tr>
                                <tr>
                                    <td>Address : </td>
                                    <td>{{ $hired->hirer->address }}</td>
                                </tr>
                                <tr>
                                    <td>Contact : </td>
                                    <td>{{ $hired->hirer->phone_no }}</td>
                                </tr>
                            </table>
                            <div class="action-btn">
                                <a class="form-btn" href="{{ URL::to('completeW/') }}">COMPLETE</a>
                            </div>
                        @endif
                        @if ($hired == null)
                            You are not hire by anyone yet
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




    <script>
        function hidesecp1() {
            document.getElementById("secp1").style.display = "block";
            document.getElementById("secp2").style.display = "none";
            document.getElementById("secp3").style.display = "none";
        }
        
        function hidesecp2() {
            document.getElementById("secp3").style.display = "none";
            document.getElementById("secp2").style.display = "block";
            document.getElementById("secp1").style.display = "none";
        }
        function hidesecp3() {
            document.getElementById("secp1").style.display = "none";
            document.getElementById("secp2").style.display = "none";
            document.getElementById("secp3").style.display = "block";
        }
    </script>

</body>

</html>